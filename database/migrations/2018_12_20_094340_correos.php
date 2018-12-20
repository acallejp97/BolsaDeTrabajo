<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Correos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('correos');
        Schema::create('correos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_remit');
            $table->string('asunto');
            $table->string('descripcion');
           
            $table->foreign('id_remit')->references('id')->on('usuarios');
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
        Schema::dropIfExists('correos');
    }
}