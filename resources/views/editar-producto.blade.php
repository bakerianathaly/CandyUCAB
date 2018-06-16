@extends('layouts.index')
@section('title','Editar producto')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Editar Producto</h2>
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
            {!! Form::open(array('action' => array('ProductosController@update', $id))) !!}
            {!! csrf_field() !!}
            <input name="_method" type="hidden" value="PATCH">
            <div class="form-group">
                <label for="formGroup">Nombre del producto</label>
                <input class="form-control"  type="text" name="nombre" value="{{$producto->pro_nombre}}">
            <input class="form-control"  type="text" name="nombre" value="{{$producto->pro_nombre}}">
            </div>
            <div class="form-group">
                <label for="formGroup">Relleno</label>
                <input class="form-control" type="text" name="relleno" value="{{$producto->pro_relleno}}">
            </div>
            <div class="form-group">
                <label for="formGroup">Textura</label>
                <input class="form-control" type="text" name="textura" value="{{$producto->pro_textura}}">
            </div>

        </div>
        <div class="col-lg-4 mr-auto">
            <div class="form-group">
                <label for="formGroup">Puntuacion</label>
                <input class="form-control" type="number" min="1" max="10" name="puntuacion" value="{{$producto->pro_puntuacion}}">
            </div>
            <div class="form-group">
                <label for="formGroup">Sabor</label>
                <select name= "sabor" id="sabor" class="form-control" required>
                    <option value="">Seleccione el sabor </option>
                    <option value="{{$sab->sab_id}}">{{$sab->sab_nombre}}</option>
                    @foreach($sabores as $sabor)
                    <option value="{{$sabor->sab_id}}">{{$sabor->sab_nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="formGroup">Tipo</label>
                <select name= "tipo" id="tipocandy" class="form-control" required>
                    <option value="">Seleccione el tipo de caramelo </option>
                    <option value="{{$tip->tip_id}}">{{$tip->tip_nombre}}</option>
                    @foreach($tipos as $tipo)
                    <option value="{{$tipo->tip_id}}">{{$tipo->tip_nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="trans text-center">
        {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
        {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF;  margin-left: 587px;']) !!}
    </div>
    {!! Form::close() !!}
@endsection