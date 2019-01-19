<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = "grados";
    protected $fillable = ['nombre', 'abreviacion'];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1

    
    public function users()
    {
        return $this->hasMany(User::class);
    }  
    
    public function Departamentos()
{
    return $this->belongsTo(Departamento::class);
}

    
public function alumnos()
{
    return $this->hasMany(Alumno::class);
}  


public function comun() { 
        
    return $this->hasManyThrough('App\Model\Alumno', 'App\Model\Departamento'); 


}
}
