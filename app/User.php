<?php


namespace App;
use App\Model\Alumno;

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

    protected $fillable = ['id', 'email', 'nombre', 'rango', 'apellidos', 'imagen', 'created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ofertas()
{
    return $this->hasMany(Oferta::class);
}
public function grados()
{
    return $this->hasMany(Grado::class);
}

public function alumno()
{
    return $this->belongsTo(Alumno::class);
}

public function Correos()
{
    return $this->hasMany(Correo::class);
}

public function getAttribute($key)
{
    $profile = Alumno::where('id_user', '=', $this->attributes['id'])->first()->toArray();

    foreach ($profile as $attr => $value) {
        if (!array_key_exists($attr, $this->attributes)) {
            $this->attributes[$attr] = $value;
        }
    }
    
    return parent::getAttribute($key);
}
}
