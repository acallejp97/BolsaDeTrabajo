<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Perro extends Model{

//desactivo la inserccion del update_at y el created_at
    protected $table = "perros";
    protected $fillable = ['nombre', 'color','anio', 'raza' ];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1
     public function duenio(){
       return $this->belongsTo('App\Duenio');
     }
}


?>