<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamentos";
    protected $fillable = ['id', 'nombre', 'created_at', 'updated_at'];

    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1

}
