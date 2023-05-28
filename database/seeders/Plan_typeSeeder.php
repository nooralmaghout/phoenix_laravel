<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Plan_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////$table->enum('type',['family','not family']);
        \App\Models\Plan_type::create([
        'ar_name' => 'رحلة عائلية',
        'en_name' => 'family'
        ]);
        \App\Models\Plan_type::create([
        'ar_name' => 'رحلة غير عائلية',
        'en_name' => 'not family'
     ]);
    }
}
