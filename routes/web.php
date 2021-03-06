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
Route::get('reporte', 'ReportesController@inicio');
Route::get('reporte/1', 'ReportesController@reporte1');
Route::get('reporte/2', 'ReportesController@reporte2');
Route::get('reporte/3', 'ReportesController@reporte3');
Route::get('reporte/4', 'ReportesController@index4');
Route::post('reporte/4', 'ReportesController@reporte4');
Route::get('reporte/5', 'ReportesController@index5');
Route::post('reporte/5', 'ReportesController@reporte5');
Route::get('reporte/7', 'ReportesController@reporte7');
Route::get('reporte/8', 'ReportesController@index8');
Route::post('reporte/8', 'ReportesController@reporte8');
Route::get('reporte/9', 'ReportesController@reporte9');
Route::get('reporte/10', 'ReportesController@reporte10');
Route::get('reporte/11', 'ReportesController@reporte11');
Route::get('reporte/12', 'ReportesController@reporte12');
Route::get('reporte/13', 'ReportesController@reporte13');
Route::get('reporte/15', 'ReportesController@reporte15');
Route::get('reporte/16', 'ReportesController@reporte16');
Route::get('reporte/17', 'ReportesController@reporte17');

Route::resource('Producto','ProductosController');

Route::resource('registro','ClientsController');

Route::post('registro/usuario','ClientsController@crearUsuario');

Route::get('admin/usuarios','ClientsController@listarUsuarios');

Route::post('admin/usuarios/{id}','RolController@asignarRol');

Route::resource('perfil','PerfilController');

Route::post('perfil/MP','PerfilController@clienteMP');

Route::get('Perfil/pagosMP','PerfilController@mostratMP');

Route::resource('Tiendas/admin','TiendasController');
 
Route::get('Carrito/create/{id}','PresupuestosController@create');
 
Route::get('Carrito/{id}','PresupuestosController@index');
 
Route::get('Carrito/add/{carritoid}/{id}/{cantidad}','PresupuestosController@add');
 
Route::get('Carrito/delete/{carritoid}/{id}','PresupuestosController@delete');

Route::get('Carrito/pago/{id}','PresupuestosController@mostrarPago');

Route::post('Carrito/compraOnline/{carritoid}','PresupuestosController@compraOnline');

Route::get('Pedido/factura','PresupuestosController@factura');

Route::get('Pedido/exit','PresupuestosController@borrarCarrito');

Route::post('Carrito/actualizar/{id}','PresupuestosController@actualizar');
 
// Route::update('Carrito/{carritoid}','PresupuestosController@update');
 
Route::get('Tiendas/lista','TiendasController@tiendas');

Route::post('Pedido/actualizar/{tiendaid}/{pedidoid}/{status_id}','PresupuestosController@actualizarStatus');

Route::get('Pedidos/admin/tienda/{id}','TiendasController@listarPedidos');
 
Route::get('Tiendas/lista/{id}','TiendasController@inventario'); 
Route::resource('DiarioDulce','DiarioController');
Route::resource('Tienda','TiendasController');

Route::get('Rol/admin','RolController@listarRoles');

Route::get('admin/rol/privilegios/{id}','RolController@privilegiosRol');

Route::get('Rol/admin/delete/{id}','RolController@eliminarRol');

Route::get('Rol/admin/agregar','RolController@agregarRol');

Route::post('Rol/admin/add','RolController@add');

Route::post('Rol/admin/edit/{id}','RolController@edit');


Route::get('/', function () {
    return view('candy-inicio');
});
Route::get('logout', 'ClientsController@logout');

Route::get('login',function(){
    return view('candy-login');
})->middleware('Autenticado');

Route::post('login','ClientsController@login');
//Route::post('login','Auth\LoginController@authenticate');
Route::get('SesionFallida','ClientsController@SesionFallida');
Route::get('iniciarSesion','ClientsController@abrirSesion');
Route::get('ImportarExcel', 'ImportController@import');
