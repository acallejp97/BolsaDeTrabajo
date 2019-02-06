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
            $table->unsignedInteger('id_alumno')->unsigned()->unique('id_alumno', 'curriculum_id_alumno');
            $table->string('nombre',300)->nullable();
            $table->string('apellidos',300)->nullable();
            $table->string('imagen')->nullable();
            $table->string('email', 90)->nullable();
            $table->string('direccion',300)->nullable();
            $table->string('experiencia',300)->nullable();
            $table->string('competencias',300)->nullable();
            $table->string('idiomas',300)->nullable();
            $table->string('otros_datos',3000)->nullable();
            $table->unsignedInteger('telefono')->nullable();
            
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onDelete('cascade');
           
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
