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
        <a class="navbar-brand justify-content-around" href="candy-index.html">
            <img id="logo" src="/images/logo2.png" alt="candylogoi">
        </a>
        <p id="letras">Un dulce mundo</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul id="header" class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="candy-index.html">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
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


    <div class="container-fluid">
  
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Editar Producto</h2>
            </div>
        </div>
    </div>
<h3>{{$Producto}}</h3>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-4 ml-auto">
            {!! Form::open(['url' => 'Producto']) !!}
            <div class="form-group">
                <label for="formGroup">Nombre del producto</label>
                <input class="form-control" type="text" name="nombre" placeholder="Ingresar nombre">
            </div>
            <div class="form-group">
                <label for="formGroup">Relleno</label>
                <input class="form-control" type="text" name="relleno" placeholder="Ingresar el relleno">
            </div>
            <div class="form-group">
                <label for="formGroup">Textura</label>
                <input class="form-control" type="text" name="textura" placeholder="Ingrese la textura">
            </div>
            <div class="form-group">
                <label for="formGroup">Puntuacion</label>
                <input class="form-control" type="number" min="1" max="999" name="puntuacion" placeholder="Ingresar la puntuacion">
            </div>

        </div>
        <div class="col-lg-4 mr-auto">

            <div class="form-group">
                <label for="formGroup">Sabor</label>
                <input class="form-control" type="text" name="sabor" placeholder="Ingresar el Sabor">
            </div>
            <div class="form-group">
                <label for="formGroup">Tipo</label>
                <input class="form-control" type="text" name="tipo" placeholder="Ingresar el Tipo">
            </div>
        </div>

    </div>

    <div class="trans text-center">
        {!! Form::submit('Agregar', ['class' => 'btn btn-default botonRosado']) !!}
    </div>
    {!! Form::close() !!}


    <footer class="footer">
        <div class="row bg-dark container-fluid m-auto">
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
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
