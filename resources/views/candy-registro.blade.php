@extends('layouts.index')
@section('title','Registro Clientes Naturales')
@section('content')

  <div class="container-fluid">
    <div class="m-2">
      <div >
       <h2 id="registro-letras">Registro Clientes</h2>
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
    <ul class="nav nav-tabs nav-justified">
      <li class="registro-rosa nav-item"><a id="registro-natural" class="nav-link active" href="#Naturales" role="tab" data-toggle="tab" aria-selected="true" aria-controls="Naturales">Naturales</a></li>
      <li class="registro-rosa nav-item"><a id="registro-juridic" class="nav-link" href="#Juridicos" role="tab" data-toggle="tab" aria-selected="false" aria-controls="Juridicos">Juridicos</a></li>
    </ul>
  </div>

  <div class="row container-fluid mt-5">
    <div class="col-lg-4 ml-auto">
      {!! Form::open(['url' => 'registro']) !!}
      <div class="form-group">
        <label for="formGroup">Nombre</label>
        <input class="form-control" type="text" name="nombre" placeholder="Ingresar nombre">
      </div>
      <div class="form-group">
        <label for="formGroup">Apellido</label>
        <input class="form-control" type="text" name="apellido" placeholder="Ingresar el apellido">
      </div>
      <div class="form-group">
        <label for="formGroup">Correo</label>
        <input class="form-control" type="text" name="correo" placeholder="Ingrese el correo electronico">
      </div>
      <div class="form-group">
        <label for="validationDefaultUsername">Username</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
          </div>
          <input type="text" name="username" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
        </div>
      </div>
      <div class="form-group">
        <label for="formGroup">Clave</label>
        <input class="form-control" type="password" name="clave" placeholder="Ingresar clave para el usuario*">
      </div> 
    </div>
    <div class="col-lg-4 mr-auto">
      <div class="form-group">
        <label for="formGroup">RIF</label>
        <input class="form-control" type="text" name="rif" placeholder="Ingrese el RIF">
      </div>
      <div class="form-group">
        <label for="formGroup">Cedula</label>
        <input class="form-control" type="text" name="ci" placeholder="Ingrese la cedula">
      </div>
      <div class="form-group">
        <label for="formGroup">Tienda</label>
        <select name= "tienda" id="tienda" class="form-control" required>
          <option value="">Seleccione la tienda de preferencia</option>
          @foreach($tiendas as $tienda)
            <option value="{{$tienda->tie_id}}">{{$tienda->tie_tipo}} {{$tienda->lug_nombre}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
      <label for="formGroup">Direccion</label>
        <select name= "estado" id="estado" class="form-control mb-2" required>
          <option value="">Seleccione su estado </option>
          @foreach($estados as $estado)
            <option value="{{$estado->lug_id}}">{{$estado->lug_nombre}}</option>
          @endforeach
        </select>
        <select name= "municipio" id="municipio" class="form-control mb-2" required>
          <option value="">Seleccione el municipio </option>
          @foreach($municipios as $municipio)
            <option value="{{$municipio->lug_id}}">{{$municipio->lug_nombre}}</option>
          @endforeach
        </select>
        <select name= "parroquia" id="parroquia" class="form-control" required>
          <option value="">Seleccione la parroquia </option>
          @foreach($parroquias as $parroquia)
            <option value="{{$parroquia->lug_id}}">{{$parroquia->lug_nombre}}</option>
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