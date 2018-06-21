@extends('layouts.index')
@section('title','Metodos de pago')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Agregar metodo de pago</h2>
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

    <div class="row container-fluid mt-5">
        <div class="col-lg-4 mx-auto">
            @if($_SESSION['tipo'] == 'Cliente')
                {!! Form::open(['url'=>'perfil/MP', 'method'=>'POST']) !!}
                
                <div class="form-group">
                    <label for="formGroup">Nombre del titular</label>
                    <input class="form-control" type="text" name="nombre" placeholder="Ingresar nombre">
                </div>
                <div class="form-group">
                    <label for="formGroup">Fecha de vencimiento de la tarjeta</label>
                    <input class="form-control" type="date" name="fvencimiento">
                </div>
                <div class="form-group">
                    <label for="formGroup">Numero de la tarjeta</label>
                    <input class="form-control" type="numeric" name="num_tarjeta" placeholder="Ingrese la textura">
                </div>
                <div class="trans text-center">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
                </div>
                {!! Form::close() !!}
            @else
                {!! Form::open(['url' => 'perfil']) !!}
                <div class="form-group">
                    <label for="formGroup">Nombre del titular</label>
                    <input class="form-control" type="text" name="nombre" placeholder="Ingresar nombre">
                </div>
                <div class="form-group">
                    <label for="formGroup">Correo del cliente</label>
                    <input class="form-control" type="text" name="correo" placeholder="candyUCAB@gmail.com">
                </div>
                <div class="form-group">
                    <label for="formGroup">Fecha de vencimiento de la tarjeta</label>
                    <input class="form-control" type="date" name="fvencimiento">
                </div>
                <div class="form-group">
                    <label for="formGroup">Numero de tarjeta</label>
                    <input class="form-control" type="numeric" name="num_tarjeta" placeholder="2132476837">
                </div>
                <div class="form-group">
                    <label for="formGroup">Numero de cheque</label>
                    <input class="form-control" type="numeric" name="num_cheque" placeholder="345345324324234">
                </div>
                <div class="form-group">
                    <label for="formGroup">Nombre del banco</label>
                    <input class="form-control" type="text" name="banco" placeholder="Banco Mercantil">
                </div>
                <div class="form-group">
                    <label for="formGroup">Tipo</label>
                    <select name= "tipo" id="tipomp" class="form-control">
                        <option value="">Seleccione un metodo de pago </option>
                        <option value="T">Tarjeta</option>
                        <option value="C">Cheque</option>
                        <option value="E">Efectivo</option>
                    </select>
                </div>
                <div class="trans text-center">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
                </div>
                {!! Form::close() !!}
            @endif
            
        </div>
    </div>

    
@endsection