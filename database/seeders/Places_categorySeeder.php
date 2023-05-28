<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Places_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    //$table->enum('category',['eastern food','western food','local food','fast food'])->nullable();//to be enum when i have the full details// مأكولات شرقية غربية وجبات سريعة مطعم شعبي
    \App\Models\Places_category::create([
        'ar_name' => 'مأكولات شرقية',
        'en_name' => 'eastern food'
    ]);
    \App\Models\Places_category::create([
        'ar_name' => 'مأكولات غربية',
        'en_name' => 'western food'
    ]);
    \App\Models\Places_category::create([
        'ar_name' => 'مأكولات شعبية',
        'en_name' => 'local food'
    ]);
    \App\Models\Places_category::create([
        'ar_name' => 'وجبات سريعة',
        'en_name' => 'fast food'
    ]);
    
     //$table->enum('type',['resturant','hotel','pastery','caffee','bakery','bar','park']);

    \App\Models\Places_category::create([
        'ar_name' => 'فندق',
        'en_name' => 'hotel'
    ]);
    \App\Models\Places_category::create([
        'ar_name' => 'حلويات ',
        'en_name' => 'pastery'
    ]);
    \App\Models\Places_category::create([
        'ar_name' => 'مقهى',
        'en_name' => 'caffe'
    ]);
    \App\Models\Places_category::create([
        'ar_name' => 'مخبز',
        'en_name' => 'bakery'
    ]);
    \App\Models\Places_category::create([
        'ar_name' => 'بار',
        'en_name' => 'bar'
    ]);
    \App\Models\Places_category::create([
        'ar_name' => 'منتزه',
        'en_name' => 'park'
    ]);
    }
}
