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

    {!! Form::open(['action' => 'ReportesController@reporte8', 'method' => 'POST']) !!}
    <div class="form-group ml-4 mt-3">
        <label for="tienda">Tienda</label>
        <select name= "tienda" id="tienda">
            <option value="">Seleccione la tienda de preferencia</option>
            @foreach($tiendas as $tienda)
                <option value="{{$tienda->tie_id}}">{{$tienda->tie_tipo}} {{$tienda->lug_nombre}}</option>
            @endforeach
        </select>
        {!! Form::submit('Generar', ['class' => 'btn btn-primary mt-1']) !!}
    </div>
    {!! Form::close() !!}

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ranking</th>
                    <th>Tienda</th>
                    <th>Caramelo</th>
                </tr>
            </thead>
                @if ($producto != NULL)
                    <tbody>
                        @foreach($producto as $e)
                        <tr>
                            <td>{{$e->nombre}}</td>
                            <td>{{$e->ranking}}</td>
                            <td>{{$e->tienda}} {{$e->lugar}}</td>
                            <td><img id="proventa" src="{{$e->imagen}}" alt="caramelo"></td>
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