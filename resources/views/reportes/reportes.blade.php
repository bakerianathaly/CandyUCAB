@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Reportes</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-2">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>Nombre reporte</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="z">
                <tr>            
                    <td>Reporte de ingresos vs egresos de cada tienda</td>
                    <td><a  href="reporte/1" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Reporte de asistencia indicando hora de entrada , hora salida, cédula del empleado, nombres y apellidos y departamento.</td>
                    <td><a  href="reporte/2" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Reporte de empleados indicando horas trabajadas, promedio de hora de entrada, promedio hora de salida, días de ausencia laboral, total de días con retardo</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Listado de los 10 clientes frecuentes por tienda ( mayor número de ventas ) por periodo de tiempo</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>   
                </tr>
                <tr>
                    <td>Listado de los 5 mejores clientes (según monto de compras) por periodo de tiempo</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Listado por tiendas de clientes con presupuestos efectivos ( presupuestos que generaron compra) por tienda y por periodo de tiempo.</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Factura de compras</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Productos más vendido por tienda</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Ranking de productos por Tienda y por lugar</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Ingrediente más utilizado en los productos</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Ranking de los 10 mejores clientes en base a la suma de compras en línea y las compras físicas</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Mes más rentable para las tiendas por zona (lugar)</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>El estatus que genera retrasos en los pedidos ( El de mayor duración)</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Tipo de método de pago más utilizado en las tiendas físicas</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Marca más común de tarjetas de crédito registradas por los usuarios</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Las tiendas que más recibieron pagos con puntos.</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Lista de los 10 clientes con mayor cantidad de puntos.</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>Balance general de puntos otorgados y puntos canjeados por tienda y por lugar</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection