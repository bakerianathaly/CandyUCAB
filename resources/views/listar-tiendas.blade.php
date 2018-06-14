@extends('layouts.index') 
@section('title','Listar tiendas')
@section('content')
 
  <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Tiendas</h2>
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
                <th>Tipo</th>
                <th>Ubicacion</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tiendas as $tienda)

            <tr>
                <td>{{$tienda->tie_id}}</td>
                <td>{{$tienda->tie_tipo}}</td>
                <td>{{$tienda->lugar->lug_nombre}}</td>
                <td>
                    <a href="{{action('TiendasController@edit', $tienda->tie_id)}}" class="btn btn-warning">Editar</a>
                </td>
                <input name="_method" type="hidden" value="PATCH">
                <td>
                    <form action="{{action('ProductosController@destroy', $tienda->tie_id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{!! Form::close() !!} @endsection
