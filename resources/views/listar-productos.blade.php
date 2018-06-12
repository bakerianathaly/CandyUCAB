@extends('layouts.index')
@section('title','Listar producto')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Productos</h2>
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
        <th>Precio</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($productos as $producto)
      <tr>
        <td>{{$producto->pro_id}}</td>
        <td>{{$producto->pro_nombre}}</td>
        <td>{{$producto->pro_puntuacion}}</td>
        <td><a  href="{{action('ProductosController@edit', $producto->pro_id)}}" class="btn btn-warning">Edit</a></td>
        <input name="_method" type="hidden" value="PATCH">
        <td>
          <form action="{{action('ProductosController@destroy', $producto->pro_id)}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
    {!! Form::close() !!}
@endsection