<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //$table->enum('city',['Damascus','Daraa','Rif Dimashq','Hamah','Lattakia','Tartus','AlQunaitira','Idlib','Raqqa','Dier AlZour','AlHassakah','AlSweedaa','Aleppo','Homs']);

        \App\Models\City::create([
            'ar_name' => 'دمشق',
            'en_name' => 'Damascus'
        ]);
        \App\Models\City::create([
            'ar_name' => 'درعا',
            'en_name' => 'Daraa'
        ]);
        \App\Models\City::create([
            'ar_name' => 'ريف دمشق',
            'en_name' => 'Rif Dimashq'
        ]);
        \App\Models\City::create([
            'ar_name' => 'حماه',
            'en_name' => 'Hamah'
        ]);
        \App\Models\City::create([
            'ar_name' => 'اللاذقية',
            'en_name' => 'Lattakia'
        ]);
        \App\Models\City::create([
            'ar_name' => 'طرطوس',
            'en_name' => 'Tartus'
        ]);
        \App\Models\City::create([
            'ar_name' => 'القنيطرة',
            'en_name' => 'AlQunaitira'
        ]);
        \App\Models\City::create([
            'ar_name' => 'إدلب',
            'en_name' => 'Idlib'
        ]);
        \App\Models\City::create([
            'ar_name' => 'الرقة',
            'en_name' => 'Raqqa'
        ]);
        \App\Models\City::create([
            'ar_name' => 'دير الزور',
            'en_name' => 'Dier AlZour'
        ]);
        \App\Models\City::create([
            'ar_name' => 'الحسكة',
            'en_name' => 'AlHassakah'
        ]);
        \App\Models\City::create([
            'ar_name' => 'السويداء',
            'en_name' => 'AlSweedaa'
        ]);
        \App\Models\City::create([
            'ar_name' => 'حلب',
            'en_name' => 'Aleppo'
        ]);
        \App\Models\City::create([
            'ar_name' => 'حمص',
            'en_name' => 'Homs'
        ]);
    }
}
