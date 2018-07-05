@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Top 5 de clientes por monto</h2>
            </div>
        </div>
    </div>
    {!! Form::open(['action' => 'ReportesController@reporte5', 'method' => 'POST']) !!}
    <div class="form-group col">
        <label for="finicio">Seleccione la fecha </label> <br>
        <input type="date" name="finicio" id="finicio">
        {!! Form::submit('Generar', ['class' => 'btn btn-primary mt-1']) !!}
    </div>
    {!! Form::close() !!}

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>RIf</th>
                    <th>Monto pagado</th>
                    <th>Fecha de pago</th>
                </tr>
            </thead>
            @if($cli_top5 != NULL)
                <tbody>
                    @foreach($cli_top5 as $e)
                    <tr>
                        <td>{{$e->nombre}}</td>
                        <td>{{$e->apellido}}</td>
                        <td>{{$e->rif}}</td>
                        <td>{{$e->monto_pagado}}</td>
                        <td>{{$e->fecha}}</td>
                    </tr>
                    @endforeach
                </tbody>
            @endif
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection