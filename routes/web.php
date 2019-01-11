<?php





//RUTAS ALUMNOS




Route::get ('/VerOfertas', "AlumnoController@VerOfertas");


Route::get ('/Contacto', "AlumnoController@Contacto");


Route::get ('/VerPerfil', "AlumnoController@VerPerfil");


Route::get ('/ActualizarCV', "AlumnoController@ActualizarCV");














//RUTAS PROFESOR


Route::get ('/Ofertas', "Profe_AdminController@Ofertas");


Route::get ('/Empresas', "Profe_AdminController@Empresas");


Route::get ('/AnadirEmpresas', "Profe_AdminController@AnadirEmpresas");


Route::get ('/Anadiruser', "Profe_AdminController@Anadiruser");


Route::get ('/user', "Profe_AdminController@user");


Route::get ('/Perfil', "Profe_AdminController@Perfil");


Route::get ('/Cursos', "Profe_AdminController@Cursos");


Route::get ('/Contacto', "Profe_AdminController@Contacto");






//RUTAS ADMIN


Route::get ('/Buzon', "Profe_AdminController@Buzon");


Route::get ('/AnadirProfesor', "Profe_AdminController@AnadirProfesor");







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
            return redirect('/profesores/anadirofertas');
        }
        else if(Auth::user()->rango =='1'){
            return redirect('/profesores/anadirofertas');
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
Route::get('/profesores/home', 'Profe_AdminController@');//->name('/Profesores/profesor');

