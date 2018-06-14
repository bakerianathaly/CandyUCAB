@extends('layouts.index')
@section('title','Promociones')
@section('content')
    <div id="pro-letras" class="container-fluid">
        <p>Promociones</p>
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
                <center><img class="img-fluid" src="./ucab/corazon.jpg"></center>
                <div class="carousel-caption">
                    <h3></h3>
                </div>
            </div>
            <div class="carousel-item">
                <center><img class="img-fluid" src="./ucab/ricura.jpg"></center>
                <div class="carousel-caption">
                    <h3></h3>
                </div>
            </div>
            <div class="carousel-item">
                <center><img class="img-fluid" src="./ucab/pirulitos.jpg"></center>
                <div class="carousel-caption">
                    <h3></h3>
                </div>
            </div>
            <div class="carousel-item">
                <center><img class="img-fluid" src="./ucab/original.jpg"></center>
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
            <div class="card">
                <img id="pro-img" class="card-img-top" src="./ucab/pirulitos.jpg" alt="pirulitos">
                <div class="card-body">
                    <h5 id="algunos-titulo" class="card-title">Pirulitos <span id="descuentos">-30%</span></h5>
                    <p id="algunos-letras" class="card-text">Caramelos blandos con forma alargada, esta presentacion viene en un total de 6 sabores.</p>
                </div>
                <div class="card-footer">
                    <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
                </div>
            </div>
            <div class="card">
                <img id="pro-img" class="card-img-top" src="./ucab/ricura.jpg" alt="Ricura">
                <div class="card-body">
                    <h5 id="algunos-titulo" class="card-title">Ricura <span id="descuentos">-50%</span></h5>
                    <p id="algunos-letras" class="card-text">Es una bola de caramelo picante con centro de chicle, posee una combinacion particular de sabores.</p>
                </div>
                <div class="card-footer">
                    <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
                </div>
            </div>
            <div class="card">
                <img id="pro-img" class="card-img-top" src="./ucab/original.jpg" alt="el original">
                <div class="card-body">
                    <h5 id="algunos-titulo" class="card-title">El Original <span id="descuentos">-15%</span></h5>
                    <p id="algunos-letras" class="card-text">Caramelo balsamico con el efecto de aliviar la irritacion de garganta y despejar las vias respiratorias; viene en 5 sabores.</p>
                </div>
                <div class="card-footer">
                    <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
                </div>
            </div>
            <div class="card">
                <img id="pro-img" class="card-img-top" src="./ucab/corazon.jpg" alt="Chupetas de corazon">
                <div class="card-body">
                    <h5 id="algunos-titulo" class="card-title">Chupetas de corazon <span id="descuentos">-10%</span></h5>
                    <p id="algunos-letras" class="card-text">Es la perfecta combinacion entre el suave sabor de la fresa con un polvo picante.</p>
                </div>
                <div class="card-footer">
                    <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
                </div>
            </div>
    </div>
@endsection