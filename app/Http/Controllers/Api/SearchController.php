<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\ApartmentService;
use App\Models\ApartmentSubscription;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{



    public function search(Request $request)
    {

        // $data = [
        //     'lat' => 41.89056,
        //     'lon' => 12.49427,
        //     'radius' => 20,
        //     'min_rooms' => 1,
        //     'min_beds' => 1,
        //     'services' => [1]
        // ];


        $data = $request->all();


        // Punto di partenza
        $searchCoord = [
            'lat' => deg2rad($data['lat']),
            'lon' => deg2rad($data['lon']),
        ];


        //Punto del mio appartamento da recuperare a database
        $apartmentsCoord = Apartment::select('id', 'latitude', 'longitude')->get();



        $dbCoord = [];

        foreach ($apartmentsCoord as $apartmentCoord) {
            $toPush['lat'] = deg2rad($apartmentCoord['latitude']);
            $toPush['lon'] = deg2rad($apartmentCoord['longitude']);

            $dbCoord[$apartmentCoord['id']] = $toPush;
        }

        /*esempio  1:{123415,2344534} */



        $distances = [];


        foreach ($dbCoord as $key => $coord) {

            $distance = acos((sin($searchCoord['lat'])) * (sin($coord['lat'])) + (cos($searchCoord['lat'])) * (cos($coord['lat'])) * (cos($coord['lon'] - $searchCoord['lon']))) * 6373;

            $distances += [$key => $distance];
        }

        //asort($distances);

        // dump($distances);

        $nearby = [];

        foreach ($distances as $key => $distance) {

            // if ($distance <= $data['radius']) {
            //     dump($distance);
            //     dump($data['radius']);
            //     dump('true');
            //     array_push($nearby, $key);
            // } else {
            //     dump($distance);
            //     dump($data['radius']);
            //     dump('false');
            // }

            if ($distance <= $data['radius']) {
                array_push($nearby, $key);
            }
        }

        $apartments = $nearby;

        // dump($apartments);

        // $apartments = [];
        // dump("appartamenti iniziali", $apartments);

        if ($data["min_rooms"]) {
            $apartments_filtered_rooms = DB::table("apartments")->select("id")
                ->whereIn('id', $apartments)
                ->where("rooms_qty", ">=", $data["min_rooms"])
                ->get()
                ->pluck("id")
                ->toArray();
            $apartments = $apartments_filtered_rooms;

            // dump("app filtrati per rooms", $apartments);
        }
        if ($data["min_beds"]) {
            $apartments_filtered_beds = DB::table("apartments")->select("id")
                ->whereIn('id', $apartments)
                ->where("beds_qty", ">=", $data["min_beds"])
                ->get()
                ->pluck("id")
                ->toArray();
            foreach ($apartments as $apartment) {
                if (!in_array($apartment, $apartments_filtered_beds)) {
                    unset($apartments[array_search($apartment, $apartments)]);
                    array_values($apartments);
                }
            }
        }
        // dump("app filtrati per beds", $apartments);

        $apartWithSearchedServices = [];

        if (!empty($data["services"])) {
            $apartments_with_services = Apartment::with('services','subscriptions')->whereIn("id", $apartments)->get()->toArray();

            // dump($apartments_with_services);


            foreach ($apartments_with_services as $apart) {

                // id dei servizi di quell'appartamento
                $arrayOfServicesId = [];

                foreach ($apart["services"] as $services) {

                    if (!(in_array($services["id"], $arrayOfServicesId))) {
                        array_push($arrayOfServicesId, $services["id"]);
                    }
                }

                $checkCount = 0;

                foreach ($arrayOfServicesId as $serviceId) {
                    if (in_array($serviceId, $data["services"])) {
                        $checkCount++;
                    }
                }

                if ($checkCount == count($data["services"])) {

                    array_push($apartWithSearchedServices, $apart['id']);
                }
            }
        } else {
            $nearApartments = Apartment::whereIn('id', $apartments)->paginate(10);
        }

        if (array_key_exists('services', $data) && !empty($data["services"])) {
            $nearApartments = Apartment::whereIn('id', $apartWithSearchedServices)->paginate(10);
        }


        foreach ($nearApartments as $nearApartment) {
            $nearApartment["distance"] = number_format((float) $distances[$nearApartment->id], 2, ".");
        }

        // FUNZIONE ordinamento appartamenti per distanza
        function sort_apartments_by_distance($apts)
        {
            // prende il numero di appartamenti
            $count = count($apts);

            // Cicla gli appartamenti e confronta ognuno con  il successivo
            for ($i = 0; $i < $count - 1; $i++) {
                for ($j = $i + 1; $j < $count; $j++) {
                    // se l'appartamento corrente ha distanza maggiore del successivo li scambia
                    if ($apts[$i]["distance"] > $apts[$j]["distance"]) {
                        $temp = $apts[$i];
                        $apts[$i] = $apts[$j];
                        $apts[$j] = $temp;
                    }
                }
            }

            return $apts;
        }

        foreach ($nearApartments as $nearAp) {
            $services = ApartmentService::select("service_id")
                ->where("apartment_id", $nearAp->id)
                ->get()
                ->pluck("service_id")
                ->toArray();
            $images = Image::where("apartment_id", $nearAp->id)
                ->get()
                ->toArray();
            // $subscriptions = ApartmentSubscription::select("subscription_id")
            //     ->where("apartment_id", $nearAp->id)
            //     ->get()
            //     ->pluck("subscription_id")
            //     ->toArray();
            $nearAp["services"] = $services;
            $nearAp["images"] = $images;
            // $nearAp["subscriptions"] = $subscriptions;
        }

        $nearApartmentsSorted = sort_apartments_by_distance($nearApartments);

        return response()->json($nearApartmentsSorted);


        /*  $nearApartments = Apartment::with('images', "subscriptions")->where('visible', 1)->whereIn('id', $apartments)->paginate(10); */
    }
}
