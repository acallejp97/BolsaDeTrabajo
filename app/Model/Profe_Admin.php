<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profe_Admin extends Model
{
    protected $table = "profe-admin";
    protected $fillable = ['id_user','id_depar'];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1
 

	
public function departamentos()
{
    return $this->belongsTo(Departamento::class);
}
	
public function Correos()
{
    return $this->belongsTo(Correo::class);
}


}
