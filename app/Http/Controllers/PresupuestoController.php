<?php
 
namespace App\Http\Controllers;
 
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Validator;
use DateTime;
use DateTimeZone;
 
class PresupuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         @session_start();
         $presupuestos = DB::select('select * from presupuesto where pre_id = ?', [$id]);
         $presupuesto=$presupuestos[0];
         $productos = DB::select('select * from pre_pro where fkpresupuesto = ?', [$id]);
         foreach ($productos as $product){
           $xs = DB::select('select pro_nombre,pro_ruta_imagen from producto where pro_id = ?', [$product->fkproducto]);
           $x  = $xs[0];
           $product ->pro_nombre = $x->pro_nombre;
           $product ->pro_ruta_imagen = $x ->pro_ruta_imagen; 
         }
         return view('carrito', compact('presupuesto','productos'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
<<<<<<< HEAD
           @session_start();
          if($_SESSION['Middleware']==true){
          $id = $_SESSION['id'];
          $timezone = 'AMERICA/CARACAS'; 
          $date = new DateTime('now', new DateTimeZone($timezone));
          $localtime = $date->format('Y m d h:i:s a');
          DB::insert('insert into presupuesto (pre_descripcion, pre_fcreacion, pre_montototal,fkusuario) values (?, ?, ?, ?)', ['carrito',$localtime,0,$id]);
          $carritoid = DB::select('select pre_id from presupuesto where fkusuario= ? order by pre_id Desc limit 1;', [$id]);
          $_SESSION['carritoid']=$carritoid[0]->pre_id;
          return redirect()->action('PresupuestosController@index',$_SESSION['carritoid']);
=======
          @session_start();
          if(Session::has('userid')){
          $id = Session::get($useid);
          $current = Carbon::now();
          DB::insert('insert into presupuesto (pre_descripcion, pre_fcreacion, pre_montototal,fkusuario) values (?, ?, ?, ?)', ['carrito', $current = new Carbon(),0,$id]);
          $carritoid = DB::select('select pre_id from presupuesto where fkusuario = ?', [$id]);
          $_SESSION['carritoid']=$carritoid;
          return redirect()->action('PresupuestosController@index',$carritoid);
>>>>>>> Carrito
          }else{
              return redirect('/login');
          }
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function add($carritoid,$id,$cantidad)
    {   
         @session_start();
        // $carritoid = Session::get('carritoid');
        $precio = DB::select('select pro_precio from producto where pro_id = ?', [$id]);
        DB::insert('insert into pre_pro (fkproducto, fkpresupuesto, pre_cantidad , pre_precio) values (?, ?, ?,?)', [$id , $carritoid ,$cantidad,$precio[0]->pro_precio]);
        // Session::flash('carritoid', $carritoid);
        return redirect()->action('PresupuestosController@index',$_SESSION['carritoid'])->with('success','El producto fue agregado');
    }
    public function delete($carritoid,$id)
    {   
         @session_start();
        // $carritoid = Session::get('carritoid');
        DB::delete('delete from pre_pro where fkpresupuesto = ? and fkproducto = ?', [$carritoid ,$id ]);
        // Session::flash('carritoid', $carritoid);
        return redirect()->action('PresupuestosController@index',$carritoid)->with('success','El producto fue editado');
    }
     public function actualizar(Request $request,$id)
    {   
         @session_start();

        $cantidad = $request->input('cantidad');
        $i=0;
        $productos = DB::select('select * from pre_pro where fkpresupuesto = ?', [$_SESSION['carritoid']]);
        foreach($productos as $producto){
        DB::update('update pre_pro set pre_cantidad = ? where pre_id = ? and pre_cantidad != ?', [$cantidad[$i], $producto->pre_id,$cantidad[$i]]);
        $i++;
        }
        return redirect()->action('PresupuestosController@index',$id);
    }
     public function mostrarPago($id)
    {   
           @session_start();
          if($_SESSION['Middleware']==true){
          $clienteid = DB::select('select fkcliente from usuario where fkcliente = ?', [$id]);
          $metodos=DB::select('select met_id,met_tipo from metodo_pago where fkcliente = ?', [$clienteid[0]->fkcliente]);
          return view('metodo-pago',compact('metodos'));
          }else{
              return redirect('/login');
          }
    }
      public function compraOnline($carritoid)
    {   
          @session_start();
          if($_SESSION['Middleware']==true){
          $presupuesto= DB::select('select * from presupuesto where pre_id = ?', [$carritoid]);
          $productosPre = DB::select('select * from pre_pro where fkpresupuesto = ?', [$carritoid]);
          $precioTotal=0;
          $cantidadTotal=0;
          foreach($productosPre as $producto){
              $precio=DB::select('select pro_precio from producto where pro_id = ?', [$producto->fkproducto]);
              $producto->precio=$precio[0]->pro_precio;
              $precioTotal= $precioTotal+$precio[0]->pro_precio;
              $cantidadTotal=$cantidadTotal+$producto->pre_cantidad;
          }
          $mytime = Carbon::now();
          $fecha =date("d-m-Y",strtotime($mytime->toDateTimeString()));
          DB::insert('insert into pedido (ped_descripcion, ped_fecha, ped_cantidad,ped_total,fkusuario) values (?,?,?,?,?)', ['Pedido por tienda',$fecha,$cantidadTotal,$precioTotal,$_SESSION['id']]);
          $pedido = DB::select('select * from pedido where fkusuario= ? order by ped_id Desc limit 1;', [$_SESSION['id']]);
          foreach($productosPre as $producto){
             DB::insert('insert into ped_pro (ped_precio, ped_cantidad,fktienda,fkproducto,fkpedido) values (?, ?,?,?,?)', [ $producto->precio, $producto->pre_cantidad,$_SESSION['tiendaid'],$producto->fkproducto,$pedido[0]->ped_id]);
          }
          $productos= DB::select('select * from ped_pro where fkpedido = ?', [$pedido[0]->ped_id]);
          foreach($productos as $producto){
               $xs = DB::select('select pro_nombre,pro_ruta_imagen from producto where pro_id = ?', [$producto->fkproducto]);
               $x  = $xs[0];
               $producto->pro_nombre = $x->pro_nombre;
               $producto->pro_ruta_imagen = $x ->pro_ruta_imagen; 
          }
          DB::update('update inventario set inv_cantidad = inv_cantidad-?,inv_precio=inv_precio-? where fktienda = ?', [$cantidadTotal,$precioTotal,$_SESSION['tiendaid']]);
          Session::flash('productos', $productos);
          Session::flash('pedido', $pedido);
          return redirect()->action('PresupuestosController@factura');

          }else{
              return redirect('/login');
          }
    }

    public function factura()
    {   
        @session_start();
        if(Session::has('productos') && Session::has('pedido')){
          if($_SESSION['Middleware']==true){
          $productos=Session::get('productos');
          $pedido=Session::get('pedido');
          return view('factura',compact('pedido','productos'));
          }else{
              return redirect('/');
          }
        }else{
              return redirect('/');
          }
    }

     public function borrarCarrito()
    {   
           @session_start();
          if($_SESSION['Middleware']==true){
          $_SESSION['carritoid']='';
          $_SESSION['Tiendaid']='';
          return redirect('/');
          }else{
              return redirect('/login');
          }
    }

     
}