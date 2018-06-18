@extends('layouts.index')
@section('title','Tienda Productos')
@section('content')
    
    <div class="bg-dark letras mt-3">
        <p>Alguno de nuestros productos</p>
    </div>
 
    @if(\Session::has('producto'))
    <div id="card" class="card-deck m-4 p-4 ">
       @foreach (Session::get('producto') as $producto)
        <div class="card border-dark">
          <img class="card-img-top p-2" src="{{$producto->pro_ruta_imagen}}" alt="Pirulitos">
          <div class="card-body">
                <h1 id="algunos-titulo" class="card-title">{{$producto->pro_nombre}}</h1>
                <p id="algunos-letras"class="card-text">{{$producto->pro_descripcion}}}</p>
                @if(\Session::has('carritoid'))
                <td><a href="{{action('PresupuestosController@add', Session::get('carritoid'), Session::get('userid'),0)}}" class="btn centrar_boton">Agregar al carrito</a></td>
                @endif
                {{-- <p id="algunos-letras"class="card-text"><small class="text-muted">{{$sabor->sab_tipo}}}</small></p> --}}
          </div>
        </div>
        @endforeach
    </div>
     @if(\Session::has('carritoid'))
     <td><a href="{{action('PresupuestosController@index',Session::get('carritoid'))}}" class="btn centrar_boton">Ir al carrito</a></td>
     @elseif(\Session::has('userid'))
     <td><a href="{{action('PresupuestosController@create',Session::get('userid'))}}" class="btn centrar_boton">Crear carrito</a></td>
     @endif
     
     @else
     <h2 id="registro-letras">No hay productos disponibles en esta tienda</h2>
     @endif
 
     <td><a href="/Tiendas/lista" class="btn centrar_boton" style="color:black">volver</a></td>
@endsection