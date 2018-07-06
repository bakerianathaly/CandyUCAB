@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Top 10 clientes frecuentes por tienda (mayor número de ventas) por periodo de tiempo</h2>
            </div>
        </div>
    </div>
    {!! Form::open(['action' => 'ReportesController@reporte4', 'method' => 'POST']) !!}
    <div class="form-group col">
        <label for="finicio">Seleccione la fecha </label> <br>
        <input type="date" name="finicio" id="finicio">
        <input type="date" name="ffin" id="ffin">
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
                    <th>Correo</th>
                    <th>Cantidad de compra</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            @if($cli_top10 != NULL)
                <tbody>
                    @foreach($cli_top10 as $e)
                    <tr>
                        <td>{{$e->nombre}}</td>
                        <td>{{$e->apellido}}</td>
                        <td>{{$e->rif}}</td>
                        <td>{{$e->correo}}</td>
                        <td>{{$e->cantidad}}</td>
                        <td>{{$e->fecha}}</td>
                    </tr>
                    @endforeach
                </tbody>
            @else
                <tbody>
                    <tr>
                        <th>
                            <td>No hay respuesta para las fechas seleccionadas</td>
                        </th>
                    </tr>
                </tbody>
            @endif
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection