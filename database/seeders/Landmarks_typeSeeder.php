<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Landmarks_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            // $table->enum('type',["mosque","church","shrine","cemetery","hospice","modern house",
            // "door","khan","old market","bath","noria","building","station","school","castle",
            // "museum","house","square","cafe","sport facility","modern market","mall",
            // "theatre and cinema","library","monastery","temple","cave","hill","preserve",
            // "lake","mountine","valley","river","spring","desert","forest","archaeological site",
            // "bridge","village","wall","minaret","sience museum","beach"]);
            

            \App\Models\Landmarks_type::create([
                'ar_name' => 'جامع',
                'en_name' => 'mosque'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'كنيسة',
                'en_name' => 'church'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'ضريح',
                'en_name' => 'shrine'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'مدفن',
                'en_name' => 'cemetery'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'تكية',
                'en_name' => 'hospice'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'بيت حديث',
                'en_name' => 'modern house'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'باب',
                'en_name' => 'door'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'خان',
                'en_name' => 'khan'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'سوق قديم',
                'en_name' => 'old market'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'حمّام',
                'en_name' => 'bath'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'ناعورة',
                'en_name' => 'noria'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'بناء',
                'en_name' => 'building'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'محطة',
                'en_name' => 'station'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'مدرسة',
                'en_name' => 'school'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'قلعة',
                'en_name' => 'castle'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'متحف',
                'en_name' => 'museum'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'منزل',
                'en_name' => 'house'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'ساحة',
                'en_name' => 'square'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'مقهى',
                'en_name' => 'cafe'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'منشأة رياضية',
                'en_name' => 'sport facility'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'سوق حديث',
                'en_name' => 'modern market'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'مركز تجاري\مول',
                'en_name' => 'mall'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'مسرح و سينما',
                'en_name' => 'theatre and cinema'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'مكتبة',
                'en_name' => 'library'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'دير',
                'en_name' => 'monastery'
            ]);\App\Models\Landmarks_type::create([
                'ar_name' => 'معبد',
                'en_name' => 'temple'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'كهف\مغارة',
                'en_name' => 'cave'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'هضبة',
                'en_name' => 'hill'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'مدرسة',
                'en_name' => 'preserve'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'بحيرة',
                'en_name' => 'lake'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'جبل',
                'en_name' => 'mountine'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'وادي',
                'en_name' => 'valley'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'نهر',
                'en_name' => 'river'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'نبع',
                'en_name' => 'spring'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'صحراء',
                'en_name' => 'desert'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'غابة',
                'en_name' => 'forest'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'موقع أثري',
                'en_name' => 'archaeological site'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'جسر',
                'en_name' => 'bridge'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'قرية',
                'en_name' => 'village'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'سور',
                'en_name' => 'wall'
            ]);\App\Models\Landmarks_type::create([
                'ar_name' => 'مئذنة',
                'en_name' => 'minaret'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'متحف علوم',
                'en_name' => 'sience museum'
            ]);
            \App\Models\Landmarks_type::create([
                'ar_name' => 'ساحل\شاطئ',
                'en_name' => 'beach'
            ]);
    }
}
