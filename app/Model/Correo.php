<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $table = "correos";
    protected $fillable = ['id','id_remit','asunto', 'descripcion','created_at','updated_at'];


    //AQUI SOLO SI HAY RELACIONES
    // //1-N     //N-M          //1-1

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
