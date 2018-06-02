<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CandyUCAB</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/css/candy-style.css">
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
        <!--El fixed-top lo que hace  es que a medida que bajo, la barra de navegacion baja conmigo
             navbar-light -->
        <a class="navbar-brand justify-content-around" href="candy-index.html"><img id="logo" src="/images/logo2.png" alt="candylogoi"></a>
        <p id="letras">Un dulce mundo</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
                  
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul id="header" class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="candy-index.html">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="candy-producto.html">Producto</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="candy-tiendas.html">Tiendas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="candy-promociones.html">Promociones</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="candy-registro.html">Registro</a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link colorletras" href="candy-login.html">Iniciar sesion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="pro-letras" class="container">
        <p>Productos</p>    
    </div>

    <div id="producto-show" class="card-deck m-auto">
        <div class="card">
            <img id="pro-img" class="card-img-top" src="/images/6.jpg" alt="Chupetas Rimbombin">
            <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Chupetas Rimbombin</h5>
                <p id="algunos-letras" class="card-text">Chupetas en forma de margaritas con rellno de chicle, chocolate y pueden adquirirse sin azucar.</p>
            </div>
            <div class="card-footer">
                <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
            </div>
        </div>
        <div class="card">
            <img id="pro-img" class="card-img-top" src="/images/2.jpg" alt="Ricolin">
            <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Ricolin</h5>
                <p id="algunos-letras" class="card-text">Caramelos supresores de la tos, sus sabores mas famosos son citricos y mentolados (poseen vitamina C).</p>
            </div>
            <div class="card-footer">
                <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
            </div>
        </div>
        <div class="card">
            <img id="pro-img" class="card-img-top" src="/images/3.jpg" alt="Firi Firi">
            <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Firi Firi</h5>
                <p id="algunos-letras" class="card-text">Pastillas que proporcionan frescura, vienen en muchos sabores pero el mas particular es el de menta (todos vienen sin azucar).</p>
            </div>
            <div class="card-footer">
                <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
            </div>
        </div>
        <div class="card">
            <img id="pro-img" class="card-img-top" src="/images/corazon.jpg" alt="Chupetas de corazon">
            <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Chupetas de corazon</h5>
                <p id="algunos-letras" class="card-text">Es la perfecta combinacion entre el suave sabor de la fresa con un polvo picante.</p>
            </div>
            <div class="card-footer">
                <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
            </div>
        </div>
    </div>

    <div id="producto-show" class="card-deck m-auto">
        <div class="card">
            <img id="pro-img" class="card-img-top" src="/images/pirulitos.jpg" alt="pirulitos">
            <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Pirulitos</h5>
                <p id="algunos-letras" class="card-text">Caramelos blandos con forma alargada, esta presentacion viene en un total de 6 sabores.</p>
            </div>
            <div class="card-footer">
                <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
            </div>
        </div>
        <div class="card">
            <img id="pro-img" class="card-img-top" src="/images/ricura.jpg" alt="Ricura">
            <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Ricura</h5>
                <p id="algunos-letras" class="card-text">Es una bola de caramelo picante con centro de chicle, posee una combinacion particular de sabores.</p>
            </div>
            <div class="card-footer">
                <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
            </div>
        </div>
        <div class="card">
            <img id="pro-img" class="card-img-top" src="/images/original.jpg" alt="el original">
            <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">El Original</h5>
                <p id="algunos-letras" class="card-text">Caramelo balsamico con el efecto de aliviar la irritacion de garganta y despejar las vias respiratorias; viene en 5 sabores.</p>
            </div>
            <div class="card-footer">
                <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
            </div>
        </div>
        <div class="card">
            <img id="pro-img" class="card-img-top" src="/images/5.jpg" alt="dulcin">
            <div class="card-body">
                <h5 id="algunos-titulo" class="card-title">Dulcin</h5>
                <p id="algunos-letras" class="card-text">Coloridos caramelos blandos masticables de forma cuadrada, vienen en 5 sabores (cada color representa un sabor).</p>
            </div>
            <div class="card-footer">
                <button id="botonRosado2" type="submit" class="btn btn-success"><i class="fa"></i>Agregar al carrito</button>
            </div>
        </div>
    </div>

    <footer class="row bg-dark container-fluid m-auto">
        <div class="col-md-4  isma">
            <a href="candy-quienesomos.html">Quienes Somos</a>
            <a href="#">Contactenos</a>
        </div>
        <div class="col-md-4 ">
            <img src="/images/logo2.png" class="rounded mx-auto d-block" alt="">
            <!--Rounded: le da un poco de redondeado a la imagen
                mx-auto: Centra un elemento, agrega un margin-left  un margin-right automatico
                float(-right o -left): hace que vayan a la izquierda o derecha (deben venir acompanados antes con un clearfix)
                d-block: Controla cuando el elemento debe quedarse en un bloque y un ancho especifico de pantalla-->
            <p>COPYRIGHT 2018 | TODOS LOS DERECHOS RESERVADOS</p>
        </div>
        <div class="col-md-4  isma">
            <a href="candy-tiendas.html">Ubicanos</a>
            <a href="#">Terminos y condiciones</a>
        </div>
    </footer>
 <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>