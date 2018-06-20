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
            
        $diario=DB::select(DB::RAW("SELECT Dia_fvencimiento, Dia_femision,Dia_id from Diario order by Dia_fvencimiento desc limit 1"));
        if ($diario != null){
            $descuentos=DB::select('select fkproducto, Des_cantidad, Des_new_precio, fkdiario from Descuento');
            $productos=DB::Select(DB::raw("SELECT pro_ruta_imagen, pro_descripcion, pro_id, pro_nombre from Producto"));
            return view('candy-promociones',compact('descuentos','productos','diario'));
        }
        else if ($diario== null){
            return redirect('DiarioDulce/create')->with('error','Debe crear un diario primero');
        }
        else {
            return redirect('/')->with('error','No hay diario disponibles en este momento');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){   
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
    public function edit($id){
        $diario=DB::Select('select Dia_fvencimiento from Diario where Dia_id = :id',['id'=>$id]);
        $productos=DB::Select(DB::raw("SELECT pro_ruta_imagen, pro_descripcion, pro_id, pro_nombre from Producto"));
        $descuento=DB::select('select * from descuento where fkdiario = :id',['id'=>$id]);
        $y=count($descuento);
        return view('editar-diario', compact('diario','productos','descuento','id','y'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $rules = [
            'ffinal'=> 'nullable|date',
            'producto'=> 'nullable|array| between: 1,100000',
            'descuento'=> 'nullable|array| between: 1,100000'
        ];

        $this->validate($request, $rules);
        $ffinal=$request->input('ffinal');
        $ffinal=date("d-m-Y",strtotime($ffinal));
        $producto=$request->input('producto');
        $descuento=$request->input('descuento');
        $y=$request->input('des');
    
        DB::update('update Diario set dia_fvencimiento =? where Dia_id = ?',[$ffinal,$id]);
        $finicio= DB::select('select Dia_femision from Diario where Dia_id= :id',['id'=>$id]);
        if ($producto[0] != ' ' && $descuento[0] != ' '){
            $i=0;
            $x=count($producto); //Cuenta cuantas posiciones hay en el arreglo
            if ($x == $y){
                while($i< $x){
                    $precio=DB::select("SELECT Pro_precio from Producto where Pro_id = ?",[$producto[$i]]);
                    if ($precio != null){
                        $precio= $precio[0]->pro_precio - (($precio[0]->pro_precio * $descuento[$i])/100);
                    }
                    DB::update('update Descuento set fkproducto=?, Des_cantidad=?, Des_new_precio=?, fkDiario=?  where fkDiario = ? and fkProducto = ?',
                    [$producto[$i],$descuento[$i], $precio,$id,$id,$producto[$i]]);
                    $i=$i+1;
                }
            }
            else {
                while($i< $y){
                    $precio=DB::select("SELECT Pro_precio from Producto where Pro_id = ?",[$producto[$i]]);
                    if ($precio != null){
                        $precio= $precio[0]->pro_precio - (($precio[0]->pro_precio * $descuento[$i])/100);
                    }
                    DB::update('update Descuento set fkproducto=?, Des_cantidad=?, Des_new_precio=?, fkDiario=?  where fkDiario = ? and fkProducto = ?',
                    [$producto[$i],$descuento[$i], $precio,$id,$id,$producto[$i]]);
                    $i=$i+1;
                }
                while($i<$x){
                    $precio=DB::select("SELECT Pro_precio from Producto where Pro_id = ?",[$producto[$i]]);
                    $precio= $precio[0]->pro_precio - (($precio[0]->pro_precio * $descuento[$i])/100);
                    DB::insert('Insert into Descuento (fkproducto, fkdiario, Des_finicio, Des_ffinal, Des_cantidad, Des_new_precio) values (?,?,?,?,?,?)',
                    [$producto[$i],$id, $finicio[0]->dia_femision, $ffinal, $descuento[$i], $precio]);
                    $i=$i+1;
                }
            }
            return redirect('/DiarioDulce')->with('success','El diario fue editado con exito');
        }
        else {
            return view('crear-promociones');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        DB::delete('delete from descuento where fkDiario = :id', ['id'=>$id]);
        DB::delete('delete from Diario where Dia_id = :id', ['id'=>$id]);
        return redirect('/')->with('success','El diario fue eliminado');
    }
}
