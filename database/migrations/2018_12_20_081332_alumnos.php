<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('alumnos');
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id', 5);
            $table->unsignedInteger('id_user')->unsigned()->unique('id_user', 'alumno_id_user');
            $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
            $table->unsignedInteger('anio_fin');

         
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
        Schema::dropIfExists('alumnos');
    }
}
