@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">El status que genera retrasos en los pedidos (El de mayor duración)</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Retraso</th>
                </tr>
            </thead>
            <tbody>
                @foreach($status as $e)
                <tr>
                    <td>{{$e->nombre}}</td>
                    <td>{{$e->retraso}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection