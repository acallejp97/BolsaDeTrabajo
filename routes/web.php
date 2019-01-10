<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//  Route::get ('/', "HomeController@index");
// Route::get ('/inicio', "Paginas@inicio");
// Route::get ('/quieneSomos', "Paginas@quieneSomos");
// Route::get ('/dondeEstamos', "Paginas@dondeEstamos");
// Route::get ('/foro', "Paginas@foro");


//Busca el Perro con la id que le meta
Route::get ('/VerAlumno/{id}', "AlumnoController@VerAlumno");

// Route::get ('/VerAnimales', "AnimalesController@VerAnimales");
// Route::get ('/aniadirAnimales', "AnimalesController@aniadirAnimales");
// Route::get ('/duenio/aniadir', "AnimalesController@irAniadirDuenio");
// Route::post ('/aniadirDuenio', "AnimalesController@aniadirDuenio");


// Route::get('alumnos/{slug}', function ($slug) {
//     return $slug;
// })-> where (['slug'=>'create|delete|update']);


 Route::get('', function()
{
     return view('home', array('nombre' => 'Javi'));
 });

// //cuando el parametro es opcional se pone interrogracion, 
// //o se pone valor por defecto o igual a null
// Route::get('alumnos/{id}/{nombre?}', function ($id,$nombre =null) {
//     if($nombre){
//     return 'Nombre del alumno: '.$nombre.' con identificativo '.$id;
//     }
//     else{ return 'alumno con identificativo '.$id;
//     }
    

// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('alumnos', function () {
//     return 'adios';
// });


// Route::get('alumnos/{id}', function ($id) {
//     return 'Notas del alumno: '.$id;
// })-> where ('id', '[0-9]+');
// // -> where ('id', '[/d]+');



// Route::get('alumnos/{nombre}', function ($nombre) {
//     return 'Nombre del alumno: '.$nombre;
// })-> where ('nombre', '[A-Za-z]+');
// // -> where ('nombre', '[-/w]+');




Auth::routes();


//-----------DEPENDIENDO DEL USUARIO LOGUEADO LLEVARÁ A UNA PÁGINA U OTRA-------//
Route::get ('/', function(){
    if (Auth::user()){ //se valida si está logueado
        if(Auth::user()->rango =='0'){
            return redirect('/admin');
        }
        else if(Auth::user()->rango =='1'){
            return redirect('/profe');
        }
        else{
        return redirect('/alumno');
        }
    }else{
        return redirect('/login');
    }   
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/alumnos/home', 'AlumnoController@VerAlumnos')->name('/Alumnos/alumno');
Route::get('/profesores/home', 'ProfesorController@VerProfesores')->name('/Profesores/profesor');
Route::get('/administradores/home', 'AdministradorController@VerAdministrador')->name('/Administradores/administrador');

