<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Days_offSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //$table->enum('days_off',["friday","saturday","sunday", "friday and saturday", "saturday and sunday"]);
        \App\Models\Days_off::create([
            'ar_name' => 'الجمعة',
            'en_name' => 'friday'
        ]);
        \App\Models\Days_off::create([
            'ar_name' => 'السبت',
            'en_name' => 'saturday'
        ]);
        \App\Models\Days_off::create([
            'ar_name' => 'الأحد',
            'en_name' => 'sunday'
        ]);
        \App\Models\Days_off::create([
            'ar_name' => 'الجمعة و السبت',
            'en_name' => 'friday and saturday'
        ]);
        \App\Models\Days_off::create([
            'ar_name' => 'السبت و الأحد',
            'en_name' => 'saturday and sunday'
        ]);

    }
}
