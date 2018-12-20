<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoGrado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('alumno_grado');
        Schema::create('alumno_grado', function (Blueprint $table) {
            $table->increments('id',5);
            $table->unsignedInteger('id_alumno',5);
            $table->unsignedInteger('id_grado',5);
            
            $table->foreign('id_alumno')->references('id')->on('alumnos');
            $table->foreign('id_grado')->references('id')->on('grados');
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
        Schema::dropIfExists('alumno_grado');
    }
}
