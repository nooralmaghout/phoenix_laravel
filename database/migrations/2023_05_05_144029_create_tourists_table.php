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
        Schema::create('tourists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('citys');
            //$table->enum('city',['Damascus','Daraa','Rif Dimashq','Hamah','Lattakia','Tartus','AlQunaitira','Idlib','Raqqa','Dier AlZour','AlHassakah','AlSweedaa','Aleppo','Homs']);
            $table->string('name',120);
            $table->string('email',50);
            $table->string('password',70);
            $table->date('date_of_birth');
            $table->unsignedBigInteger('nationality_id');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
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
        Schema::dropIfExists('tourists');
    }
};
