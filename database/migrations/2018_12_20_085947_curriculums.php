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
            $table->increments('id',5);
            $table->unsignedInteger('id_alumno')->unique();
            $table->string('nombre',300);
            $table->string('apellidos',300);
            $table->string('experiencia',300);
            $table->string('competencias',300);
            $table->string('idiomas',300);
            $table->string('otros_datos',3000);
            $table->unsignedInteger('telefono');
           
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
