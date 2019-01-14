<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('user');
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id',3);
            $table->string('email',90);
            $table->string('nombre',30);
            $table->unsignedInteger('rango')->default(2);
            $table->string('apellidos',90);
            $table->string('password',300);
            $table->rememberToken();

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
        Schema::dropIfExists('Usuarios');
        Schema::dropIfExists('user');
    }
}
