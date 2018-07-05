@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Productos más vendido por tienda</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>Venta</th>
                    <th>Cantidad vendida</th>
                    <th>Nombre</th>
                    <th>Tienda</th>
                    <th>Caramelo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($producto as $pro)
                <tr>
                    <td>{{$pro->venta}}</td>
                    <td>{{$pro->can}}</td>
                    <td>{{$pro->nombre}}</td>
                    <td>{{$pro->tienda}} {{$pro->lugar}}</td>
                    <td><img id="proventa" src="{{$pro->imagen}}" alt="producto"></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection