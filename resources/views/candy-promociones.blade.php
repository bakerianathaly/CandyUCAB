@extends('layouts.index')
@section('title','Promociones')
@section('content')
    <div id="pro-letras" class="container-fluid">
        <p>Promociones</p>
    </div>

@foreach($descuentos as $descuento)
            @foreach($productos as $producto)
                @if($descuento->fkproducto == $producto->pro_id)
    <div id="carousel-ejemplo2" class="carousel slide m-0" data-ride="carousel">
    
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-ejemplo2" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-ejemplo2" data-slide-to="1"></li>
                        <li data-target="#carousel-ejemplo2" data-slide-to="2"></li>
                        <li data-target="#carousel-ejemplo2" data-slide-to="3"></li> 
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <center><img class="img-fluid" src="{{$producto->pro_ruta_imagen}}"></center>
                            <div class="carousel-caption">
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                
        <a class="carousel-control-prev" href="#carousel-ejemplo2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-ejemplo2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>    
    </div>
@endif
            @endforeach
        @endforeach
    
    <div id="producto-show" class="card-deck m-auto">
        @foreach($descuentos as $descuento)
            @foreach($productos as $producto)
                @if($descuento->fkproducto == $producto->pro_id)
                    <div class="card">
                        <img id="pro-img" class="card-img-top" src="{{$producto->pro_ruta_imagen}}" alt="pirulitos">
                        <div class="card-body">
                            <h5 id="algunos-titulo" class="card-title">{{$producto->pro_nombre}} <span id="descuentos">-{{$descuento->des_cantidad}}%</span></h5>
                            <p id="algunos-letras" class="card-text">{{$producto->pro_descripcion}}</p>
                        </div>
                        <div class="card-footer">
                            <button value="{{$producto->pro_id}}" id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
                        </div>
                    </div>
                    @endif
            @endforeach
        @endforeach
    </div>
@endsection