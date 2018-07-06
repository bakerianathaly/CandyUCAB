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
            return redirect('login')->with('fail','Debe iniciar sesion');
        }
    }

    public function reporte1(){
        $egresos = DB::select(DB::raw("SELECT sum(t.tie_cantidad) as Egresos, ti.tie_tipo as tienda, l.lug_nombre as lugar
        FROM Producto p, Tie_pro t, Pedido_tienda pt, tienda ti, lugar l
        where pt.fktienda = ti.tie_id and t.fkproducto = p.pro_id and pt.ped_id = t.fkpedido_tienda and ti.fklugar = l.lug_id
        group by ti.tie_tipo, l.lug_nombre;"));

        $ingresos = DB::select(DB::raw("SELECT sum(pe.ped_cantidad) as ingresos, t.tie_tipo as tienda, l.lug_nombre as lugar
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

    public function reporte3(){
        $hora = 'hour';
        $inasistencia = 'Inasistente';
        $asistencia = DB::select('select e.emp_ci as cedula, e.emp_nombre as nombre, e.emp_apellido as apellido, sum((date_part(:hour,a.asi_fsalida)-date_part(:hour,a.asi_fentrada))) as horas_trabajadas, avg(date_part(:hour,a.asi_fentrada)) as hentrada,
        avg(date_part(:hour,a.asi_fsalida)) as hsalida, 
        (select count(B.*) From Asistencia B Where B.fkempleado = e.emp_id and date_part(:hour,b.asi_fentrada)>=8) as retraso, 
        (select COUNT(C.*) from Asistencia C where C.fkempleado=e.emp_id and (C.asi_tipo= :ina or (C.asi_fentrada is null and C.asi_fsalida is null))) as inasistencia
        from empleado e , asistencia a
        where a.fkempleado = e.emp_id
        group by e.emp_ci, e.emp_nombre, e.emp_apellido, e.emp_id;', ['hour' =>$hora,'ina'=> $inasistencia]);

        return view('/reportes/reporte3', compact('asistencia'));
    }

    public function index4(){
        $cli_top10 = NULL;

        return view('/reportes/reporte4', compact('cli_top10'));
    }
    
    public function reporte4(Request $request){
        $rules = [
            'finicio'=> 'nullable|date',
            'ffin'=> 'nullable|date'
        ];
        $this->validate($request, $rules);
        $finicio=$request->input('finicio');
        $ffin = $request->input('ffin');
        $cli_top10 = DB::select('select c.cli_nombre as nombre, c.cli_apellido as apellido, c.cli_correo as correo, 
        c.cli_rif as rif, p.ped_cantidad as cantidad, p.ped_fecha as fecha
        FROM pedido p, cliente c, venta_pago vp
        where p.ped_fecha between ? and ? and c.cli_id = p.fkcliente and p.ped_id = vp.fkpedido
        order by p.ped_cantidad DESC, p.ped_fecha limit 10;', [$finicio, $ffin]);
        
        return view('/reportes/reporte4', compact('cli_top10'));
    }

    public function index5(){
        $cli_top5 = NULL;
        return view('/reportes/reporte5', compact('cli_top5'));
    }

    public function reporte5(Request $request){
        $rules = [
            'finicio'=> 'nullable|date',
            'ffin'=> 'nullable|date'
        ];
        $this->validate($request, $rules);
        $finicio=$request->input('finicio');
        $ffin = $request->input('ffin');
        $cli_top5 = DB::select('select c.cli_nombre as nombre, c.cli_apellido as apellido, c.cli_rif as rif, vp.ven_montototal as monto_pagado, vp.ven_fpago as fecha
        FROM cliente c, pedido p, venta_pago vp, usuario u
        where (p.fkcliente = c.cli_id or (p.fkusuario = u.usu_id and u.fkcliente = c.cli_id)) and vp.fkpedido = p.ped_id and vp.ven_fpago between ? and ?
        group by c.cli_nombre, c.cli_apellido, c.cli_rif, vp.ven_montototal, p.ped_id,vp.ven_fpago
        order by monto_pagado DESC, vp.ven_fpago ASC limit 5;',[$finicio, $ffin]);

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

    public function index8(){
        $tiendas = DB::select(DB::raw("SELECT t.tie_tipo, t.tie_id,l.lug_nombre from tienda t, lugar l where t.fklugar = l.lug_id;"));
        $producto = NULL;
        return view('/reportes/reporte8', compact('tiendas', 'producto'));
    }

    public function reporte8(Request $request){
        $rules = [
            'tienda' =>'nullable|string|between:1,50',
        ];
        $this->validate($request, $rules);
        $tienda = $request->input('tienda');
        $tiendas = DB::select(DB::raw("SELECT t.tie_tipo, t.tie_id,l.lug_nombre from tienda t, lugar l where t.fklugar = l.lug_id;"));
        $producto = DB::select('select p.pro_puntuacion as ranking, p.pro_nombre as nombre, t.tie_tipo as tienda, l.lug_nombre as lugar, p.pro_ruta_imagen as imagen
        FROM producto p, ped_pro pe, tienda t, lugar l, pedido ped, venta_pago vp
        where pe.fkproducto = p.pro_id and t.tie_id = ? and l.lug_id = t.fklugar and pe.fktienda = ? and ped.ped_id = vp.fkpedido and ped.ped_id = pe.fkpedido
        order by ranking DESC;',[$tienda, $tienda]);
        return view('/reportes/reporte8', compact('producto', 'tiendas'));
    }

    public function reporte9 (){
        $ingrediente = DB::select('Select I.ing_nombre as nombre
        From Ingrediente I
        Where I.ing_id = (select I.fkIngrediente
                    From ing_pro	 I
                    group by I.fkIngrediente
                    order by Count(I.fkproducto) DESC
                    limit 1);');
        return view('/reportes/reporte9', compact('ingrediente'));
    }

    public function reporte10(){
        $cli_top10 = DB::select('Select c.client, Cl.cli_nombre as nombre, Cl.cli_apellido as apellido, Cl.cli_correo as correo, Cl.cli_rif as rif,SUM(c.total) as suma
        from cliente cl,(Select P.fkCliente client, COUNT(P.ped_id) total
            From Pedido P, cliente c
            where c.cli_id = p.fkcliente
            group by P.fkCliente
            Union 
            Select U.fkCliente client, COUNT(A.ped_id) total
            From Usuario U, Pedido A
            Where U.usu_id = A.fkUsuario 
            group by U.fkCliente) as c
        Where Cl.cli_id = c.client
        group by client, Cl.cli_nombre, Cl.cli_correo, Cl.cli_rif,Cl.cli_apellido
        order by SUM(c.total) DESC limit 10;');
        return view('/reportes/reporte10', compact('cli_top10'));
    }

    public function reporte11(){
        $x = 'month';
        $mes = DB::select('Select L.lug_nombre as nombre, (
            Select date_part( :month, p.ped_fecha) as mes
            From Pedido P, Tienda t
            Where t.fklugar = L.lug_id and t.tie_id = (select pe.fktienda 
                                       from ped_pro pe 
                                       where pe.fkpedido = P.ped_id 
                                       limit 1)
            group by mes
            order by SUM(p.ped_total) DESC
            limit 1) as mes
            From Lugar L
            order by mes ASC;', ['month' => $x]);
        return view('/reportes/reporte11', compact('mes'));
    }

    public function reporte12(){
        $hora = 'hour';
        $status = DB::select('Select sa.fkstatus, s.sta_nombre as nombre, SUM((date_part( :hour, sa.sta_ffinal)) - (date_part(:hour, sa.sta_finicial))) as retraso
        from sta_ped sa, status s
        where sa.sta_ffinal is not null and sa.fkstatus = s.sta_id 
        group by sa.fkstatus, s.sta_nombre
        order by retraso 
        limit 3; ', ['hour' => $hora]);

        return view('/reportes/reporte12', compact('status'));
    }

    public function reporte13(){
        $tipo_pago = DB::select('select m.met_tipo as metodo_pago
        from metodo_pago m
        where m.met_id = (select met.met_id
                    from metodo_pago met, pedido p, cliente c, venta_pago v
                    where c.cli_id = p.fkcliente and p.ped_id = v.fkpedido and met.met_id = v.fkmetodo_pago
                    group by met.met_tipo, met.met_id
                    order by count(met.met_tipo) DESC limit 1);');
        return view('/reportes/reporte13', compact('tipo_pago'));
    }

    public function reporte15(){
        $tienda= DB::select('Select t.tie_tipo as nombre, l.lug_nombre as lugar, (select COUNT(*) 
                    from Pedido p, Venta_pago v 
                    where v.fkpedido = p.ped_id and v.fkpunto is not null 
                    and t.tie_id = (select pe.fktienda 
                                    from ped_pro pe 
                                    where pe.fkpedido = p.ped_id 
                                    limit 1) ) as cuenta
        from tienda t, lugar l
        where l.lug_id = t.fklugar
        order by cuenta limit 10;');

        return view('/reportes/reporte15', compact('tienda'));
    }

    public function reporte16(){
        $clientes = DB::select('Select C.cli_apellido as apellido, C.cli_nombre as nombre, SUM(P.pun_cantidad) as puntos, u.usu_nombre as usuario
        From Cliente C, Punto P, Usuario U
        Where P.fkusuario = U.usu_id and C.cli_id = U.fkCliente
        group by C.cli_apellido, C.cli_nombre, u.usu_nombre
        order by COUNT(P.*) DESC limit 10;');

        return view('/reportes/reporte16', compact('clientes'));
    }

    public function reporte17(){
        $tienda = DB::select('Select t.tie_tipo as tienda, l.lug_nombre as lugar, (Select SUM(p.pun_cantidad)
        From punto p, pedido pe
        where p.fkpedido = pe.ped_id and t.tie_id = (select a.fktienda 
                                   from ped_pro a 
                                   where a.fkpedido = pe.ped_id 
                                   limit 1)) as otorgados, 
                                   (select SUM(v.ven_montototal/h.pun_cantidad) 
                 from Pedido ped, Venta_pago v, punto p, punto_historial h 
                 where v.fkpedido = ped.ped_id and v.fkpunto = p.pun_id and p.fkhistorial = h.pun_id and t.tie_id = (select pe.fktienda 
                                                                    from ped_pro pe 
                                                                    where pe.fkpedido = ped.ped_id 
                                                                    limit 1)) as canjeados
        from tienda t, lugar l 
        where l.lug_id = t.tie_id
        order by otorgados ASC;');

        $lugar = DB::select('Select L.lug_nombre as nombre, (Select SUM(p.pun_cantidad)
        From punto p, pedido pe, tienda t
        where p.fkpedido = pe.ped_id and t.fklugar = L.lug_id and t.tie_id = (select a.fktienda 
                                             from ped_pro a 
                                             where a.fkpedido = pe.ped_id 
                                             limit 1)
        ) as otorgados, (select SUM(v.ven_montototal/h.pun_cantidad) 
                 from Pedido ped, Venta_pago v, punto p, punto_historial h, tienda t
                 where v.fkpedido = ped.ped_id and v.fkpunto = p.pun_id and p.fkhistorial = h.pun_id and t.fklugar = L.lug_id and t.tie_id = (select pe.fktienda 
                                                                                 from ped_pro pe 
                                                                                 where pe.fkpedido = ped.ped_id 
                                                                                 limit 1)) as canjeados
        from Lugar L
        order by otorgados ASC;');

        return view('/reportes/reporte17', compact('tienda', 'lugar'));
    }
}
