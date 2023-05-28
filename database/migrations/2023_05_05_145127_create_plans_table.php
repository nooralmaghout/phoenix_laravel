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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tourist_id');
            $table->foreign('tourist_id')->references('id')->on('tourists');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('citys');
            //$table->enum('city',['Damascus','Daraa','Rif Dimashq','Hamah','Lattakia','Tartus','AlQunaitira','Idlib','Raqqa','Dier AlZour','AlHassakah','AlSweedaa','Aleppo','Homs']);
            $table->unsignedBigInteger('breakfast_id')->nullable()->constrained();
            $table->foreign('breakfast_id')->references('id')->on('places');
            $table->unsignedBigInteger('lunch_id')->nullable()->constrained();
            $table->foreign('lunch_id')->references('id')->on('places');
            $table->unsignedBigInteger('dinner_id')->nullable()->constrained();
            $table->foreign('dinner_id')->references('id')->on('places');
            $table->unsignedBigInteger('landmark_id')->nullable()->constrained();
            $table->foreign('landmark_id')->references('id')->on('landmarks');
            $table->unsignedBigInteger('event_id')->nullable()->constrained();
            $table->foreign('event_id')->references('id')->on('events');
            $table->string('name');
            $table->unsignedBigInteger('type_id')->nullable()->constrained();
            $table->foreign('type_id')->references('id')->on('plan_types');
            //$table->enum('type',['family','not family']);
            $table->time('start_time');
            $table->time('end_time');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('stars')->default("0");
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
        Schema::dropIfExists('plans');
    }
};
