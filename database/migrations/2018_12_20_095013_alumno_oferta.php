<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoOferta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('alumno_oferta');
        Schema::create('alumno_oferta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_alumno');
            $table->unsignedInteger('id_oferta');
            
            $table->foreign('id_alumno')->references('id')->on('alumnos');
            $table->foreign('id_oferta')->references('id')->on('ofertas');
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
        Schema::dropIfExists('alumno_oferta');
    }
}
