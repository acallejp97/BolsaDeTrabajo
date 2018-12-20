<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Curriculums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('curriculums');
        Schema::create('curriculums', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_alumno');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('experiencia');
            $table->string('competencias');
            $table->string('idiomas');
            $table->string('otros_datos');
            $table->integer('telefono');
           
            $table->foreign('id_alumno')->references('id')->on('alumnos');
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
        Schema::dropIfExists('curriculums');
    }
}
