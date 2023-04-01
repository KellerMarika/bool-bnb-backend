<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imgJson = file_get_contents('database/data/immagini.json');

        $apartmentsImages = json_decode($imgJson, true);

        foreach ($apartmentsImages as $key => $images) {
            foreach ($images as $image) {

                $newImage = new Image();

                $newImage->apartment_id = $key;

                $newImage->image = $image;

                $newImage->save();
            }
        }
    }
}
