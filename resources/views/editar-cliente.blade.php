@extends('layouts.index')
@section('title','Editar cliente')
@section('content')

  <div class="container-fluid">
    <div class="m-2">
      <div >
       <h2 id="registro-letras">Editar Clientes</h2>
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

  <div class="tab-content">
    <!--Registro para clientes naturales -->
    <div class="tab-pane active" id="Naturales" role="tabpanel" aria-labelledby="registro-natural">
      <div class="row container-fluid mt-5">
        <div class="col-lg-4 ml-auto" id="Naturales">
          {!! Form::open(array('action' => array('ClientsController@update', $id))) !!}
            {!! csrf_field() !!}
            <input name="_method" type="hidden" value="PATCH">
          <div class="form-group">
            <label for="formGroup">Nombre</label>
            <input class="form-control" type="text" name="nombre" placeholder="Ingresar nombre" value="{{$cliente->cli_nombre}}">
          </div>
          <div class="form-group">
            <label for="formGroup">Apellido</label>
            <input class="form-control" type="text" name="apellido" placeholder="Ingresar el apellido" value="{{$cliente->cli_apellido}}">
          </div>
          <div class="form-group">
            <label for="formGroup">Correo</label>
            <input class="form-control" type="text" name="correo" placeholder="Ingrese el correo electronico" value="{{$cliente->cli_correo}}">
          </div>
        </div>
        <div class="col-lg-4 mr-auto">
          <div class="form-group">
            <label for="formGroup">Numero de telefono</label>
            <input class="form-control" type="text" name="telefono" placeholder="Ingresar numero de telefono" value="{{$telefono->tel_numero}}">
          </div>
          <div class="form-group">
            <label for="formGroup">Tienda</label>
            <select name= "tiendas" id="tiendas" class="form-control" required>
              <option value="">{{$tiendas->tie_tipo}} {{$tiendas->lug_nombre}}</option>
              @foreach($tienda as $tien)
                <option value="{{$tien->tie_id}}">{{$tien->tie_tipo}} {{$tien->lug_nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="formGroup">Clave</label>
            <input class="form-control" type="password" name="clave" placeholder="Ingresar clave para el usuario*" value="$usuario->usu_contrasena">
          </div>
        </div>
      </div>
      <div class="trans text-center">
        {!! Form::submit('Editar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
      </div>
      {!! Form::close() !!}
    </div>
    <!-- Registro para clientes juridicos -->
    <div class="tab-pane" id="Juridicos" role="tabpanel" aria-labelledby="registro-juridico">
      <div class="row container-fluid mt-5">
        <div class="col-lg-4 ml-auto" id="Juridicos">
          {!! Form::open(array('action' => array('ClientsController@update', $id))) !!}
            {!! csrf_field() !!}
          <input name="_method" type="hidden" value="PATCH">
          <div class="form-group">
            <label for="formGroup">Correo</label>
            <input class="form-control" type="text" name="correo" placeholder="candyUCAB@candy.com" value="{{$cliente->cli_correo}}">
          </div>
          <div class="form-group">
            <label for="formGroup">Clave</label>
            <input class="form-control" type="password" name="clave" placeholder="Ingresar clave para el usuario*" value="$usuario->usu_contrasena">
          </div>
          <div class="form-group">
            <label for="formGroup">Persona de contacto</label>
            <input class="form-control" type="text" name="contacto" placeholder="Ingrese el nombre de la persona de contacto" value="{{$contacto->con_nombre}}">
          </div>
        </div>
        <div class="col-lg-4 mr-auto">
          <div class="form-group">
            <label for="formGroup">Pagina web</label>
            <input class="form-control" type="text" name="pagina_web" placeholder="www.candyUCAB.com" value="{{$cliente->cli_pagina_web}}">
          </div>
          <div class="form-group">
            <label for="formGroup">Numero de telefono</label>
            <input class="form-control" type="text" name="telefono" placeholder="Ingresar numero de telefono" value="{{$telefono->tel_numero}}">
          </div>
          <div class="form-group">
            <label for="formGroup">Tienda</label>
            <select name= "tiendas" id="tiendas" class="form-control" required>
              <option value="">{{$tiendas->tie_tipo}} {{$tiendas->lug_nombre}}</option>
              @foreach($tienda as $tienda)
                <option value="{{$tienda->tie_id}}">{{$tienda->tie_tipo}} {{$tienda->lug_nombre}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="trans text-center">
        {!! Form::submit('Editar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
  <script>
    $(function () {
      $('#myTab li:last-child a').tab('show')
    });
  </script>

@endsection