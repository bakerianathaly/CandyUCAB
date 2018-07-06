@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Reporte de empleados indicando horas trabajadas, promedio de hora de entrada, promedio hora de salida, días de ausencia laboral, total de días con retardo</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Horas trabajadas</th>
                    <th>Promedio de hora de entrada</th>
                    <th>Promedio de hora de salida</th>
                    <th>Horas de retrasos</th>
                    <th>Cantidad de inasistencias</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asistencia as $e)
                <tr>
                    <td>{{$e->cedula}}</td>
                    <td>{{$e->nombre}}</td>
                    <td>{{$e->apellido}}</td>
                    <td>{{$e->horas_trabajadas}}</td>
                    <td>{{$e->hentrada}}</td>
                    <td>{{$e->hsalida}}</td>
                    <td>{{$e->retraso}}</td>
                    <td>{{$e->inasistencia}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection