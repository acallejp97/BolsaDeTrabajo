<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ofertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ofertas');
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id',5);
            $table->string('titulo',300);
            $table->string('descripcion',3000);
            $table->unsignedInteger('id_empresa');
            $table->unsignedInteger('id_grado');
            $table->unsignedInteger('id_profesor');
            $table->unsignedInteger('puestos-vacantes');
           
            $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');;
            $table->foreign('id_grado')->references('id')->on('grados')->onDelete('cascade');
            $table->foreign('id_profesor')->references('id')->on('profe-admin');
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
        Schema::dropIfExists('ofertas');
    }
}
