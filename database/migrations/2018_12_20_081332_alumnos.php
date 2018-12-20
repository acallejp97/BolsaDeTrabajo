<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
          
            $table->unsignedInteger('id_user');
            $table->string('anio_fin');
            $table->foreign('id_user')->references('id')->on('usuarios')->onDelete('cascade');
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
