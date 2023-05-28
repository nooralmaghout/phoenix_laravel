<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            //$table->enum('category',["cultural","religious","natural","archaeological","recreational"]);
            \App\Models\Category::create([
                'ar_name' => 'ثقافية',
                'en_name' => 'cultural'
            ]);
            \App\Models\Category::create([
                'ar_name' => 'دينية',
                'en_name' => 'religious'
            ]);
            \App\Models\Category::create([
                'ar_name' => 'طبيعية',
                'en_name' => 'natural'
            ]);
            \App\Models\Category::create([
                'ar_name' => 'أثرية',
                'en_name' => 'archaeological'
            ]);
            \App\Models\Category::create([
                'ar_name' => 'ترفيهية',
                'en_name' => 'recreational'
            ]);
           
    }
}
