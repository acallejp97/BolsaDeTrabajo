<?php

namespace App\Http\Controllers;
use App\Model\Correo;
use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\Model\Usuarios;
use App\User;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct()
{

}

public function Ofertas()
{
    $ofertas = Oferta::all();
    if (!$ofertas) {
        return view("admin/anadirofertas");
    }
    return view("admin/anadirofertas")->with('ofertas', $ofertas);
}

public function Empresas()
{
    $empresas = Empresa::all();
    if (!$empresas) {
        return view("admin/empresas");
    }
    return view("admin/empresas")->with('empresas', $empresas);
}

public function AnadirEmpresas()
{
    return view("admin/anadirempresas");
}

public function AnadirUsuarios()
{
    return view("admin/anadirusuarios");
}

public function Cursos()
{
    $departamentos = Departamento::all();
    $grados = Grado::all();
    $grados_depar = array('departamentos' => $departamentos, 'grados' => $grados);
    if (!$departamentos) {
        return view("admin/cursos");
    }
    return view("admin/cursos")->with('grados_depar', $grados_depar);
}

public function Perfil()
{
    $numeroInscripciones=DB::where('status','=','1')->count();

    return view("admin/perfil");
}


public function Usuarios()
{
    $user = User::all();
    if (!$user) {
        return view("profesores/usuarios");
    }
    return view("admin/usuarios")->with('users', $user);

}

//******* */FUNCIONES DE ADMIN********************
public function AnadirProfesor()
{
    $profesor = Profe_Admin::all();
    $user = User::all();
    $profesores = array('profe_admin' => $profe_admin, 'user' => $user);
    if (!$profesor) {
        return view("admin/anadirprofesores");
    }
    return view("admin/anadirprofesores")->with('profesores', $profesores);
}

public function Buzon()
{
    $correos = Correo::all();
    $user = User::all();
    $user_correos = array('correos' => $correos, 'user' => $user);
    if (!$correos) {
        return view("admin/buzon");
    }
    return view("admin/buzon")->with('user_correos', $user_correos);
}

public function destroy( $id)
    {
    	// $notebook=Notebook::where('id',$id)->first();
    	// 
    	// $user= User::All();
    // 	$correo=$user->correos()->find($id);
    //     $correo->delete();
    //     Session::flash('message', 'Successfully deleted the nerd!');
    // 	return redirect('admin/buzon');
    //
            //$con = new conectarDB(); 
        

 }

}
