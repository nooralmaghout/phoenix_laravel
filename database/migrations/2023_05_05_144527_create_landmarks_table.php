<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landmarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('citys');
            //$table->enum('city',['Damascus','Daraa','Rif Dimashq','Hamah','Lattakia','Tartus','AlQunaitira','Idlib','Raqqa','Dier AlZour','AlHassakah','AlSweedaa','Aleppo','Homs']);
            $table->string('ar_name');
            $table->string('en_name');
            //$table->enum('category',["cultural","religious","natural","archaeological","recreational"]);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('landmarks_types');
            // $table->enum('type',["mosque","church","shrine","cemetery","hospice","modern house",
            // "door","khan","old market","bath","noria","building","station","school","castle",
            // "museum","house","square","cafe","sport facility","modern market","mall",
            // "theatre and cinema","library","monastery","temple","cave","hill","preserve",
            // "lake","mountine","valley","river","spring","desert","forest","archaeological site",
            // "bridge","village","wall","minaret","sience museum","beach"]);
            $table->string('ar_description');
            $table->string('en_description');
            $table->string('ar_location')->nullable();
            $table->string('en_location')->nullable();
            $table->time('open_time');
            $table->time('close_time');
            $table->binary('photo')->nullable();
            $table->string('map_location')->nullable();
            $table->unsignedBigInteger('days_off_id');
            $table->foreign('days_off_id')->references('id')->on('days_offs');
            //$table->enum('days_off',["friday","saturday","sunday", "friday and saturday", "saturday and sunday"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landmarks');
    }
};
