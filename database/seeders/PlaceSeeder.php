<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Place::create([
            "ar_name" =>'البيت الدمشقي',
            "en_name" => 'damascus house',
            "city_id" => 1,
            //"type_id",
            "ar_description" =>'البيت الدمشقي',
            "en_description" =>'damascus house details',
            "open_time" => '10:00 am',
            "close_time" => '10:00 am',
            "category_id" => 1,
            "ar_location" => 'ييييي',
            "en_location" => 'gggg',
            "map_location" => 'ggg',
            "stars" => 4,
            "avg_rate" => 2,
            "phone_number" =>'09444444',
            "breakfast" => true,
            "lunch_dinner" => true
        ]);
    }
}
