@extends('layouts.index')
@section('title','Agregar producto')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Agregar Producto</h2>
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
        <div class="col-lg-4 ml-auto">
            {!! Form::open(['url' => 'Producto']) !!}
            <div class="form-group">
                <label for="formGroup">Nombre del producto</label>
                <input class="form-control" type="text" name="nombre" placeholder="Ingresar nombre">
            </div>
            <div class="form-group">
                <label for="formGroup">Relleno</label>
                <input class="form-control" type="text" name="relleno" placeholder="Ingresar el relleno">
            </div>
            <div class="form-group">
                <label for="formGroup">Textura</label>
                <input class="form-control" type="text" name="textura" placeholder="Ingrese la textura">
            </div>

        </div>
        <div class="col-lg-4 mr-auto">
            <div class="form-group">
                <label for="formGroup">Puntuacion</label>
                <input class="form-control" type="number" min="1" max="10" name="puntuacion" placeholder="Ingresar la puntuacion">
            </div>
            <div class="form-group">
                <label for="formGroup">Sabor</label>
                <select name= "sabor" id="sabor" class="form-control" required>
                    <option value="">Seleccione el sabor </option>
                    @foreach($sabores as $sabor)
                    <option value="{{$sabor->sab_id}}">{{$sabor->sab_nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="formGroup">Tipo</label>
                <select name= "tipo" id="tipocandy" class="form-control" required>
                    <option value="">Seleccione el tipo de caramelo </option>
                    @foreach($tipos as $tipo)
                    <option value="{{$tipo->tip_id}}">{{$tipo->tip_nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="trans text-center">
        {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
    </div>
    {!! Form::close() !!}
@endsection