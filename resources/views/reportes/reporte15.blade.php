@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Las tiendas que más recibieron pagos con puntos</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>Tienda</th>
                    <th>Cantidad de puntos</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($tienda as $e)
                    <tr>
                        <td>{{$e->nombre}} {{$e->lugar}}</td>
                        <td>{{$e->cuenta}}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection