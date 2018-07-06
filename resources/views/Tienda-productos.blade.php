@extends('layouts.index')
@section('title','Listar producto')
@section('content')
    
    <div class="bg-dark letras mt-3">
        <p>Alguno de nuestros productos</p>
    </div>
 
    @if($productos)
    <div id="card" class="card-group">
       @foreach ($productos as $producto)
        <div class="card">
          <img class="card-img-top p-2" src="{{$producto->pro_ruta_imagen}}" alt="Pirulitos">
          <div class="card-body">
                <h1 id="algunos-titulo" class="card-title">{{$producto->pro_nombre}}</h1>
                <p id="algunos-letras"class="card-text">{{$producto->pro_descripcion}}}</p>
                @if($_SESSION['carritoid']!=='')
                <td><a href="/Carrito/add/{{$_SESSION['carritoid']}}/{{$producto->pro_id}}/0" class="btn btn-secondary mx-auto text-center"  style="color: white;">Agregar al carrito</a></td>
                @endif
                {{-- <p id="algunos-letras"class="card-text"><small class="text-muted">{{$sabor->sab_tipo}}}</small></p> --}}
          </div>
        </div>
        @endforeach
    </div>
   
     
     @else
     <h2 id="registro-letras">No hay productos disponibles en esta tienda</h2>
     @endif
     <div>
     @if($_SESSION['carritoid']!=='')
     <td><a href="{{action('PresupuestosController@index',$_SESSION['carritoid'])}}" class="btn btn-secondary mx-auto text-center" style="color: white">Ir al carrito</a></td>
     <td><a href="/Tiendas/lista" class="btn btn-secondary mx-auto text-center" style="color: white">volver</a></td>
     @elseif($_SESSION['Middleware'])
     <td><a href="{{action('PresupuestosController@create',$_SESSION['id'])}}" class="btn btn-secondary mx-auto text-center" style="color: white">Crear carrito</a></td>
     <td><a href="/Tiendas/lista" class="btn btn-secondary mx-auto text-center" style="color: white">volver</a></td>
     @endif
     </div>
@endsection