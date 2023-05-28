<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TouristSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Tourist::create([
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'password'=> fake()->password(),
        'city_id' => 1,
        "date_of_birth" => '27-09-11',
        "nationality_id" => 1
        ]);

        \App\Models\Tourist::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password'=> fake()->password(),
            'city_id' => 1,
            "date_of_birth" => '27-12-19',
            "nationality_id" => 1
            ]);

    
    }
}
