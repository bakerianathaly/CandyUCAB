@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Ingrediente más utilizado en los productos</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>Nombre del ingrediente mas usado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingrediente as $e)
                <tr>
                    <td>{{$e->nombre}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection