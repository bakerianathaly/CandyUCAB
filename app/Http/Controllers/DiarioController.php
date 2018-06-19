<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Validator;

class DiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $descuentos=DB::select('select fkproducto, Des_cantidad, Des_new_precio from Descuento');
        $diario=DB::select('select Dia_fvencimiento, Dia_femision from Diario order by Dia_fvencimiento desc');
        $date=date(now());
        $date=date("d-m-Y",strtotime($date));
        $productos=DB::Select(DB::raw("SELECT pro_ruta_imagen, pro_descripcion, pro_id, pro_nombre from Producto"));
        return view('candy-promociones',compact('descuentos','diario','date','productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){   
        /* @session_start();
        if ($_SESSION['Middleware'] == true){
            if ($_SESSION['tipo']=='Empleado'){
                $productos=DB::Select(DB::raw("SELECT pro_id, pro_nombre, pro_descripcion, pro_ruta_imagen from Producto"));
                return view ('crear-promociones', compact('productos'));
            }
            else {
                return view('candy-promociones');
            }
        }
        else {
            return view('candy-login');
        } */
        $productos=DB::Select(DB::raw("SELECT pro_id, pro_nombre, pro_descripcion, pro_ruta_imagen from Producto"));
        return view ('crear-promociones', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'finicio' => 'required|date',
            'ffinal'=> 'required|date',
            'producto'=> 'required|array| between: 1,100000',
            'descuento'=> 'required|array| between: 1,100000'
        ];
        $customMessages = [
            'finicio.required' => 'Debe introducir la fecha de creacion del Diario',
            'ffinal.required' => 'Debe introducir la fecha de vencimiento del Diario',
            'producto.required' => 'Debe introducir al menos un producto',
            'descuento.required' => 'Debe introducir al menos un descueto'
        ];

        $this->validate($request, $rules, $customMessages);
        $finicio=$request->input('finicio');
        $finicio=date("d-m-Y",strtotime($finicio)); 
        $ffinal=$request->input('ffinal');
        $ffinal=date("d-m-Y",strtotime($ffinal));
        $producto=$request->input('producto');
        $descuento=$request->input('descuento');
        DB::insert('Insert into Diario (Dia_femision, Dia_fvencimiento) values (?,?)',
        [$finicio,$ffinal]);
        if ($producto[0] != ' ' && $descuento[0] != ' '){
            $i=0;
            $x=count($producto); //Cuenta cuantas posiciones hay en el arreglo
            $id = DB::select("SELECT Dia_id from Diario order by Dia_id desc limit 1");
            
            while($i< $x){
                $precio=DB::select("SELECT Pro_precio from Producto where Pro_id = ?",[$producto[$i]]);
                $precio= $precio[0]->pro_precio - (($precio[0]->pro_precio * $descuento[$i])/100);
                DB::insert('Insert into Descuento (fkproducto, fkdiario, Des_finicio, Des_ffinal, Des_cantidad, Des_new_precio) values (?,?,?,?,?,?)',
                [$producto[$i],$id[0]->dia_id, $finicio,$ffinal, $descuento[$i], $precio]);
                $i=$i+1;
            }
            return view ('candy-inicio');
        }
        else {
            return view('crear-promociones');
        }
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
        //
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
}
