<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
                $profe = Profe_Admin::where('id_user', Auth::user()->id)->first();
                $user = User::all();
                $empresas = Empresa::all();
                $ofertas = Oferta::all();
                $grados = Grado::all();
                $empresa_oferta = array('empresas' => $empresas, 'user' => $user, 'ofertas' => $ofertas, 'grados' => $grados, 'profesor' => $profe);
                if (!$empresa_oferta) {
                    return view("profes_admin/anadirofertas");
                }
                return view("profes_admin/anadirofertas")->with('result', $empresa_oferta);

                break;

            case 1:
                $id_profe = Profe_Admin::select('id')->where('id_user', Auth::user()->id)->first();
                $empresas = Empresa::all();
                $ofertas = Oferta::all();
                $grados = Grado::all();
                $empresa_oferta = array('empresas' => $empresas, 'ofertas' => $ofertas, 'grados' => $grados, 'id_profesor' => $id_profe);
                $result = array_unique($empresa_oferta);
                if (!$result) {
                    return view("profes_admin/anadirofertas");
                }
                return view("profes_admin/anadirofertas")->with('result', $result);

                break;

            case 2:
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

    public function prueba(){
        return view("profes_admin/pruebavue");

    }
    public function csv(Request $request){
     //conexiones, conexiones everywhere

    if(isset($_POST['submit']))
    {
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' <br>';
         $chk_ext = explode(".",$fname);
         
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
 
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
             {
               //Insertamos los datos con los valores...
               $q = "INSERT INTO importacion (email, nombre, apellidos, password ) VALUES (
                '$data[0]', 
                '$data[1]',
                '$data[2]'
                '$data[3]')";
                mysql_query($sql) or die('Error: '.mysql_error());
            }
            //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
            fclose($handle);
            echo "Importación exitosa!";
            return view("profes_admin/anadirusuarios");
        }
        else
        {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
            //ver si esta separado por " , "
            echo "Archivo invalido!";
        }
    
    }}
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
