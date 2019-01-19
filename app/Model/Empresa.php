<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresas";
    protected $fillable = ['nombre', 'direccion','email', 'url', 'telefono'];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1

    public function Departamentos()
{
    return $this->belongsTo(Departamento::class);
}
}
