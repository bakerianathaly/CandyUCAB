<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Validator;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = DB::select('select * from public.Producto');
        return view('listar-productos', compact('productos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos=DB::select(DB::raw("SELECT tip_id, tip_nombre from tipo;"));
        $sabores=DB::select(DB::raw("SELECT sab_id, sab_nombre from sabor;"));
        /* Consultas de SQL puro para hacer un dropdown y poder insertar de una con el ID */
        return view('agregar-producto',compact('sabores','tipos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules = [
        'nombre' => 'required|string|between:1,50',
        'relleno' => 'nullable|string|between:1,50',
        'textura' => 'required|string|between:1,50',
        'puntuacion'=>'required|numeric|between:1,50',
        'sabor' =>'required|string|between:1,50',
        'tipo' =>'required|string|between:1,50',
        'precio'=>'required|numeric|between:1,99999'
        ];
         $customMessages = [
          'nombre.required' => 'Debe introducir el nombre del producto',
              'textura.required' => 'Debe introducir la textura del producto',
              'puntuacion.required' => 'Debe introducir la puntuacion del producto',
              'sabor.required' => 'Debe introducir el sabor del producto',
              'tipo.required' => 'Debe introducir el tipo del producto',
              'precio.required' => 'Debe introducir el precio del producto'
        ];
        $this->validate($request, $rules, $customMessages);
        $nombre = $request->input('nombre');
        $relleno = $request->input('relleno');
        $textura = $request->input('textura');
        $puntuacion = $request->input('puntuacion');
        $precio = $request->input('precio');
        $sabor = $request->input('sabor');
        $tipo = $request->input('tipo');
        DB::insert('Insert into public.Producto (Pro_nombre,Pro_relleno,Pro_textura,Pro_puntuacion,fksabor,fktipo,Pro_precio) values (?,?,?,?,?,?,?)', [$nombre,$relleno,$textura,$puntuacion,$sabor,$tipo,$precio]);
        Session::flash('message', 'Producto creado');
       return redirect()->action('ProductosController@index')->with('success','El producto fue agregado');
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    { 
       $Producto = DB::select('select * from public.Producto where Pro_nombre = ?', [$nombre]);
       return $Producto;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos=DB::select(DB::raw("SELECT tip_id, tip_nombre from tipo;"));
        $sabores=DB::select(DB::raw("SELECT sab_id, sab_nombre from sabor;"));
        $productos = DB::select('select * from public.Producto where Pro_id = :id', ['id'=>$id]);
        $producto=$productos[0];
        $sabs =  DB::select('select * from public.sabor where sab_id = ?', [$producto->fksabor]);
        $sab = $sabs[0];
        $tips =  DB::select('select * from public.tipo where tip_id = ?', [$producto->fktipo]);
        $tip = $tips[0];
        return view('editar-producto', compact('producto','sabores','tipos','id','sab','tip'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
        $rules = [
        'nombre' => 'required|string|between:1,50',
        'relleno' => 'nullable|string|between:1,50',
        'textura' => 'required|string|between:1,50',
        'puntuacion'=>'required|numeric|between:1,50',
        'sabor' =>'required|string|between:1,50',
        'tipo' =>'required|string|between:1,50',
        'precio'=>'required|numeric|between:1,99999'
        ];
         $customMessages = [
          'nombre.required' => 'Debe introducir el nombre del producto',
              'textura.required' => 'Debe introducir la textura del producto',
              'puntuacion.required' => 'Debe introducir la puntuacion del producto',
              'sabor.required' => 'Debe introducir el sabor del producto',
              'tipo.required' => 'Debe introducir el tipo del producto',
              'precio.required' => 'Debe introducir el precio del producto'
        ];
        $this->validate($request, $rules, $customMessages);
        $nombre = $request->input('nombre');
        $relleno = $request->input('relleno');
        $textura = $request->input('textura');
        $puntuacion = $request->input('puntuacion');
        $precio = $request->input('precio');
        $sabor = $request->input('sabor');
        $tipo = $request->input('tipo');
        DB::update('update public.Producto set pro_nombre = ?, pro_relleno = ?, pro_textura = ?, pro_puntuacion = ?, fksabor = ?, fktipo = ?, pro_precio = ? where pro_id = ?', [$nombre,$relleno,$textura,$puntuacion,$sabor,$tipo,$precio,$id]);
        return redirect()->action('ProductosController@index')->with('success','El producto fue editado');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from public.Producto where Pro_id = :id ', ['id'=>$id]);
        return redirect()->action('ProductosController@index')->with('success','El producto fue eliminado');
    }

}  