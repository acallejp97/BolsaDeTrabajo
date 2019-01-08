<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = "grados";
    protected $fillable = ['nombre', 'abreviacion'];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1

}
