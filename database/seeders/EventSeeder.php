<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Event::create([
            "ar_name" => 'معرض دمشق الدولي',
            "en_name" => 'international damascus festival',
            "city_id" => 1,
            "start_date" => '03-03-2023',
            "end_date" => '03-03-2023',
            "ar_description" => 'معرض دمشق الدولي',
            "en_description" => 'international damascus festival',
            "open_time" => '10:00 am',
            "close_time" => '10:00 am',
            "ar_location" => 'دمشق',
            "en_location" => 'damascus',
            "map_location" => 'damascus'
        ]);
        
    }
}
