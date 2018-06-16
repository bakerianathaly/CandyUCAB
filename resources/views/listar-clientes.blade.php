@extends('layouts.index')
@section('title','Listar clientes')
@section('content')
  <div class="container-fluid">
    <div class="m-2">
      <div class=" ">
        <h2 id="registro-letras">Clientes registrados</h2>
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
      <li class="registro-rosa nav-item"><a id="registro-natural" class="nav-link active" href="#Naturale" role="tab" data-toggle="tab" aria-selected="true" aria-controls="Naturale">Naturales</a></li>
      <li class="registro-rosa nav-item"><a id="registro-juridic" class="nav-link" href="#Juridico" role="tab" data-toggle="tab" aria-selected="false" aria-controls="Juridico">Juridicos</a></li>
    </ul>
  </div>

  <div class="tab-content">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
    @endif
    <div class="tab-pane active" id="Naturale" role="tabpanel" aria-labelledby="registro-natural">
      <div class="row container-fluid ">
        <div class="col-lg-4 center" id="Naturale">
          <table class="table table-striped table-bordered text-center" id="Naturale">
            <thead>
              <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($naturales as $natural)
              <tr>
                <td>{{$natural->cli_ci}}</td>
                <td>{{$natural->cli_nombre}}</td>
                <td>{{$natural->cli_apellido}}</td>
                <td>{{$natural->cli_correo}}</td>
                <td>{{$natural->cli_tipo}}</td>
                <td><a  href="{{action('ClientsController@edit', $natural->cli_id)}}" class="btn btn-warning">Edit</a></td>
                <input name="_method" type="hidden" value="PATCH">
                <td>
                  <form action="{{action('ClientsController@destroy', $natural->cli_id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a class="center" href="/registro/create">{!! Form::submit('Agregar cliente', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}</a>
        </div>
        
      </div>
    </div>
    <div class="tab-pane" id="Juridico" role="tabpanel" aria-labelledby="registro-juridico">
      <div class="row container-fluid ">
        <div class="col-lg-4 center" id="Juridico">
          <table class="table table-striped table-bordered text-center" id="Juridico">
            <thead>
              <tr>
                <th>Pagina web</th>
                <th>Razon social</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($juridicos as $juridico)
              <tr>
                <td>{{$juridico->cli_pagina_web}}</td>
                <td>{{$juridico->cli_razon_social}}</td>
                <td>{{$juridico->cli_correo}}</td>   
                <td>{{$juridico->cli_tipo}}</td>
                <td><a  href="{{action('ClientsController@edit', $juridico->cli_id)}}" class="btn btn-warning">Edit</a></td>
                <input name="_method" type="hidden" value="PATCH">
                <td>
                  <form action="{{action('ClientsController@destroy', $juridico->cli_id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a class="center" href="/registro/create">{!! Form::submit('Agregar cliente', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}</a>
        </div>
      </div>
    </div>
  </div>
    {!! Form::close() !!}
@endsection