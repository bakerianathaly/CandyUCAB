@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Reporte de ingresos vs egresos de cada tienda</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>Egresos</th>
                    <th>Tienda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($egresos as $e)
                <tr>
                    <td>{{$e->egresos}}</td>
                    <td>{{$e->tienda}} {{$e->lugar}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>Ingresos</th>
                    <th>Tienda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingresos as $e)
                <tr>
                    <td>{{$e->ingresos}}</td>
                    <td>{{$e->tienda}} {{$e->lugar}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection