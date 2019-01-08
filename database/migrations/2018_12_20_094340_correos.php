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
            $table->increments('id',5);
            $table->unsignedInteger('id_remit')->unique();
            $table->string('asunto',30);
            $table->string('descripcion',3000);
           
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