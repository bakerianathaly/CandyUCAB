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
Route::resource('Producto','ProductosController');
Route::resource('registro','ClientsController');
Route::post('registro/usuario','ClientsController@crearUsuario');

Route::resource('Tienda','TiendasController');

Route::get('/', function () {
    return view('candy-inicio');
});
Route::get('logout', 'ClientsController@logout');
Route::get('login',function(){
    return view('candy-login');
})->middleware('Autenticado');
Route::get('/promociones',function(){
    return view('candy-login');
});
Route::post('login','ClientsController@login');
//Route::post('login','Auth\LoginController@authenticate');
Route::get('SesionFallida','ClientsController@SesionFallida');
Route::get('iniciarSesion','ClientsController@abrirSesion');
