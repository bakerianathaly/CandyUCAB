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

class ReportesController extends Controller
{
    public function inicio(){
        @session_start();
        if ($_SESSION['Middleware'] == true){
            if ($_SESSION['tipo']=='Empleado'){
                return view('/reportes/reportes');
            }
            else{
                return view('candy-inicio');
            }
        }
        else{
            return view('candy-login');
        }
        
    }

    public function reporte1(){
        $egresos = DB::select(DB::raw("SELECT sum(p.pro_precio*t.tie_cantidad) as Egresos, ti.tie_tipo as tienda, l.lug_nombre as lugar
        FROM Producto p, Tie_pro t, Pedido_tienda pt, tienda ti, lugar l
        where pt.fktienda = ti.tie_id and t.fkproducto = p.pro_id and pt.ped_id = t.fkpedido_tienda and ti.fklugar = l.lug_id
        group by ti.tie_tipo, l.lug_nombre;"));

        $ingresos = DB::select(DB::raw("SELECT sum(p.pro_precio*q.ped_cantidad) as ingresos, t.tie_tipo as tienda, l.lug_nombre as lugar
        FROM pedido pe, ped_pro q, tienda t, producto p, lugar l 
        where l.lug_id = t.fklugar and q.fkpedido = pe.ped_id and q.fktienda = t.tie_id and p.pro_id = q.fkproducto
        group by t.tie_tipo, l.lug_nombre;
        "));
    
        return view('/reportes/reporte1', compact('egresos','ingresos'));
    }

    public function reporte2(){
        $asistencia = DB::select(DB::raw("SELECT a.asi_fentrada, a.asi_fsalida, e.emp_nombre, e.emp_apellido, d.dep_tipo, d.dep_nombre, t.tie_tipo, l.lug_nombre
        FROM asistencia a, empleado e, departamento d, tienda t, lugar l
        where a.fkempleado = e.emp_id and e.fkdepartamento = d.dep_id and d.fktienda = t.tie_id and t.fklugar = l.lug_id;"));
        
        return view('/reportes/reporte2', compact('asistencia'));
    }

    public function reporte(){
        $cli_top5 = NULL;
        return view('/reportes/reporte5', compact('cli_top5'));
    }

    public function reporte5(Request $request){
        $rules = [
            'finicio'=> 'nullable|date'
        ];
        $this->validate($request, $rules);
        $finicio=$request->input('finicio');
        $cli_top5 = DB::select('select c.cli_nombre as nombre, c.cli_apellido as apellido, c.cli_rif as rif, vp.ven_montototal as monto_pagado, vp.ven_fpago as fecha
        FROM cliente c, pedido p, venta_pago vp, usuario u
        where (p.fkcliente = c.cli_id or (p.fkusuario = u.usu_id and u.fkcliente = c.cli_id)) and vp.fkpedido = p.ped_id and vp.ven_fpago = :finicio
        group by c.cli_nombre, c.cli_apellido, c.cli_rif, vp.ven_montototal, p.ped_id,vp.ven_fpago
        order by monto_pagado DESC, vp.ven_fpago ASC limit 5;',['finicio'=> $finicio]);

        return view('/reportes/reporte5', compact('cli_top5'));
    }

    public function reporte7(){
        $producto = DB::select('select count(ped.fkproducto) as venta, p.pro_nombre as nombre, sum(ped.ped_cantidad) as can, t.tie_tipo as tienda, l.lug_nombre as lugar, p.pro_ruta_imagen as imagen
        FROM Ped_pro ped, producto p, pedido pe, venta_pago vp, tienda t, lugar l
        where ped.fkproducto = p.pro_id and pe.ped_id = ped.fkpedido and ped.ped_id = vp.fkpedido and l.lug_id = t.fklugar and t.tie_id = ped.fktienda
        group by p.pro_nombre, tienda, lugar, imagen
        order by venta DESC, can DESC;');
        
        return view('/reportes/reporte7', compact('producto'));
    }

    public function reporte8(){

    }
}
