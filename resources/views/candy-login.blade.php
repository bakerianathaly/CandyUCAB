@extends('layouts.index')
@section('title','Login')
@section('content')
{!! Form::open( ['action' => 'ClientsController@login', 'method' => 'POST', 'class' => 'datosDeRegistro'] ) !!}

    <div id="login-centro" class="container-fluid m-auto">
        <div class="m-2">
            <div class=" ">
                <h2 id="login-letras">Iniciar Sesion <img id="login-candy" src="/images/candyicon.ico" alt="candyicon"></h2>
            </div>
        </div>
    </div>
    <div id="login-centro" class="container">
        <form class="form-horizontal" role="form" method="" action="">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">Correo Electronico</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon"><i class="fa fa-at"></i></div>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Nombre de usuario" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                        <div class="form-group">
                        <label class="sr-only" for="password">Clave</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Clave" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-7">
                  <!--  {!! Form::submit('Registrarse', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!} -->
                    {!! Form::submit('login', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
                    @if (\Session::has('success'))
                      <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                      </div><br />
                     @endif
                </div>
            </div>
        </form>
    </div>
{!! Form::close() !!}
@endsection
