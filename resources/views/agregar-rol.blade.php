@extends('layouts.index')
@section('title','Agregar producto')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Agregar Tienda</h2>
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
            {!!Form::open(array('action' => array('RolController@add')))!!}
            <label style="margin-left:750px">Nombre del Rol</label>
            <div class="col-5">
            <input style="margin-left:735px" class="form-control" type="text" name="nombre" placeholder="Ingresar nombre" required>
            </div>
    </div>
    <div class="trans text-center">
        {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF; margin-left: 587px;']) !!}
    </div>
    {!! Form::close() !!}
@endsection