@extends('layouts.index')
@section('title','Reportes')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Tipo de método de pago más utilizado en las tiendas físicas</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>Nombre del tipo de método de pago más utilizado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipo_pago as $e)
                <tr>
                    @if($e->metodo_pago == 'E')
                    <td>Efectivo</td>
                    @elseif($e->metodo_pago == 'T')
                    <td>Tarjeta</td>
                    @else
                    <td>Cheque</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mx-auto text-center">
            <a href="/reporte" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection