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
        <th></th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Precio en puntos</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        <th colspan="2">Action</th>
      </tr>
     </thead>
     <tbody>
          <?php
       $i=0;
    ?>
      @foreach($productos as $producto)
      <tr>
<<<<<<< HEAD
           {!! Form::open(array('action' => array('PresupuestosController@actualizar', $_SESSION['carritoid']))) !!}
=======
           {!! Form::open(array('action' => array('PresupuestoController@update', $_SESSION['carritoid']))) !!}
>>>>>>> Carrito
         {{csrf_field()}}
             <?php
       $i=$i+1;
    ?>
         <td><img src="{{$producto->pro_ruta_imagen}}" width="100px" height="100px"  alt=""></td>
         <td>{{$producto->pro_nombre}}</td>
         <td>{{$producto->pre_precio}}</td>
         <td>??</td>
         <td>
             <input name="cantidad[]" type="numeric" value="{{$producto->pre_cantidad}}">
         </td>
<<<<<<< HEAD
         <td><a href="/Carrito/delete/{{$_SESSION['carritoid']}}/{{$producto->fkproducto}}" class="btn btn-warning">Eliminar</a><td>
=======
         <td><a href="{{{{action('PresupuestosController@delete',$_SESSION['carritoid'],$producto->fkproducto)}}}}" class="btn btn-warning">Eliminar</a><td>
         <input name="_method" type="hidden" value="DELETE">
>>>>>>> Carrito
         <td>{!! Form::submit('Actualizar', ['class' => 'btn', 'style'=> 'background-color:#F79BEF;']) !!}<td>
      </tr>
      @endforeach
     </tbody>
    </table>
       {!! Form::close() !!}
       <a href="/Tiendas/lista" class="btn centrar_boton" style="color:black">Seguir comprando</a></td>
       <a href="/Carrito/pago/{{$_SESSION['id']}}" class="btn centrar_boton" style="color:black">Realizar compra</a></td>
  </div>
  
@endsection