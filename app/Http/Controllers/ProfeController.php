<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario;
use App\Model\Empresa;
class ProfeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['aniadirUsuario', 'aniadirCurriculum', 'aniadirGrado']]);
    }
    public function Ofertas()
    {
//return view ("VerAnimales");

//Meto en la variable alumno toda la info con la variable que meta en rutas
       
            return view("profesores/añadirofertas");
            
    }
    public function Empresas()
    {
        $empresas =Empresa::all();
        if (!$empresas) {
            return view("profesores/empresas");
        }     
        return view("profesores/empresas")-> with('empresas', $empresas);
        
        
    }
    public function AñadirEmpresas()
    {
        //return view ("VerAlumnos");
       
            return view ("profesores/añadirempresas");
        
        
    }
    public function AñadirUsuarios()
    {
        //return view ("VerAlumnos");
       
            return view ("profesores/añadirusuarios");
        
        
    }
    public function Cursos()
    {
        //return view ("VerAlumnos");
       
            return view ("profesores/cursos");
        
        
    }
   
    public function Perfil()
    {
        //return view ("VerAlumnos");
       
            return view ("profesores/perfil");
        
        
    }
    public function Contacto()
    {
        //return view ("VerAlumnos");
       
            return view ("profesores/contacto");
        
        
    }
    public function Usuarios()
    {
        $usuarios =Usuario::all();
        if (!$usuarios) {
            return view("profesores/usuarios");
        }     
        return view("profesores/usuarios")-> with('usuarios', $usuarios);
        
        
    }
}
