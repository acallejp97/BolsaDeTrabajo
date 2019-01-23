<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alumno_Grado extends Model
{
    protected $table = "alumno_grado";
    protected $fillable = ['id','id_alumno','id_grado' ];
    public function grados()
{
    return $this->hasMany(Grado::class);
}
}
