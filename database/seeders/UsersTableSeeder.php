<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
       
        

            for ($i=0; $i < 5; $i++) { 
                
           
            $user = [

            
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'birth_date' => $faker->date('d-m-Y'),
                'email' => $faker->email(),
                'password' => 'password',
        
        ];

        
            $newUser = new User();
            $newUser->fill($user);
    /*         $newUser->birth_date = strtotime("2022-06-06"), "\n" */
            $newUser->password = Hash::make($user['password']);
            $newUser->birth_date = Hash::make($user['birth_date']);
            $newUser->birth_date = Carbon::createFromDate($user['birth_date'])->toDateTimeString();
            

            
            $newUser->save();
        
    
        

    }
}


}
