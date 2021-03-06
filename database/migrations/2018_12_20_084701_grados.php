<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('grados');
        Schema::create('grados', function (Blueprint $table) {
            $table->increments('id',5);
            $table->unsignedInteger('id_depar');
            $table->string('nombre',300);
            $table->string('abreviacion',30);
           
            $table->foreign('id_depar')->references('id')->on('departamentos')->onDelete('cascade');
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
        //Schema::dropForeign('ofertas_id_grado_foreign');
        Schema::dropIfExists('grados');
    }
}
