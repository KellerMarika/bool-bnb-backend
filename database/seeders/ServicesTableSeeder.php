<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Wi-fi',
                'icon' => 'wifi-line-icon.svg'
            ],
            [
                'name' => 'Cucina',
                'icon' => 'kitchen-icon.svg',
            ],
            [
                'name' => 'Lavatrice',
                'icon' => 'washing-machine-icon.svg'
            ],
            [
                'name' => 'Asciugatrice',
                'icon' => 'dryer-icon.svg'
            ],
            [
                'name' => 'Riscaldamento',
                'icon' => 'home-heating-icon.svg'
            ],
            [
                'name' => 'Aria Condizionata',
                'icon' => 'air-conditioner-icon.svg'
            ],
            [
                'name' => 'TV',
                'icon' => 'screen-icon.svg'
            ],
            [
                'name' => 'Piscina',
                'icon' => 'swimming-icon.svg'
            ],
            [
                'name' => 'Palestra',
                'icon' => 'gym-dumbbell-icon.svg'
            ],
            [
                'name' => 'Colazione',
                'icon' => 'cups-icon.svg'
            ],
            [
                'name' => 'Parcheggio',
                'icon' => 'parking-location-icon.svg'
            ],
            [
                'name' => 'Barbeque',
                'icon' => 'bbq-icon.svg'
            ]
        ];

        foreach ($services as $service) {

            $newService = new Service();

            $newService->name = $service['name'];
            $newService->icon = $service['icon'];

            $newService->save();
        }
    }
}
