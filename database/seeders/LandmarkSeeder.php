<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Landmark::create([
        "ar_name" => 'قلعة دمشق',
        "en_name" => 'damascus castle',
        "city_id" => 1,
        "ar_description" => 'قلعة',
        "en_description" => 'Landmark',
        "open_time" => '08:00 am',
        "close_time" => '03:00 pm',
        "type_id" => 15,
        'category_id' => 1,
        "ar_location" => 'قلعة',
        "en_location" => 'Landmark',
        "map_location" => 'Landmark',
        "days_off_id" => 1
        ]);
    }
}
