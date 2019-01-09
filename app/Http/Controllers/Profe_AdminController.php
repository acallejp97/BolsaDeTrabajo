<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario;
use App\Model\Empresa;
use App\Model\Oferta;
class Profe_AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['aniadirUsuario', 'aniadirCurriculum', 'aniadirGrado']]);
    }
    public function Ofertas()
    {
        $ofertas =Oferta::all();
        if (!$ofertas) {
            return view("profesores/añadirofertas");
        }     
        return view("profesores/añadirofertas")-> with('ofertas', $ofertas);
            
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

    //******* */FUNCIONES DE ADMIN********************
    public function AñadirProfesor()
    {
        //return view ("VerAlumnos");
       
            return view ("profesores/añadirprofesor");
        
        
    }
    public function Buzon()
    {
        //return view ("VerAlumnos");
       
            return view ("profesores/buzon");
        
        
    }
}
