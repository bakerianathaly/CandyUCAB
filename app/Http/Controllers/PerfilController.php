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
    public function store(Request $request)
    {
        //
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
