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

Route::resource('Tienda/admin','TiendasController');
 
Route::get('Carrito/create/{id}','PresupuestosController@create');
 
Route::get('Carrito/{id}','PresupuestosController@index');
 
Route::get('Carrito/{carritoid}/{id}','PresupuestosController@add');
 
Route::delete('Carrito/{carritoid}/{id}','PresupuestosController@delete');
 
Route::post('Carrito/{carritoid}','PresupuestosController@update');
 
Route::get('Tiendas/lista','TiendasController@tiendas');
 
Route::get('Tiendas/lista/{id}','TiendasController@inventario');

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
