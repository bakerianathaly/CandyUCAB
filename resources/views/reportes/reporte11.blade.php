@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Mes más rentable para las tiendas por zona (lugar)</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>Lugar</th>
                    <th>Mes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mes as $e)
                <tr>
                    <td>{{$e->nombre}}</td>
                    <td>{{$e->mes}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection