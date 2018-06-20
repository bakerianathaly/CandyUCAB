@extends('layouts.index')
@section('title','Metodos de pago')
@section('content')

    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Metodos de pago registrados</h2>
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
        <th>Tipo de pago</th>
        <th>Numero de tarjeta</th>
        <th>Fecha de vencimiento</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pago as $pago)
      <tr>
        <td>{{$pago->met_id}}</td>
        <td>{{$pago->met_nombre_titular}}</td>
        <td>{{$pago->met_tipo}}</td>
        <td>{{$pago->met_num_tarjeta}}</td>
        <td>{{$pago->met_fvencimiento}}</td>
        <td>
          <form action="{{action('PerfilController@destroy', $pago->met_id)}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
       <td><a href="{{action('PerfilController@create')}}" class="btn mx-auto text-center" style="color:black">Agregar metodo de pago</a></td>
  </div>
    {!! Form::close() !!}
@endsection