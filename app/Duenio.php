<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Duenio extends Model{

//desactivo la inserccion del update_at y el created_at
    

    //AQUI SOLO SI HAY RELACIONES
    //1-N     //N-M          //1-1
    public function perro()
    {
        return $this->hasOne('App\Perro');
        
     }
}


?>;