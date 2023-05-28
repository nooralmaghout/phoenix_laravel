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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('citys');
            //$table->enum('city',['Damascus','Daraa','Rif Dimashq','Hamah','Lattakia','Tartus','AlQunaitira','Idlib','Raqqa','Dier AlZour','AlHassakah','AlSweedaa','Aleppo','Homs']);
            $table->string('ar_name');
            $table->string('en_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('ar_description');
            $table->string('en_description');
            $table->string('ar_location')->nullable();
            $table->string('en_location')->nullable();
            $table->time('open_time');
            $table->time('close_time');
            $table->string('map_location')->nullable();
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
        Schema::dropIfExists('events');
    }
};
