@extends('layouts.index')
@section('title','Listar roles')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Roles</h2>
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
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($roles as $rol)
      <tr>
        <td>{{$rol->rol_id}}</td>
        <td>{{$rol->rol_tipo}}</td>
        <td><a  href="{{action('RolController@privilegiosRol', $rol->rol_id)}}" class="btn btn-warning">Privilegios</a></td>
        <td>
          <form action="{{action('RolController@eliminarRol', $rol->rol_id)}}">
            {{csrf_field()}}
            <button class="btn btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
       <td><a href="{{action('RolController@agregarRol')}}" class="btn centrar_boton" style="color:black">Agregar Rol</a></td>
  </div>
    {!! Form::close() !!}
@endsection