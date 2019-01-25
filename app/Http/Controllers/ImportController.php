<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use app\User;


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
//     public function export() 
//     {
//         return Excel::download(new UsersExport, 'users.xlsx');
//     }
    
//     public function import() 
//     {
//         return Excel::import(new UsersImport, 'users.xlsx');
//     }
// }


}