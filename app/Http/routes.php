<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/deal-with-it', 'WelcomeController@deal');
Route::get('/deal-with-it-extreme', 'WelcomeController@dealExtreme');

// Rutas para registro y autenticación de usuarios
Route::get('auth/register', 'Auth\AuthController@getRegister'); // Muestra el formulario para el registro de un usuario
Route::post('auth/register', 'Auth\AuthController@postRegister'); // Recibe los datos del formulario de registro de usuarios
Route::get('auth/login', 'Auth\AuthController@getLogin'); // Muestra el formulario para iniciar sesión
Route::post('auth/login', 'Auth\AuthController@postLogin'); // Recibe los datos para iniciar sesión
Route::get('auth/logout', 'Auth\AuthController@getLogout'); // Ruta para cerrar sesión de usuario

Route::resource('usuarios','UsuariosController');

Route::any('{all}', function(){
    return view('errors.404');
})->where('all', '.*');
