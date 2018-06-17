@extends('layouts.index')
@section('title','Inicio')
@section('content')
    <div id="carousel-ejemplo" class="carousel slide m-0" data-ride="carousel">
      @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
       @endif

        <ol class="carousel-indicators">

            <li data-target="#carousel-ejemplo" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="1"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="2"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="3"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="4"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="5"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="6"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="7"></li>

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

        <a class="carousel-control-prev" href="#carousel-ejemplo" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-ejemplo" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>

    <div class="bg-dark letras mt-3">
        <p>Alguno de nuestros productos</p>
    </div>

    <div id="card" class="card-deck m-4 p-4 ">
        <div class="card border-dark">
          <img class="card-img-top p-2" src="images/pirulitos.jpg" alt="Pirulitos">
          <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Pirulitos</h5>
                <p id="algunos-letras"class="card-text">Son caramelos blandos que reciben su nombre por la forma alargada con la que se presentan.</p>
                <p id="algunos-letras"class="card-text"><small class="text-muted">Sabores a fresa, naranja, cola, melocoton, patilla y manzana</small></p>
          </div>
        </div>
        <div class="card border-dark">
          <img class="card-img-top p-2" src="images/5.jpg" alt="Dulcin">
          <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Dulcin</h5>
                <p id="algunos-letras"class="card-text">Son los caramelos blando más conocidos de Candy UCAB. Son caramelos masticables de forma cuadrada y muy coloridos, asociando cada color a un sabor.</p>
                <p id="algunos-letras"class="card-text"><small class="text-muted">Sabores a fresa, piña, limón, naranja y cereza.</small></p>
          </div>
        </div>
        <div class="card border-dark">
          <img class="card-img-top p-2" src="images/4.jpg" alt="Choco Candy">
          <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Choco Candy</h5>
                <p id="algunos-letras"class="card-text">Pequeñas pastillas de café con leche a las que se les atribuían efectos positivos para combatir resfriados.</p>
                <p id="algunos-letras"class="card-text"><small class="text-muted">Sabor tradicional, café expresso, capuccino, fresas con nata, menta, nata y mousse de limón todos con base de chocolate.</small></p>
            </div>
        </div>
        <div class="card border-dark">
            <img class="card-img-top p-2" src="images/1.jpg" alt="Blue">
            <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Blue</h5>
                <p id="algunos-letras"class="card-text">Caramelo de café elaborado en España al termino de la guerra civil (la receta de CandyUCAB posee un centro e arequipe). </p>
                <p id="algunos-letras"class="card-text"><small class="text-muted">Sabores a caramelo de piñones, caramelo de cremas, pastillas de café con leche, caramelos   de   cortesía.</small></p>
            </div>
        </div>
    </div>

    <div class="m-auto bg-dark letras">
        <p>Nuestros productos mas vendidos</p>
    </div>

    <div class="row m-auto container-fluid pb-3">
        <div class="m-auto col-5 card border-secondary  mb-3" style="max-width: 18rem;">
            <div id="algunos-titulo" class="card-header">Ricolin</div>
            <div class="card-body text-primary">
                <img class="card-img-top p-2" src="images/2.jpg" alt="Ricolin">
            </div>
        </div>
        <div class="m-auto col-5 card border-secondary mb-3" style="max-width: 18rem;">
            <div id="algunos-titulo" class="card-header">El Original</div>
            <div class="card-body text-secondary">
                <img class="card-img-top p-2" src="images/original.jpg" alt="El Original">
            </div>
        </div>
        <div class="m-auto col-5 card border-secondary mb-3" style="max-width: 18rem;">
            <div id="algunos-titulo" class="card-header pb-0">Chupetas Rimbonbin</div>
            <div class="card-body text-success">
                <img class="card-img-top p-2" src="images/6.jpg" alt="Chupetas Rimbonbin">
            </div>
        </div>
        <div class="m-auto col-5 card border-secondary mb-3" style="max-width: 18rem;">
            <div id="algunos-titulo" class="card-header">Ricura</div>
            <div class="card-body text-danger">
                <img class="card-img-top p-2" src="images/ricura.jpg" alt="Ricura">
            </div>
        </div>
    </div>

@endsection
