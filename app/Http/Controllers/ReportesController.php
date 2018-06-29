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
}
