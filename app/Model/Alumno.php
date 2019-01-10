<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = "alumnos";
    protected $fillable = ['anio_fin' ];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1
   

}
