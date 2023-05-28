<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Admin::create([
            'name' => 'ministry of caltural',
            'email' => 'cultural@gmail.com',
            'password' => 'cultural',
        ]);
    }
}
