<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Correo;
use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Ofertas()
    {
        $ofertas = Oferta::all();
        switch (Auth::user()->rango) {
            case 0:
                $user = User::all();
                $empresas = Empresa::all();
                $ofertas = Oferta::all();
                $grados = Grado::all();
                $empresa_oferta = array('empresas' => $empresas, 'user' => $user, 'ofertas' => $ofertas, 'grados' => $grados);
                $result = array_unique($empresa_oferta);
                if (!$result) {
                    return view("profes_admin/anadirofertas");
                }
                return view("profes_admin/anadirofertas")->with('result', $result);

                break;

            case 1:
                $empresas = Empresa::all();
                $ofertas = Oferta::all();
                $grados = Grado::all();
                $empresa_oferta = array('empresas' => $empresas, 'ofertas' => $ofertas, 'grados' => $grados);
                $result = array_unique($empresa_oferta);
                if (!$result) {
                    return view("profes_admin/anadirofertas");
                }
                return view("profes_admin/anadirofertas")->with('result', $result);

                break;

            case 2:
                $user = User::all();
                $ofertas = Oferta::all();

                if (!$ofertas) {
                    return view("alumnos/ofertas");
                }
                return view("alumnos/ofertas")->with('ofertas', $ofertas);

        }

    }

    public function Contacto()
    {
        switch (Auth::user()->rango) {
            case 0:
            case 1:
                return view("profes_admin/contacto");
                break;
            case 2:
                return view("alumnos/contacto");
                $sessionID = session('id');
                $email = User::selectProfile($sessionID);
                $nombre = User::select('nombre')
                    ->where('email', 'like', $email)
                    ->get();

                return back()->withInput();
                break;
        }
    }

    public function Perfil()
    {

        $user = User::all();
        switch (Auth::user()->rango) {
            case 0:case 1:
                if (Auth::user()->rango == 1) {
                    $id_depar = Profe_Admin::select('id_depar')->where('id_user', Auth::user()->id)->get();
                    foreach ($id_depar as $id) {
                        $nombreDepar = Departamento::select('nombre')->where('id', $id->id_depar)->get();
                    }
                    return view("profes_admin/perfil")->with('nombreDepar', $nombreDepar);
                } else {
                    return view("profes_admin/perfil")->with('user', $user);
                }
                break;
            case 2:
                return view("alumnos/perfil");
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
            $request->file('image')->move('perfiles', $name);
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                ->update(['imagen' => $name]);

            return view("profes_admin/perfil")->with('status', 'Su imagen de perfil ha sido cambiada con éxito');
        }
    }
    public function mostrarUsuario(Request $request)
    {
        $task = array([
            'nombre' => Auth::user()->nombre,
            'apellidos' => Auth::user()->nombre,
            'email' => Auth::user()->nombre,
            'rango' => Auth::user()->nombre,
            'password' => Auth::user()->nombre,
            'imagen' => Auth::user()->nombre,

        ]);
        return $task;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function enviar(Request $request)
    {

        if (!$request->ajax()) {
            return redirect('/');
        }
        if (isset($_REQUEST['nuevoContacto'])) {
            $enviado = json_decode($_REQUEST['nuevoContacto']);
            $asunto = $enviado->email;
            $descripcion = $enviado->mensaje;

            $insertarDepartamento = new Correo;
            $insertarDepartamento->insert(['asunto' => $asunto,
                'id_remit' => Auth::user()->id,
                'descripcion' => $descripcion]);

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
    // public function insertar(Request $request)
    // {

    //         $titulo =  $request->string('titulo');
    //         $descripcion =  $request->string('descripcion');
    //         $id_empresa =  $request->string('id_empresa');
    //         $id_grado =  $request->string('id_grado');
    //         $id_profesor =  $request->string('id_profesor');
    //         $puestos =  $request->string('puestos');
    //         $oferta = new Oferta;
    //         $oferta->update(['titulo' => $titulo, 'descripcion' => $descripcion,'id_empresa' => $id_empresa, 'id_grado' => $id_grado, 'id_profesor' => $id_profesor, 'puestos' => $puestos ]);

    //         return view("profes_admin/insertaroferta")->with('status', 'Su imagen de perfil ha sido cambiada con éxito');
    //     }

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
            $password1 = $enviado->password1;

            $actualizarUsuario = User::findOrFail(Auth::user()->id);
            if ($nombre != "") {
                $actualizarUsuario->update(['nombre' => $nombre]);
            }

            if ($apellido != "") {
                $actualizarUsuario->update(['apellido' => $apellido]);
            }

            if ($email != "") {
                $actualizarUsuario->update(['email' => $email]);
            }

            if ($password1 != "") {
                $actualizarUsuario->update(['password1' => $password1]);
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
