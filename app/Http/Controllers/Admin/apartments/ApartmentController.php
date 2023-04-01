<?php

namespace App\Http\Controllers\Admin\apartments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreApartmentRequest;
use App\Http\Requests\Admin\UpdateApartmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Apartment;
use App\Models\Image;
use App\Models\Service;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $apartments = Apartment::where("user_id", $user->id)
            ->orderBy("created_at", "desc")
            ->get();

        return view("Admin.apartments.index", compact("apartments", 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view("Admin.apartments.create", compact("services"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request)
    {
        $data = $request->validated();
        $id = Auth::id();

        // reupero coordinate da campi create con TomTom API
        // $fetch_coordinates = Http::get("https://api.tomtom.com/search/2/structuredGeocode.json?", [
        //     "key" => "OwsqVQlIWGAZAkomcYI0rDYG2tDpmRPE",
        //     "countryCode" => $data["countryCode"],
        //     "limit" => 1,
        //     "streetName" => $data["streetName"],
        //     "streetNumber" => $data["streetNumber"],
        //      "municipality" => $data["municipality"],            

        // ])->json()["results"][0]["position"] ?? 'error';

        // if ($fetch_coordinates === 'error') {
        //     return redirect()->route('Admin.apartments.create')->with([
        //         'error' => true,
        //         'error_message' => 'Indirizzo non valido'
        //     ]);
        // }

        // Composizione stringa indirizzo da inserire a DB
        //$complete_address = $data["streetName"] . " " . $data["streetNumber"] . " " . $data["municipality"] . " " . $data["postalCode"] . " " . $data["countryCode"];

        // dati del nuovo appartamento
        $newApartment = [
            ...$data,
            //"address" => $complete_address,
            "user_id" => $id,
            /*    "latitude" => $fetch_coordinates["lat"],
            "longitude" => $fetch_coordinates["lon"], */
        ];

        if (key_exists("cover_img", $data)) {
            $path = Storage::put("apartments_images", $data["cover_img"]);
        }

        // inserimento nuovo appartamento a DB
        $apartment = Apartment::create([
            ...$newApartment,
            'cover_img' => $path ?? null
        ]);

        if ($request->has('images')) {
            $paths = [];
            foreach ($data["images"] as $image) {
                $pathImage = Storage::put("apartments_images", $image);
                $newImage = new Image(["image" => $pathImage]);
                $apartment->images()->save($newImage);
            }
        }

        //aggiornamento relazione MOLTIaMOLTI services
        if ($request->has('services')) {
            $apartment->services()->attach($data["services"]);
        }
        return redirect()->route('Admin.apartments.show', $apartment->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {

        $apartment->load('subscriptions', 'messages', "images");
        $subscriptions = Subscription::all();

        return view("Admin.apartments.show", compact("apartment","subscriptions"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {

        $userId = Auth::id();

        if ($apartment->user_id === $userId) {
            $services = Service::all();
            return view("Admin.apartments.edit", compact("apartment", "services"));
        } else {
            return redirect()->route('Admin.apartments.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $data = $request->validated();

        if (key_exists("cover_img", $data)) {
            $path = Storage::put("apartments_images", $data["cover_img"]);
            if ($apartment->cover_img) {
                Storage::delete($apartment->cover_img);
            }
        }

        $paths = [];
        if (key_exists("images", $data)) {
            $i = 0;
            foreach ($data["images"] as $img) {
                if ($apartment->images) {
                    if ($i < count($apartment->images)) {
                        Storage::delete($apartment->images[$i]->image);
                        $firstImage = Image::find($apartment->images[$i]->id);
                        $firstImage->delete();
                        $i++;
                    }
                }
                $pathImage = Storage::put("apartments_images", $img);
                $newImage = new Image(["image" => $pathImage, "apartment_id" => $apartment->id]);
                $newImage->save();
            }
        }

        $apartment->update(
            [
                ...$data,
                "cover_img" => $path ?? $apartment->cover_img
            ]
        );

        $apartment->services()->sync($data["services"]);

        // return redirect()->route("Admin.apartments.show", $apartment->id);
        return redirect()->route('Admin.apartments.show', $apartment->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {

        if ($apartment->cover_img) {
            Storage::delete($apartment->cover_img);
        }

        $apartment->services()->detach();
        $apartment->subscriptions()->detach();

        $images = DB::table('images')->where('apartment_id', $apartment->id)->delete();
        $messages = DB::table('messages')->where('apartment_id', $apartment->id)->delete();

        $apartment->delete();

        return redirect()->route("Admin.apartments.index");
    }

    public function add_subscription(Request $request, Apartment $apartment)
    {

        $data = $request->validate([
            "subscription_id" => "exists:subscriptions,id"
        ]);


        $duration = DB::table("subscriptions")->select("duration")
            ->where("id", $data["subscription_id"])
            ->get();

        $exp_date = date("Y-m-d: H:i:s", strtotime("+{$duration[0]->duration} hours"));

        $apartment->subscriptions()->attach($data["subscription_id"]);

        DB::table("apartment_subscription")
            ->where("subscription_id", $data["subscription_id"])
            ->where("apartment_id", $apartment->id)
            ->update(["expiration_date" => $exp_date]);
    }
}
