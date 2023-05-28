<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Nationality::create([
            'ar_name' => 'سوريّ',
            'en_name' => 'Syrian'
        ]);
        \App\Models\Nationality::create([
            'ar_name' => 'غير سوريّ',
            'en_name' => 'Not Syrian'
        ]);
        //
    }
}
