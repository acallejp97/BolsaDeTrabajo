<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('grados');
        Schema::create('grados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_depar');
            $table->string('nombre');
            $table->string('abreviacion');
           
            $table->foreign('id_depar')->references('id')->on('departamentos');
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
        Schema::dropIfExists('grados');
    }
}
