@extends('layouts.index')
@section('title','Listar producto')
@section('content')
    
    <div class="bg-dark letras mt-3">
        <p>Alguno de nuestros productos</p>
    </div>
 
    @if($productos[0])
    <div id="card" class="card-group">
       @foreach ($productos as $producto)
        <div class="card">
          <img class="card-img-top p-2" src="{{$producto->pro_ruta_imagen}}" alt="Pirulitos">
          <div class="card-body">
                <h1 id="algunos-titulo" class="card-title">{{$producto->pro_nombre}}</h1>
                <p id="algunos-letras"class="card-text">{{$producto->pro_descripcion}}}</p>
<<<<<<< HEAD
                @if($_SESSION['carritoid']!=='')
                <td><a href="/Carrito/add/{{$_SESSION['carritoid']}}/{{$producto->pro_id}}/0" class="btn" style="background-color:#F79BEF; color:black;">Agregar al carrito</a></td>
=======
                @if($_SESSION['carritoid']!='' && $_SESSION['Middleware']==true)
                <td><a href="{{action('PresupuestosController@add',$_SESSION['carritoid'],$producto->pro_id,0)}}" class="btn centrar_boton">Agregar al carrito</a></td>
>>>>>>> Carrito
                @endif
                {{-- <p id="algunos-letras"class="card-text"><small class="text-muted">{{$sabor->sab_tipo}}}</small></p> --}}
          </div>
        </div>
        @endforeach
    </div>
<<<<<<< HEAD
   
=======
     @if($_SESSION['carritoid']!='')
     <td><a href="{{action('PresupuestosController@index',$_SESSION['carritoid'])}}" class="btn centrar_boton">Ir al carrito</a></td>
     @elseif($_SESSION['Middleware']==true)
     <td><a href="{{action('PresupuestosController@create',$_SESSION['id'])}}" class="btn centrar_boton">Crear carrito</a></td>
     @endif
>>>>>>> Carrito
     
     @else
     <h2 id="registro-letras">No hay productos disponibles en esta tienda</h2>
     @endif
     <div>
     @if($_SESSION['carritoid']!=='')
     <td><a href="{{action('PresupuestosController@index',$_SESSION['carritoid'])}}" class="btn centrar_boton" style="color:black">Ir al carrito</a></td>
     <td><a href="/Tiendas/lista" class="btn centrar_boton" style="color:black">volver</a></td>
     @elseif($_SESSION['Middleware'])
     <td><a href="{{action('PresupuestosController@create',$_SESSION['id'])}}" class="btn centrar_boton" style="color:black">Crear carrito</a></td>
     <td><a href="/Tiendas/lista" class="btn centrar_boton" style="color:black">volver</a></td>
     @endif
     </div>
@endsection