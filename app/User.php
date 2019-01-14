<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['email', 'nombre', 'apellidos', 'rango', 'id','created_at',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var
     */
    protected $hidden = [
        'passwd', 'remember_token',
    ];

    protected function selectProfile($id){
        $usuario=DB::table('user')->select('*')->where('id',$id)->first()->get();
        return $usuario;
    }
}