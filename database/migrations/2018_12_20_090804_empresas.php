<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('empresas');
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id',5);
            $table->string('nombre',30);
            $table->string('direccion',90);
            $table->string('email',30);
            $table->string('url',300);
            $table->integer('telefono',9);
    
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
        Schema::dropIfExists('empresas');
    }
}