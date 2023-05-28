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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('citys');
            $table->string('ar_name');
            $table->string('en_name');
            $table->integer('stars')->default("0");
            $table->integer('avg_rate')->default("0")->nullable();
            $table->string('phone_number',25);
            $table->time('open_time');
            $table->time('close_time');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('places_categories');
            $table->string('ar_description');
            $table->string('en_description');
            $table->string('ar_location')->nullable();
            $table->string('en_location')->nullable();
            $table->string('map_location');
            $table->boolean('breakfast')->nullable();
            $table->boolean('lunch_dinner')->nullable();
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
        Schema::dropIfExists('places');
    }
};
