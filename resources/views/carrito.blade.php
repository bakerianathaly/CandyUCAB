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
        <th>Imagen</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Precio en puntos</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        <th colspan="2">Action</th>
      </tr>
     </thead>
     <tbody>
      @foreach($productos as $producto)
      <tr>
           {!! Form::open(array('action' => array('PresupuestoController@update', Session::get($carritoid)))) !!}
         {{csrf_field()}}
         <input name="_method" type="hidden" value="PATCH">
         <td>{{$producto->pro_ruta_imagen}}</td>
         <td>{{$producto->pro_nombre}}</td>
         <td>{{$producto->pre_precio}}</td>
         <td>??</td>
         <td>
             <input name="cantidad" type="hidden" value="{{$producto->pre_cantidad}}">
             <input name="pre_id" type="hidden" value="{{$producto->pre_id}}">
         </td>
         <td><a href="{{{{action('PresupuestosController@delete',Session::get($carritoid),$producto->fkproducto)}}}}" class="btn btn-warning">Eliminar</a><td>
         <input name="_method" type="hidden" value="DELETE">
         <td>{!! Form::submit('Actualizar', ['class' => 'btn', 'style'=> 'background-color:#F79BEF;']) !!}<td>
      </tr>
      @endforeach
     </tbody>
    </table>
       {!! Form::close() !!}
       <td><a href="/Tiendas/lista" class="btn centrar_boton">Seguir comprando</a></td>
  </div>
  
@endsection