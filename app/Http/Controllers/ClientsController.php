<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Validator;

class ClientsController extends Controller
{
    /*  Consulta para las direcciones del cliente: 
        select q.*
        from lugar q, (select s.lug_id, s.lug_nombre from lugar s,lugar a where a.lug_nombre = 'Apure' and a.lug_id = s.fklugar) as x
        where x.lug_nombre = 'Achaguas' and q.fklugar = x.lug_id;  */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('candy-inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $estados =   DB::Select(DB::raw("SELECT lug_nombre, lug_id from lugar where lug_tipo= 'Estado';"));
        $municipios= DB::Select(DB::raw("SELECT lug_nombre, lug_id from lugar where lug_tipo = 'Municipio';"));
        $parroquias= DB::Select(DB::raw("SELECT lug_nombre, lug_id from lugar where lug_tipo = 'Parroquia';"));
        $tiendas = DB::select(DB::raw("SELECT t.tie_tipo, t.tie_id,l.lug_nombre from tienda t, lugar l where t.fklugar = l.lug_id;"));
        return view ('candy-registro', compact('estados','municipios','parroquias','tiendas'));
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
            'rif' => 'required|string|between:1,50',
            'correo' => 'required|string|between:1,50',
            'pagina_web' => 'nullable|string|between:1,50',
            'total_capital'=>'nullable|numeric',
            'deno_comercial' => 'nullable|string|between:1,50',
            'ci' =>'nullable|integer',
            'nombre' =>'nullable|string|between:1,50',    
            'apellido' =>'nullable|string|between:1,50',
            'num_carnet' =>'nullable|string|between:1,50',
            'tienda' =>'required|string|between:1,50'
        ];
        $customMessages = [
            'rif.required' => 'Debe introducir su RIF personal',
            'correo.required' => 'Debe introducir su correo',
            'tienda.required' => 'Debe introducir su tienda de preferencia'
        ];
            $this->validate($request, $rules, $customMessages);
            $rif = $request->input('rif');
            $correo = $request->input('correo');
            $pagina_web = $request->input('pagina_web');
            $total_capital = $request->input('total_capital');
            $deno_comercial = $request->input('deno_comercial');
            $ci = $request->input('ci');
            $nombre = $request->input('nombre');
            $apellido = $request->input('apellido');
            $num_carnet = $request->input('num_carnet');
            $tienda = $request->input('tienda');

        
                $tipo= 'N';
                DB::insert('Insert into Cliente (Cli_rif, Cli_correo, Cli_ci, Cli_nombre, Cli_apellido, Cli_num_carnet, Cli_tipo, fktienda)
                 values(?,?,?,?,?,?,?,?)', [$rif, $correo,$ci,$nombre,$apellido,$num_carnet,$tipo,$tienda]);
            

            Session::flash('message', 'Cliente creado');
            return Redirect::to('candy-inicio');
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
