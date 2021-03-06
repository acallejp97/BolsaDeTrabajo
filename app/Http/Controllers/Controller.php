<?php

namespace App\Http\Controllers;

use App\Model\Alumno;
use App\Model\Correo;
use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\User;
use Auth;
use Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Validator;
use App\Model\Alumno_Grado;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Ofertas()
    {
        $ofertas = Oferta::all();
        switch (Auth::user()->rango) {
            case 0:
                $profe = Profe_Admin::where('id_user', Auth::user()->id)->first();
                $profe_admin = Profe_Admin::all();

                $ofertas = Oferta::all();
                $user = User::all();
                $empresas = Empresa::all();
                $grados = Grado::all();

                $empresa_oferta = array('profe_admin' => $profe_admin, 'user' => $user, 'empresas' => $empresas, 'ofertas' => $ofertas, 'grados' => $grados, 'profesor' => $profe, 'rango' => 'profe_admin');
                if (!$empresa_oferta) {
                    return view("common/ofertas");
                }
                return view("common/ofertas")->with('result', $empresa_oferta);

                break;

            case 1:
                $profe = Profe_Admin::where('id_user', Auth::user()->id)->first();
                $profe_admin = Profe_Admin::all();

                $grados = Grado::select('id')->where('id_depar', $profe->id_depar)->get(); //3 grados
                $id_grados = $this->splitQuery($grados, 'id');;
                $ofertas = Oferta::whereIn('id_grado', $id_grados)->get();
                $user = User::all();
                $empresas = Empresa::all();

                $empresa_oferta = array(
                    'profe_admin' => $profe_admin, 'user' => $user, 'empresas' => $empresas, 'ofertas' => $ofertas, 'grados' => $grados, 'profesor' => $profe,
                    'rango' => 'profe_admin');
                if (!$empresa_oferta) {
                    return view("common/ofertas");
                }
                return view("common/ofertas")->with('result', $empresa_oferta);

                break;

            case 2:
                $alumno = Alumno::where('id_user', Auth::user()->id)->first();
                $grado = Alumno_Grado::where('id_alumno',$alumno->id)->first();

                $departamento=Grado::where('id', $grado->id)->first();
                $grados = Grado::where('id_depar',$departamento->id)->get();
                $id_grados = $this->splitQuery($grados, 'id');;

                $ofertas = Oferta::whereIn('id_grado', $id_grados)->get();
                
                $profe_admin = Profe_Admin::all();
                $user = User::all();
                $empresas = Empresa::all();

                $empresa_oferta = array(
                    'profe_admin' => $profe_admin,
                    'user' => $user,
                    'empresas' => $empresas,
                    'ofertas' => $ofertas,
                    'grados' => $grados,
                    'profesor' => $alumno,
                    'rango' => 'alumno'
                );

                if (!$empresa_oferta) {
                    return view("common/ofertas");
                }
                return view("common/ofertas")->with('result', $empresa_oferta);

                break;
        }
    }

    public function console_log($data)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }

    public function splitQuery($query, $query_function)
    {
        $array = [];
        foreach ($query as $id) {
            $array[] = $id->$query_function;
        }
        return $array;
    }

    public function Contacto()
    {
        switch (Auth::user()->rango) {
            case 0:
            case 1:
                $rango = "profe_admin";
                return view("common/contacto")
                    ->with('rango', $rango);
                break;
            case 2:
                $rango = "alumno";
                return view("common/contacto")->with('rango', $rango);
                break;
        }
    }

    public function Perfil()
    {

        switch (Auth::user()->rango) {
            case 0:
            case 1:
                $rango = 'profe_admin';
                if (Auth::user()->rango == 1) {
                    $id_depar = Profe_Admin::where('id_user', Auth::user()->id)->first();
                    $nombreDepar = Departamento::select('nombre')->where('id', $id_depar->id_depar)->get();
                    $result = array('nombreDepar' => $nombreDepar, 'rango' => $rango);
                    return view("common/perfil")->with('result', $result);
                } else {
                    $result = array('rango' => $rango);
                    return view("common/perfil")->with('result', $result);
                }
                break;
            case 2:
                $rango = 'alumno';
                $anio = Alumno::select('anio_fin')->where('id_user', Auth::user()->id)->first();
                $result = array('anio_fin' => $anio, 'rango' => $rango);
                return view("common/perfil")->with('result', $result);
                break;
        }
    }

    public function updateProfile(Request $request)
    {
        $rules = ['image' => 'required|image|max:1024*1024*1'];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return view("profes_admin/perfil")->withErrors($validator);
        } else {
            $name = str_random(10) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('fotosPerfil', $name);
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                ->update(['imagen' => $name, 'updated_at' => date('Y-m-d H:m:s')]);

            return redirect("/perfil");
        }
    }

    public function enviar(Request $request)
    {

        if (!$request->ajax()) {
            return redirect('/');
        }
        if (isset($_REQUEST['nuevoContacto'])) {
            $enviado = json_decode($_REQUEST['nuevoContacto']);
            $asunto = $enviado->asunto;
            $descripcion = $enviado->mensaje;

            $insertarDepartamento = new Correo;
            $insertarDepartamento->insert([
                'asunto' => $asunto,
                'id_remit' => Auth::user()->id,
                'descripcion' => $descripcion, 'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ]);
        } else {
            $insertarDepartamento->delete();
        }
    }

    public function insertOferta(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        if (isset($_REQUEST['`insertaroferta`'])) {

            $enviado = json_decode($_REQUEST['insertaroferta']);

            $titulo = $enviado->titulo;
            $descripcion = $enviado->descripcion;
            $id_empresa = $enviado->id_empresa;
            $id_grado = $enviado->id_grado;
            $id_profesor = $enviado->id_profesor;
            $puestos = $enviado->puestos;

            $insertaroferta = new Oferta;
            if ($titulo != "") {
                $insertaroferta->update(['titulo' => $titulo]);
            }

            if ($descripcion != "") {
                $insertaroferta->update(['descripcion' => $descripcion]);
            }

            if ($id_empresa != "") {
                $insertaroferta->update(['id_empresa' => $id_empresa]);
            }

            if ($id_grado != "") {
                $insertaroferta->update(['id_grado' => $id_grado]);
            }
            if ($id_profesor != "") {
                $insertaroferta->update(['id_profesor' => $id_profesor]);
            }
        } else {

            // $insertaroferta = Oferta::findOrFail(Auth::user()->id)->delete();
        }
    }

    public function updateUser(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        if (isset($_REQUEST['actualizacionUsuario'])) {

            $enviado = json_decode($_REQUEST['actualizacionUsuario']);

            $nombre = $enviado->nombre;
            $apellido = $enviado->apellido;
            $email = $enviado->email;
            $password = $enviado->password;
            $password2 = $enviado->password2;

            $actualizarUsuario = User::findOrFail(Auth::user()->id);
            if ($nombre != "") {
                $actualizarUsuario->update(['nombre' => $nombre]);
            }

            if ($apellido != "") {
                $actualizarUsuario->update(['apellidos' => $apellido]);
            }

            if ($email != "") {
                $actualizarUsuario->update(['email' => $email]);
            }

            if ($password != "") {
                $actualizarUsuario->update(['password' => Hash::make($password)]);
                return redirect("/logout");
            }
        } else {
            $actualizarUsuario = User::findOrFail(Auth::user()->id)->delete();
        }
    }
    public function search()
    {

        if ($search = \Request::get('q')) {
            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%");
            })->paginate(20);
        } else {
            $users = User::latest()->paginate(5);
        }

        return $users;
    }
}
