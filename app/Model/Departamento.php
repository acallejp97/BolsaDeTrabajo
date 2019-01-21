<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamentos";
    protected $fillable = ['id', 'nombre', 'created_at', 'updated_at'];

    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function profe_admin()
{
    return $this->hasMany(Profe_Admin::class);
}
public function empresas()
{
    return $this->hasMany(Empresa::class);
}

public function comun() { 
        
    return $this->hasManyThrough('App\Model\Grado', 'App\Model\Profe_admin'); 


}


public function profesores()
{
    return $this->hasMany('App\Model\Profe_Admin');
}

}
