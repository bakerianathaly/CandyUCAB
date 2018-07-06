@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Top 10 mejores clientes en base a la suma de compras en línea y las compras físicas</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>RIf</th>
                    <th>Correo</th>
                    <th>Suma compras web/fisicas</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($cli_top10 as $e)
                    <tr>
                        <td>{{$e->nombre}}</td>
                        <td>{{$e->apellido}}</td>
                        <td>{{$e->rif}}</td>
                        <td>{{$e->correo}}</td>
                        <td>{{$e->suma}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection