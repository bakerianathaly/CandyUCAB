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
Route::get('/', function () {
    return view('candy-inicio');
});
Route::get('/login',function(){
    return view('candy-login');
});
Route::get('/promociones',function(){
    return view('candy-login');
});