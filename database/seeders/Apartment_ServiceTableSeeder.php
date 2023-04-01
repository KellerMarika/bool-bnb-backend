<?php

namespace Database\Seeders;

use App\Models\ApartmentService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Apartment_ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = DB::table("services")->select("id")->pluck("id")->toArray();

        $apartments_id = DB::table("apartments")->select("id")->pluck("id")->toArray();

        foreach ($apartments_id as $apartment_id) {

            for ($i=0; $i < 4 ; $i++) { 
                
                $rand_service = array_rand($services);

                $apartment_service = new ApartmentService();
                $apartment_service->apartment_id = $apartment_id;
                $apartment_service->service_id = $services[$rand_service];

                $apartment_service->save();
            }
        }
    }
}
