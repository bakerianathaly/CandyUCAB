@extends('layouts.index') 
@section('title','Listar tiendas')
@section('content')
 
  <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Usuarios</h2>
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
                <th>ID</th>
                <th>Username</th>
                <th>Rol</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->usu_id}}</td>
                <td>{{$usuario->usu_nombre}}</td>
                 {!!Form::open(array('action' => array('RolController@asignarRol',$usuario->usu_id)))!!}
                <td>
                    <select name= "fkrol" id="roles" class="form-control" required>
                    <option value="{{$usuario->rol_id}}">{{$usuario->rol_tipo}}</option>
                    @foreach($roles as $rol)
                    @if($rol->rol_id != $usuario->rol_id)
                    <option value="{{$rol->rol_id}}">{{$rol->rol_tipo}}</option>
                    @endif
                    @endforeach
                </select>
                </td>
                <td>
                    {!! Form::submit('Actualizar rol', ['class' => 'btn btn-warning']) !!}
                </td>
            </tr>
             {!! Form::close() !!}
            @endforeach
        </tbody>
    </table>
</div>
 @endsection
