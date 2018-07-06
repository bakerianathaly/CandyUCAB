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
                    <th>Numero</th>
                    <th>Nombre reporte</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="z">
                <tr>
                    <td>1</td>            
                    <td>Reporte de ingresos vs egresos de cada tienda</td>
                    <td><a  href="reporte/1" class="btn btn-danger">Generar</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Reporte de asistencia indicando hora de entrada , hora salida, cédula del empleado, nombres y apellidos y departamento.</td>
                    <td><a  href="reporte/2" class="btn btn-danger">Generar</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Reporte de empleados indicando horas trabajadas, promedio de hora de entrada, promedio hora de salida, días de ausencia laboral, total de días con retardo</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Listado de los 10 clientes frecuentes por tienda ( mayor número de ventas ) por periodo de tiempo</td>
                    <td><a  href="reporte/4" class="btn btn-danger">Generar</a></td>   
                </tr>
                <tr>
                    <td>5</td>
                    <td>Listado de los 5 mejores clientes (según monto de compras) por periodo de tiempo</td>
                    <td><a  href="reporte/5" class="btn btn-danger">Generar</a></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Listado por tiendas de clientes con presupuestos efectivos ( presupuestos que generaron compra) por tienda y por periodo de tiempo.</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Productos más vendido por tienda</td>
                    <td><a  href="reporte/7" class="btn btn-danger">Generar</a></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Ranking de productos por Tienda y por lugar</td>
                    <td><a  href="reporte/8" class="btn btn-danger">Generar</a></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Ingrediente más utilizado en los productos</td>
                    <td><a  href="reporte/9" class="btn btn-danger">Generar</a></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Ranking de los 10 mejores clientes en base a la suma de compras en línea y las compras físicas</td>
                    <td><a  href="reporte/10" class="btn btn-danger">Generar</a></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Mes más rentable para las tiendas por zona (lugar)</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>El estatus que genera retrasos en los pedidos ( El de mayor duración)</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Tipo de método de pago más utilizado en las tiendas físicas</td>
                    <td><a  href="reporte/13" class="btn btn-danger">Generar</a></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Marca más común de tarjetas de crédito registradas por los usuarios</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Las tiendas que más recibieron pagos con puntos.</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Lista de los 10 clientes con mayor cantidad de puntos.</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Balance general de puntos otorgados y puntos canjeados por tienda y por lugar</td>
                    <td><a  href="#" class="btn btn-primary">Generar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection