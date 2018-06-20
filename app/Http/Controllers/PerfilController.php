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

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        @session_start();
        if ($_SESSION['Middleware'] == true){
            if($_SESSION['tipo'] == 'Cliente'){
                $cli_id=DB::select('select fkCliente from Usuario where Usu_id = :id',['id'=>$_SESSION['id']]); 
                $tipo='N';
                $cli_info=DB::select('select cli_nombre, cli_apellido, cli_ci, cli_correo, fktienda,cli_numcarnet, cli_id from Cliente where cli_tipo= ? and cli_id= ?',[$tipo, $cli_id[0]->fkcliente]);
                $pago=DB::select('select met_nombre_titular,met_num_tarjeta, met_fvencimiento, met_tipo from Metodo_pago where fkcliente = :id',['id'=>$cli_id[0]->fkcliente]);
                return view('perfil-usuario', compact('cli_info','pago','cli_id'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){   
        @session_start();
        if ($_SESSION['Middleware'] == true){
            $cli_id=DB::select('select fkCliente from Usuario where Usu_id = :id',['id'=>$_SESSION['id']]); 
            $tipo='N';
            $cli_info=DB::select('select cli_nombre, cli_apellido, cli_ci, cli_correo, fktienda,cli_numcarnet, cli_id from Cliente where cli_tipo= ? and cli_id= ?',[$tipo, $cli_id[0]->fkcliente]);
            $pago=DB::select('select met_nombre_titular,met_num_tarjeta, met_fvencimiento, met_tipo from Metodo_pago where fkcliente = :id',['id'=>$cli_id[0]->fkcliente]);
            return view('perfil-pagos', compact('cli_info','pago','cli_id'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        @session_start();
        if ($_SESSION['tipo'] == 'Empleado'){
            $rules = [
                'nombre' => 'required|string|between: 1,50',
                'correo'=> 'required|email',
                'fvencimiento' => 'nullable|date',
                'num_tarjeta'=> 'nullable|string|between: 1,50',
                'num_cheque'=> 'nullable|string|between: 1,50',
                'banco' => 'nullable|string|between: 1,50',
                'tipo' => 'required|string|'
            ];
            $customMessages = [
                'nombre.required' => 'Debe introducir el nombre del titular',
                'correo.required' => 'Debe introducir el correo del cliente registrado',
                'tipo.required' => 'Debe introducir seleccionar un tipo de pago '
            ];
    
            $this->validate($request, $rules, $customMessages);
            $nombre=$request->input('nombre');
            $correo=$request->input('correo');
            $fvencimiento=$request->input('fvencimiento');
            $num_tarjeta=$request->input('num_tarjeta');
            $num_cheque=$request->input('num_cheque');
            $banco=$request->input('banco');
            $tipo=$request->input('tipo');

            $id=DB::Select('select cli_id from Cliente where cli_correo = ?',[$correo]);
            if ($id == null){
                return redirect('/registro/create')->with('error','No existe cliente con ese correo');
            }
            else{
                DB::insert('Insert into Metodo_pago (Met_nombre_titular, Met_fvencimiento, Met_num_tarjeta, Met_num_cheque, Met_banco, Met_tipo, fkcliente) values (?,?,?,?,?,?,?)',
                [$nombre,$fvencimiento,$num_tarjeta,$num_cheque,$banco,$tipo, $id[0]->cli_id]);
                return redirect('/')->with('success','Metodo de pago agregado');
            } 
        }
    }

    public function clienteMP(Request $request){
        @session_start();
        $rules = [
            'nombre' => 'required|string|between: 1,50',
            'fvencimiento' => 'required|date',
            'num_tarjeta'=> 'required|string|between: 1,50'
        ];
        $customMessages = [
            'nombre.required' => 'Debe introducir el nombre del titular',
        ];

        $this->validate($request, $rules, $customMessages);
        $nombre=$request->input('nombre');
        $correo=$request->input('correo');
        $fvencimiento=$request->input('fvencimiento');
        $num_tarjeta=$request->input('num_tarjeta');
        $tipo='T';

        $id=DB::Select('select fkcliente from Usuario where usu_id = ?',[$_SESSION['id']]);
        
        DB::insert('Insert into Metodo_pago (Met_nombre_titular, Met_fvencimiento, Met_num_tarjeta,Met_tipo, fkcliente) values (?,?,?,?,?)',
        [$nombre,$fvencimiento,$num_tarjeta,$tipo, $id[0]->fkcliente]);
        return redirect('/')->with('success','Metodo de pago agregado'); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $tipo='N';
        $cli_info=DB::select('select cli_nombre, cli_apellido, cli_ci, cli_correo, fktienda,cli_numcarnet, cli_id from Cliente where cli_tipo= ? and cli_id= ?',[$tipo, $id]);
        $auxid = $id;
        $dig =10;
        if ($cli_info[0]->cli_numcarnet == null){
            while ( $auxid >= 10){ //Calculo la cantidad de digitos que tiene el id del cliente
                $x = $auxid%10;
                $auxid= $auxid /10;
                $dig=$dig*10;
            }
            $dig2=$dig;
            while($dig2 < 100000000){
                $carnet='0';
                if ($dig2 == $dig){
                    $num=$id;
                }
                $num=$carnet.$num;
                $dig2=$dig2*10;
            }
            $numcarnet=$cli_info[0]->fktienda.' - '.$num;
            $x=DB::update('update Cliente set cli_numcarnet=? where cli_id= ?',[$numcarnet,$id]);
        }
        else {
            $numcarnet=$cli_info[0]->cli_numcarnet;
        }
        return view('carnet', compact('cli_info','numcarnet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
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
