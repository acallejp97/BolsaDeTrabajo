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

    public function ActualizarCV()
    {
        return view("alumnos/curriculum");
    }
    
}
