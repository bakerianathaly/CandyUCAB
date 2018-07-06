@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Reporte de asistencia indicando hora de entrada , hora salida, cédula del empleado, nombres y apellidos y departamento</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Tipo departamento</th>
                    <th>Nombre departamento</th>
                    <th>Tienda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asistencia as $e)
                <tr>
                    <td>{{$e->emp_nombre}}</td>
                    <td>{{$e->emp_apellido}}</td>
                    <td>{{$e->asi_fentrada}}</td>
                    <td>{{$e->asi_fsalida}}</td>
                    <td>{{$e->dep_tipo}}</td>
                    <td>{{$e->dep_nombre}}</td>
                    <td>{{$e->tie_tipo}} {{$e->lug_nombre}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection