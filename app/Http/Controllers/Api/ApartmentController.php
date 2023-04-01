<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\ApartmentSubscription;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sponsored = ApartmentSubscription::select('apartment_id', 'expiration_date')->get()->toArray();

        $actualSponsored = [];

        foreach ($sponsored as $sponsoredApt) {

            $today = date("Y-m-d H:i:s", strtotime("+1 hours"));
            $today_dt = new DateTime($today);
            $expire_dt = new DateTime($sponsoredApt['expiration_date']);

            if (
                $expire_dt >= $today_dt &&
                !in_array($sponsoredApt['apartment_id'], $actualSponsored)
            ) {
                array_push($actualSponsored, $sponsoredApt['apartment_id']);
            }
        }

        if ($actualSponsored) {
            $apartments = Apartment::with('images', 'services', 'subscriptions')
                ->where('visible', 1)
                ->whereIn('id', $actualSponsored)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $apartments = Apartment::with('images', 'services')
                ->where('visible', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        //ordinamento subs per data di creazione di ogni appartamento in apartments
        foreach ($apartments as $apartment) {

            //per ogni sub recupero la data di creazione della tabella pivot e la inserisco in un
            //atttributo "sub_at" che viene aggiunto ad ogni sub dell'appartamento
            foreach ($apartment->subscriptions as $apSub) {
                $apSub["sub_at"] = $apSub->getOriginal("pivot_created_at");
                $apSub["sub_expiration"] = ($apSub->getOriginal("pivot_expiration_date"));
            }
            // creo l'array di subs ordinato in base alla data di creazione
            $sortedSubscriptions = array_values($apartment->subscriptions->sortBy("sub_at")->toArray());

            //ad ogni appartamento aggiungo l'attributo "subs" che contiene
            //tutte le sue subs ordinate per data di creazione
            $apartment["subs"] = $sortedSubscriptions;
        }


        return response()->json($apartments);
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        if ($apartment->visible === 1) {

            $apartment->load('services', 'images', 'subscriptions');

            return response()->json($apartment);
        } else {
            return response()->json('error');
        }
    }
}
