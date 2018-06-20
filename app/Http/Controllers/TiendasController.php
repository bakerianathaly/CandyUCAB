<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Validator;
 
class TiendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         @session_start();
        $tiendas = DB::select('select * from public.Tienda');
        foreach ($tiendas as $tienda){
              
              $tienda->lugar = DB::select('select lug_nombre from public.lugar where lug_id = ?', [$tienda->fklugar]);
              $tienda->lugar=$tienda->lugar[0];
              
        }
        return view('listar-tiendas', compact('tiendas','lugar'));
        //return $tiendas;
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        @session_start();
    //   $estados =  DB::select('select lug_id, lug_nombre,fklugar  from public.lugar where lug_id between  1601 and 1625');
    //   foreach ($estados as $estado){
    //       $estado->municipios = DB::select('select lug_id, lug_nombre,fklugar  from public.lugar where fklugar = ? ', [$estado->lug_id] );
    //       foreach ($estado->municipios as $municipio){
    //           $municipio->parroquia = DB::select('select lug_id, lug_nombre,fklugar  from public.lugar where fklugar = ? ', [$municipio->lug_id] );
    //       }
    //   }
        // $lugares= DB::select('select l.lug_id,l.lug_nombre,l.fklugar,s.lug_id,s.lug_nombre,s.fklugar,d.lug_id,d.lug_nombre,d.fklugar from lugar l, lugar s, lugar d where l.lug_id=s.fklugar and s.lug_id = d.fklugar order by l.lug_nombre, s.lug_nombre, d.lug_nombre, l.lug_id, l.fklugar, s.lug_id, s.fklugar, d.lug_id, d.fklugar;');
    //   $municipios = DB::select('select lug_id, lug_nombre,fklugar  from public.lugar where lug_id between  1 and 462');
      $parroquias = DB::select('select lug_id, lug_nombre,fklugar  from public.lugar where lug_id between  463 and 1600');
         return view('agregar-tienda',compact('parroquias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        @session_start();
       $rules = [
        'tipo' => 'required|string|between:1,50',
        'fklugar' => 'required|numeric'
        ];
         $customMessages = [
          'tipo.required' => 'Debe introducir el tipo de tienda',
              'fklugar.required' => 'Debe introducir la direccion de la tienda',
        ];
        $this->validate($request, $rules, $customMessages);
        $tipo = $request->input('tipo');
        $fklugar = $request->input('fklugar');
        DB::insert('Insert into public.tienda (Tie_tipo,fklugar) values (?,?)', [$tipo,$fklugar]);
        Session::flash('message', 'Tienda creada');
        return Redirect::to('Tienda');
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
        @session_start();
        $tiendas = DB::select('select * from public.tienda where tie_id = :id', ['id'=>$id]);
        $tienda=$tiendas[0];
        $lugares = DB::select('select * from public.lugar where lug_id = ? ', [$tienda->fklugar]);
        $lugar=$lugares[0];
        $parroquias = DB::select('select lug_id, lug_nombre,fklugar  from public.lugar where lug_id between  463 and 1600');
        return view('editar-tienda',compact('tienda','lugar','parroquias','id'));
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
        @session_start();
         DB::update('update Cliente set fktienda = 41 where fktienda = ?', [$id]);
         DB::delete('delete from public.Tienda where Tie_id = :id ', ['id'=>$id]);
        return redirect()->action('TiendasController@index')->with('success','La tienda fue eliminada exitosamente');
    }
<<<<<<< HEAD
=======

>>>>>>> Carrito
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function inventario($id){    
        @session_start();
=======
     public function inventario($id){    
>>>>>>> Carrito
         $inventarios = DB::select('select inv_id from inventario where fktienda = ?', [$id]);
         if($inventarios){
         $inventario = $inventarios[0];
         $fkproductos = DB::select('select fkproducto from pro_inv where fkinventario = ?', [$inventario->inv_id]);
         $productos = array();
         foreach($fkproductos as $fkproducto){
             $pro = DB::select('select * from producto where pro_id = ?', [$fkproducto->fkproducto]);
             $prod= $pro[0];
             array_push($productos, $prod);
         }
         $_SESSION['tiendaid']=$id;
         return view('Tienda-productos', compact('productos'));
        }else{
         return view('Tienda-productos');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function tiendas()
<<<<<<< HEAD
    {
        @session_start();
=======
    {    
         @session_start();
>>>>>>> Carrito
         $tiendas = DB::select('select * from tienda');
         foreach ($tiendas as $tienda){
             $lug= DB::select('select lug_nombre from lugar where lug_id = ?', [$tienda->fklugar]);
             $lugar =  $lug[0];
             $tienda->lug_nombre = $lugar->lug_nombre;
         }
 
        return view('Tiendas',compact('tiendas'));
    }
}