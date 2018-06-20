@extends('layouts.index')
@section('title','Diario Dulce')
@section('content')
    <div id="pro-letras" class="container-fluid">
        <p>Diario Dulce</p>
        <p class="b">Validas hasta {{$diario[0]->dia_fvencimiento}}</p>
    </div>
    
    <div id="carousel-ejemplo2" class="carousel slide m-0" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-ejemplo2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-ejemplo2" data-slide-to="1"></li>
            <li data-target="#carousel-ejemplo2" data-slide-to="2"></li>
            <li data-target="#carousel-ejemplo2" data-slide-to="3"></li> 
        </ol>
        
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <center><img class="img-fluid" src="images/1.jpg"></center>
                <div class="carousel-caption">
                    <h3></h3>
                </div>
            </div>
            <div class="carousel-item">
                <center><img class="img-fluid" src="images/2.jpg"></center>
                <div class="carousel-caption">
                    <h3></h3>
                </div>
            </div>
            <div class="carousel-item">
                <center><img class="img-fluid" src="images/3.jpg"></center>
                <div class="carousel-caption">
                    <h3></h3>
                </div>
            </div>
            <div class="carousel-item">
                <center><img class="img-fluid" src="images/4.jpg"></center>
                <div class="carousel-caption">
                    <h3></h3>
                </div>
            </div>
            <div class="carousel-item">
                <center><img class="img-fluid" src="images/5.jpg"></center>
                <div class="carousel-caption">
                    <h3></h3>
                </div>
            </div>
            <div class="carousel-item">
                <center><img class="img-fluid" src="images/6.jpg"></center>
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
    
    <div id="producto-show" class="card-deck m-auto">
        @foreach($descuentos as $descuento)
            @foreach($productos as $producto)
                @if(($descuento->fkproducto == $producto->pro_id) and ($descuento->fkdiario == $diario[0]->dia_id))
                    <div class="card">
                        <img id="pro-img" class="card-img-top" src="{{$producto->pro_ruta_imagen}}" alt="pirulitos">
                        <div class="card-body">
                            <h5 id="algunos-titulo" class="card-title">{{$producto->pro_nombre}} <span id="descuentos">-{{$descuento->des_cantidad}}%</span></h5>
                            <p id="algunos-letras" class="card-text">{{$producto->pro_descripcion}}</p>
                        </div>
                        <div class="card-footer">
                            
                            <button value="{{$producto->pro_id}}" id="botonRosado2" type="submit" class="btn btn-success"><h5 class="c">{{$descuento->des_new_precio}} BF</h5><i class="fa"></i>Agregar al carrito</button>
                           
                        </div>
                    </div>
                    @endif
            @endforeach
        @endforeach
    </div>
        <div class="col-sm">
                <form action="{{action('DiarioController@destroy', $diario[0]->dia_id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
                <a  href="{{action('DiarioController@edit', $diario[0]->dia_id)}}" class="btn btn-warning">Editar</a>
                <input name="_method" type="hidden" value="PATCH">
                <a href="{{action('DiarioController@create')}}" class="btn btn-primary">Crear nuevo diario</a>
        </div>
@endsection