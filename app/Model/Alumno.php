<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = "alumnos";
    protected $fillable = ['anio_fin' ];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1
   
    public function Curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

    public function grados()
    {
        return $this->hasMany(Grado::class);
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }
    public function comun() { 
        
        return $this->hasManyThrough('App\Model\Grado', 'App\Model\Departamento'); 
    
    
    }
    public function departamentos(){
        return $this ->belongsToMany("App/Model\Departamento");
    }

} 

