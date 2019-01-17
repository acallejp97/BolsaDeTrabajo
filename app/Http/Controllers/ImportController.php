<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;


class ImportController extends Controller
{
    public function import()
    {
    	Excel::load('usuarios.csv', function($reader) {
 
     foreach ($reader->get() as $usuario) {
     User::create([
     'email' => $usuario->email,
     'nombre' =>$usuario->nombre,
     'apellidos' =>$usuario->apellidos,
     'imagen' =>$usuario->imagen,
     'rango' =>$usuario->rango,
     'id' =>$usuario->id,
     'created_at' =>$usuario->created_at
     ]);
       }
 });
 return User::all();
    }
}
