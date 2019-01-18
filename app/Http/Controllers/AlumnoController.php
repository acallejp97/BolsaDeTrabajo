<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Oferta;

//Importando las classes de modelo y servicios

class AlumnoController extends Controller
{

    public function __construct()
    {
    }

    public function VerOfertas()
    {
        $ofertas = Oferta::all();
        if (!$ofertas) {
            return view("alumnos/ofertas");
        }
        return view("alumnos/ofertas")->with('ofertas', $ofertas);
    }

/*-----------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------DATOS PARA CONTACTAR CON EL ADMINISTRADOR---------------------------------------------*/
    public function Contacto()
    {
        return view("profes_admin/contacto");
        $sessionID = session('id');
        $email = User::selectProfile($sessionID);
        $nombre = User::select('nombre')
                    ->where('email','like', $email)
                    ->get();

        return back()->withInput();
    }


    /*-----------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------DATOS PARA CONTACTAR CON EL ADMINISTRADOR---------------------------------------------*/
    public function Contacto()
    {
        return view("alumnos/contacto");
    }

/*----------------------------------------------------------------------------*/
    public function VerPerfil()
    {
        return view("alumnos/perfil");
    }

    public function ActualizarCV()
    {
        return view("alumnos/curriculum");
    }
}
