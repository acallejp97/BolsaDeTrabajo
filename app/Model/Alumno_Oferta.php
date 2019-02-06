<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alumno_Oferta extends Model
{
    protected $table = "alumno_oferta";
    protected $fillable = ['id','id_alumno','id_oferta' ];
    

    
}
