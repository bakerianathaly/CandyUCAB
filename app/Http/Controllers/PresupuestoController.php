<?php
 
namespace App\Http\Controllers;
 
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Validator;
 
class PresupuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $presupuestos = DB::select('select * from presupuesto where pre_id = ?', [$id]);
         $presupuesto=$presupuestos[0];
         $productos = DB::select('select * from pre_pro where fkpresupuesto = ?', [$id]);
         foreach ($productos as $product){
           $xs = DB::select('select pro_nombre,pro_ruta_imagen from producto where pro_id = ?', [$product->fkproducto]);
           $x  = $xs[0];
           $product ->pro_nombre = $x->pro_nombre;
           $product ->pro_ruta_imagen = $x ->pro_ruta_imagen; 
         }
         Session::flash('productos',$productos);
         return view('carrito', compact('presupuesto','productos'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
          @session_start();
          if(Session::has('userid')){
          $id = Session::get($useid);
          $current = Carbon::now();
          DB::insert('insert into presupuesto (pre_descripcion, pre_fcreacion, pre_montototal,fkusuario) values (?, ?, ?, ?)', ['carrito', $current = new Carbon(),0,$id]);
          $carritoid = DB::select('select pre_id from presupuesto where fkusuario = ?', [$id]);
          $_SESSION['carritoid']=$carritoid;
          return redirect()->action('PresupuestosController@index',$carritoid);
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
        $rules = [
        'cantidad' => 'required|numeric|between:1,1000',
        'pre_id' => 'required|numeric'
        ];
         $customMessages = [
          'cantidad.required' => 'Debe introducir la cantidad',
        ];
        $this->validate($request, $rules, $customMessages);
        $pre_id = $request->input('pre_id');
        $cantidad = $request->input('cantidad');
        DB::update('update pre_pro set pre_cantidad = ? where pre_id = ?', [$cantidad, $pre_id]);
        return redirect()->action('PresupuestosController@index',$id);  
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
        // $carritoid = Session::get('carritoid');
        $precio = DB::select('select pro_precio from producto where pro_id = ?', [$id]);
        DB::insert('insert into pre_pro (fkproducto, fkpresupuesto, pre_cantidad , pre_precio) values (?, ?, ?,?)', [$id , $carritoid ,$cantidad,$precio]);
        // Session::flash('carritoid', $carritoid);
        return redirect()->action('PresupuestosController@index',$carritoid)->with('success','El producto fue editado');
    }
    public function delete($carritoid,$id)
    {   
        // $carritoid = Session::get('carritoid');
        DB::delete('delete pre_pro where fkpresupuesto = ? and fkproducto = ?', [$carritoid ,$id ]);
        DB::insert('insert into pre_pro (fkproducto, fkpresupuesto, pre_cantidad , pre_precio) values (?, ?, ?,?)', [$id , $carritoid ,$cantidad,$precio]);
        // Session::flash('carritoid', $carritoid);
        return redirect()->action('PresupuestosController@index',$carritoid)->with('success','El producto fue editado');
    }
}