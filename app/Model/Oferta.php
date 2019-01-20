<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = "ofertas";
    protected $fillable = ['titulo', 'descripcion','puestos_vacantes' ];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1
    // public function grado(){
    //     return $this->belongsTo('App\Model\Grado');
    //   }

    //   public function departamento(){
    //     return $this->belongsTo('App\Model\Departamento');
    //   }

    //   public function profe_admin(){
    //     return $this->belongsTo('App\Model\Profe_Admin');
    //   }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
