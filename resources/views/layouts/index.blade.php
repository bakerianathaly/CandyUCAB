<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/images/candyicon.ico" type="image/x-icon">
    <title>CandyUCAB - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/css/candy-style.css">
</head>
<body>
     <?php
      @session_start();
      if($_SESSION == NULL){
        $_SESSION['Middleware']=false;
        $_SESSION['carritoid']='';
      }
    ?>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">>
        <a class="navbar-brand justify-content-around" href="candy-index.html"><img id="logo" src="/images/logo2.png" alt="candylogoi"></a>
        <p id="letras">Un dulce mundo</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul id="header" class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="/">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="ImportarExcel">Importar<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="/Producto">Producto</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="/Tiendas/lista">Tiendas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link colorletras" href="/DiarioDulce">Diario dulce</a>
                </li>
                @if( $_SESSION['Middleware']==false)
                 <li class="nav-item active">
                 <a class="nav-link colorletras" href="login">Carrito</a>
                 </li>
                @elseif($_SESSION['carritoid']=='')
                 <li class="nav-item active">
                 <a class="nav-link colorletras" href="Carrito/create/{{$_SESSION['id']}}">Carrito</a>
                 </li>
                 @else
                 <li class="nav-item active">
                 <a class="nav-link colorletras" href="/Carrito/{{$_SESSION['carritoid']}}">Carrito</a>
                 </li>
                 @endif
                <li class="nav-item active">
                    @if ($_SESSION['Middleware'] == true)
                        @if ($_SESSION['tipo']=='Empleado')
                            <a class="nav-link colorletras" href="/registro">Registro</a>
                        @endif
                    @else
                        <a class="nav-link colorletras" href="/registro/create">Registro</a>
                    @endif
                </li>
                <li class="nav-item active">
                    @if ($_SESSION['Middleware'] == true)
                        @if ($_SESSION['tipo'] == 'Cliente')
                            <a class="nav-link colorletras" href="/perfil">Perfil</a>
                        @else
                            <a class="nav-link colorletras" href="/reporte">Reportes</a>
                        @endif
                    @endif
                </li>
                <li class="nav-item active ">
                  @if ($_SESSION['Middleware']==false)
                    <a class="nav-link colorletras" href="/login">Login</a>
                  @else
                    <a class="nav-link colorletras" href="/logout">Logout</a>
                 @endif
                </li>
                
            </ul>
        </div>
    </nav>

    @yield('content');

    <footer class="row bg-dark container-fluid m-auto ">
        <div class="col-md-4  isma">
            <a href="/quienes-somos">Quienes Somos</a>
            <a href="#">Contactenos</a>
        </div>
        <div class="col-md-4 ">
            <img src="/images/logo2.png" class="rounded mx-auto d-block" alt="">
            <p>COPYRIGHT 2018 | TODOS LOS DERECHOS RESERVADOS</p>
        </div>
        <div class="col-md-4  isma">
            <a href="/Tienda">Ubicanos</a>
            <a href="#">Terminos y condiciones</a>
        </div>
    </footer>
    <script src="{{asset('jquery/jquery-2.1.1.min.js')}}"> </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.carousel').carousel({
            interval:2300,
            pause:"hover"
        });
    </script>
</body>
</html>
