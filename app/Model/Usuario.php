<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Usuario as Authenticatable;

use App\User;

class Usuario extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'nombre', 'apellidos' ,'passwd',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var 
     */
    protected $hidden = [
        'passwd', 'remember_token',
    ];
}
