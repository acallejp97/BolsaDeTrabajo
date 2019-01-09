<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfeAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('profe-admin');
        Schema::create('profe-admin', function (Blueprint $table) {
            $table->increments('id',5);
            $table->unsignedInteger('id_user')->unique();
            $table->unsignedInteger('id_depar')->nullable();
            $table->boolean('rango')->default(1);
            
            $table->foreign('id_user')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_depar')->references('id')->on('departamentos');
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
        Schema::dropIfExists('profe-admin');
    }
}
