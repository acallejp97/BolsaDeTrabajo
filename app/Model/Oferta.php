<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = "ofertas";
    protected $fillable = ['titulo', 'descripcion','puestos_vacantes' ];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1

}
