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
    Route::get('/home', "Controller@Ofertas");
    Route::get('/contacto', "Controller@Contacto");
    Route::get('/perfil', "Controller@Perfil");

    Route::get('/buzon', "Profe_AdminController@Buzon");
    Route::get('/anadirProfesores', "Profe_AdminController@AnadirProfesor");

    Route::get('/empresas', "Profe_AdminController@Empresas");
    Route::get('/anadirEmpresas', "Profe_AdminController@AnadirEmpresas");
    Route::get('/anadirUsuarios', "Profe_AdminController@AnadirUsuarios");
    Route::get('/usuarios', "Profe_AdminController@Usuarios");
    Route::get('/cursos', "Profe_AdminController@Cursos");
    Route::post('/actualizarUsuario', 'Profe_AdminController@updateUser');

    Route::get('/actualizarCV', "AlumnoController@ActualizarCV");
});
