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

public function profe_admin(){
    return $this->hasMany(Profe_Admin::class);
}  

public function comun() { 
        
    return $this->hasManyThrough('App\Model\Alumno', 'App\Model\Departamento'); 


}

public function alumno_grados()
{
    return $this->hasMany(Alumno_Grado::class);
}

public function alumno()
{
    return $this->belongsTo(Alumno::class);
}
}
