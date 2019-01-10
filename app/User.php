<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "usuarios";

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
