@extends('layouts.index')
@section('title','Factura')
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
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Subtotal</th>
      </tr>
     </thead>
     <tbody>
          <?php
       $i=0;
    ?>
      @foreach($productos as $producto)
      <tr>
         <td>{{$producto->pro_nombre}}</td>
         <td>{{$producto->ped_cantidad}}</td>
         <td>{{$producto->ped_precio}}</td>
         <td>{{$producto->ped_precio}}</td>
      </tr>
      @endforeach
     </tbody>
    </table>
       <p style="margin-left:700px">Cantidad de productos= {{$pedido[0]->ped_cantidad}} Total pagado = {{$pedido[0]->ped_total}} Bs.S</p>
       <a href="/Pedido/exit" class="btn centrar_boton" style="color:black">Terminar</a></td>
  </div>
  
@endsection