@extends('layouts.index') 
@section('title','Listar pedidos')
@section('content')
 
  <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Pedidos</h2>
            </div>
        </div>
 </div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <br /> @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    <br /> @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>descripcion</th>
                <th>fecha</th>
                <th>Cantidad de productos</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)

            <tr>
                <td>{{$pedido->ped_id}}</td>
                <td>{{$pedido->ped_descripcion}}</td>
                <th>{{$pedido->ped_fecha}}</th>
                <td>{{$pedido->ped_cantidad}}</td>
                <td>{{$pedido->ped_total}} Bs.S</td>
                {!! Form::open(array('action' => array('PresupuestosController@actualizarStatus', $tiendaid ,$pedido->ped_id,$pedido->sta_id))) !!}
                <td>
                    <select name= "statusid" id="direccion" class="form-control" required>
                    <option value="{{$pedido->sta_id}}">{{$pedido->sta_nombre}} </option>
                    @foreach($status as $statu)
                    @if($pedido->sta_id!=$statu->sta_id)
                    <option value="{{$statu->sta_id}}">{{$statu->sta_nombre}}</option>
                    @endif
                    @endforeach
                    </select>
                    
                </td>
                <td>{!! Form::submit('Actualizar', ['class' => 'btn btn-warning']) !!}</td>
                {!! Form::close() !!}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
 @endsection