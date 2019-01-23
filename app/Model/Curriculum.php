<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = "curriculums";
    protected $fillable = ['nombre', 'apellidos', 'experiencia', 'competencias', 'direccion', 'idiomas', 'imagen', 'otros_datos', 'telefono'];

    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function alumno()
    {
      return $this->belongsTo(ALumno::class);
    }
}
