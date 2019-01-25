<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Correo;
use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\User;
use Auth;
use Hash;
use Session;
use Excel;
use File;

class Profe_AdminController extends Controller
{
    public function __construct()
    {
    }
    public function Empresas()
    {
        $empresas = Empresa::all();
        if (!$empresas) {
            return view("profes_admin/empresas");
        }
        return view("profes_admin/empresas")->with('empresas', $empresas);
    }

    public function AnadirUsuarios()
    {
        return view("profes_admin/anadirusuarios");
    }

    public function csv(Request $request)
    {
        //validate the xls file
        $this->validate($request, array(
            'file' => 'required',
        ));

        if ($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();
                if (!empty($data) && $data->count()) {
                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'email' => $value->email,
                            'nombre' => $value->nombre,
                            'rango' => 2,
                            'apellidos' => $value->apellidos,
                            'password' => Hash::make('prueba'),
                        ];
                    }
                    if (!empty($insert)) {
                        $insertData = User::insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        } else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }
                return back();
            } else {
                Session::flash('error', 'File is a ' . $extension . ' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

    public function Cursos()
    {
        $departamentos = Departamento::all();
        $grados = Grado::all();
        $grados_depar = array('departamentos' => $departamentos, 'grados' => $grados);
        if (!$departamentos) {
            return view("profes_admin/cursos");
        }
        return view("profes_admin/cursos")->with('grados_depar', $grados_depar);
    }

    /*--------------------------------------------MOSTRAR TODOS LOS USUARIOS------------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------------------*/

    public function Usuarios()
    {
        switch (Auth::user()->rango) {

            case 0:
                $alumno = User::all();
                break;
            case 1:
                $profe = Profe_Admin::where('id_user', Auth::user()->id)->first();
                $grados = Grado::where('id_depar', $profe->id_depar); //Mas de un nombre | Pasar
                foreach ($grados as $grado) {
                    $alumnos_grado = Alumno_Grado::where('id_grado', $grado->id);
                    foreach ($alumnos_grado as $alumno_grado) {
                        $alumno = Alumno::where('id', $alumno_grado->id_alumno)->first(); //Pasar
                        $usuario = User::where('id', $alumno->id_user); //Pasar
                    }
                }
                break;
        }
        return view("profes_admin/usuarios")->with('alumno', $alumno);
    }

    //******* */FUNCIONES DE ADMIN********************
    public function AnadirProfesores()
    {
        $profesor = Profe_Admin::all();
        $user = User::all();
        $departamento = Departamento::all();
        $profesores = array('profe_admin' => $profesor, 'user' => $user, 'departamento' => $departamento);
        if (!$profesor) {
            return view("profes_admin/anadirprofesores");
        }
        return view("profes_admin/anadirprofesores")->with('profesores', $profesores);
    }

    public function Buzon()
    {
        $correos = Correo::all();
        $user = User::all();
        $user_correos = array('correos' => $correos, 'user' => $user);
        if (!$correos) {
            return view("profes_admin/buzon");
        }
        return view("profes_admin/buzon")->with('user_correos', $user_correos);
    }

    public function insertDepartamento(Request $request)
    {

        if (!$request->ajax()) {
            return redirect('/');
        }
        if (isset($_REQUEST['nuevoDepartamento'])) {
            $enviado = json_decode($_REQUEST['nuevoDepartamento']);
            $nombre = $enviado->nombre;

            $insertarDepartamento = new Departamento;
            $insertarDepartamento->insert(['nombre' => $nombre]);
        } else {
            $insertarDepartamento->delete();

        }
    }


    public function insertGrado(Request $request)
    {

        $enviado = json_decode($_REQUEST['nuevoGrado']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $nombre = $enviado->nombre;
        $idDepar = $enviado->idDepar;
        $abreviacion = $enviado->abreviacion;

        $insertarGrado = new Grado;
        if ($nombre != "") {
            $insertarGrado->insert(['nombre' => $nombre, 'id_depar' => $idDepar, 'abreviacion' => $abreviacion]);
        }
    }

    public function deleteGrado(Request $request)
    {

        $enviado = json_decode($_REQUEST['borrarGrado']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $nombre = $enviado->nombre;

        if ($nombre != "") {
            Grado::where('id', $nombre)->delete();
        }

    }

    public function store(Request $request)
    {
        $correo = Correo::all;
        $correo->$nombre = $request->input('nombre');
        $correo->$email = $request->input('email');
        $correo->$mensaje = $request->input('mensaje');
        $correo->save();
        Notification::success('El correo ha sido enviado exitosamente');
        return redirect('alumno/contacto', "AlumnoController@Contacto");
    }

    public function insertarOferta(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $enviado = json_decode($_REQUEST['nuevaOferta']);

        $titulo = $enviado->titulo;
        $descripcion = $enviado->descripcion;
        $id_empresa = $enviado->id_empresa;
        $id_grado = $enviado->id_grado;
        $id_profesor = $enviado->id_profesor;
        $puestos = $enviado->puestos;
        $oferta = new Oferta;
        $oferta->insert(['titulo' => $titulo, 'descripcion' => $descripcion, 'id_empresa' => $id_empresa, 'id_grado' => $id_grado, 'id_profesor' => $id_profesor, 'puestos-vacantes' => $puestos]);

    }
    public function insertarProfe(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $enviado = json_decode($_REQUEST['nuevaProfe']);

        $nombre = $enviado->nombre;
        $apellido = $enviado->apellido;
        $email = $enviado->email;
        $password1 = $enviado->password1;
        $rango= $enviado->rango;
        $user = new User;
        $user->insert(['nombre' => $nombre, 'apellido' => $apellido, 'email' => $email, 'password1' => $password1, 'rango' => $rango]);

    }

    public function insertarEmpresa(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $enviado = json_decode($_REQUEST['nuevaEmpresa']);

        $nombre = $enviado->nombre;
        $direccion = $enviado->direccion;
        $email = $enviado->email;
        $url = $enviado->url;
        $telefono = $enviado->telefono;

        $empresa = new Empresa;
        $empresa->insert(['nombre' => $nombre, 'direccion' => $direccion, 'email' => $email, 'url' => $url, 'telefono' => $telefono]);

    }
}
