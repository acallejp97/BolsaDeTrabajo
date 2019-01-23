<?php

Auth::routes();
Route::get('/logout', 'HomeController@logout');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return redirect('/login');
        }
    });
    //Comunes
    Route::get('/home', "Controller@Ofertas");
    Route::get('/contacto', "Controller@Contacto");
    Route::get('/perfil', "Controller@Perfil");
    Route::post('/actualizarUsuario', "Controller@updateUser");
    Route::post('/fotoperfil', 'Controller@updateProfile');

    //Admin
    Route::get('/buzon', "Profe_AdminController@Buzon");
    Route::get('/anadirProfesores', "Profe_AdminController@AnadirProfesor");

    //Profe y admin
    Route::get('/empresas', "Profe_AdminController@Empresas");
    Route::get('/anadirEmpresas', "Profe_AdminController@AnadirEmpresas");
    Route::get('/anadirUsuarios', "Profe_AdminController@AnadirUsuarios");
    Route::get('/usuarios', "Profe_AdminController@Usuarios");
    Route::get('/cursos', "Profe_AdminController@Cursos");
    Route::get('/aniadirDepartamento', 'Profe_AdminController@insertDepartament');

    //Alumno
    Route::get('/actualizarCV', "AlumnoController@ActualizarCV");
    Route::post('/fotocv', 'AlumnoController@updatecv');
/*
    Route::post('alumnos/contacto', "AlumnoController@Contacto");
                Route::post('profes_admin/contacto', "ProfeController@Contacto");*/
});
