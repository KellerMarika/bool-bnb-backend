<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ApartmentService;
use App\Models\ApartmentSubscription;
use DateTime;
use Illuminate\Support\Facades\DB;

class Apartment_SubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $apartments_id = [15, 20, 10, 9, 5, 11, 36, 66, 52, 23, 39, 68, 40, 25, 38, 22, 17, 44, 33, 1];

        $subscriptions_id = [1,2,3];

        foreach ($apartments_id as $apartment_id) {

            $apartment_subscription = new ApartmentSubscription();

            $apartment_subscription->apartment_id = $apartment_id;

            $apartment_subscription->subscription_id = $subscriptions_id[array_rand($subscriptions_id, 1)];

            $apartment_subscription->expiration_date = date("Y-m-d: H:i:s", 1679986001);

            $apartment_subscription->save();
            
        }

        



    }
}
