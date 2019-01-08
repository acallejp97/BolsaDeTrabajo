<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $table = "correos";
    protected $fillable = ['asunto', 'descripcion'];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1

}
