@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Balance general de puntos otorgados y puntos canjeados por tienda</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>Tienda</th>
                    <th>Puntos otorgados</th>
                    <th>Puntos canjeados</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($tienda as $e)
                    <tr>
                        <td>{{$e->tienda}} {{$e->lugar}}</td>
                        <td>{{$e->otorgados}}</td>
                        <td>{{$e->canjeados}}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>

        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>Lugar</th>
                    <th>Puntos otorgados</th>
                    <th>Puntos canjeados</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($lugar as $e)
                    <tr>
                        <td>{{$e->nombre}}</td>
                        <td>{{$e->otorgados}}</td>
                        <td>{{$e->canjeados}}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection