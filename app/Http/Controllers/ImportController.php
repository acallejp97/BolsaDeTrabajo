<?php

// namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use app\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
// use Maatwebsite\Excel\Facades\Excel;
use Excel;
=======
// use Illuminate\Http\Request;
// use app\User;
>>>>>>> 02041949e287db5c71c0d532e7721feccf2ced0f


// class ImportController extends Controller
// {
//     public function import()
//     {
//     	Excel::load('usuarios.csv', function($reader) {
 
//      foreach ($reader->get() as $usuario) {
//      User::create([
//      'email' => $usuario->email,
//      'nombre' =>$usuario->nombre,
//      'apellidos' =>$usuario->apellidos,
//      'imagen' =>$usuario->imagen,
//      'rango' =>$usuario->rango,
//      'id' =>$usuario->id,
//      'created_at' =>$usuario->created_at
//      ]);
//        }
//  });
//  return User::all();
//     }
// }

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ImportController extends Controller 
{
    public function export() 
    {
    	Excel::load('usuarios.csv', function($reader) {
 
     foreach ($reader->get() as $usuario) {
     User::create([
     'email' => $usuario->email,
     'nombre' =>$usuario->nombre,
     'rango' =>$usuario->rango,
     'apellidos' =>$usuario->apellidos,
     'imagen' =>$usuario->imagen,
     ]);
       }
 });
 return User::all();
    }
}
