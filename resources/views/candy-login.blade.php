@extends('layouts.index')
@section('title','Login')
@section('content')

    <div class="container-fluid ">
        <div class="m-2">
            <div class=" ">
                <h2 id="login-letras">Iniciar Sesion <img id="login-candy" src="/images/candyicon.ico" alt="candyicon"></h2>
            </div>
        </div>    
    </div>

    <div class="a">            
        <div class="col-6 m-auto">
            <input type="text" class="form-control" placeholder="Usuario">
            <br>
            <input type="password" class="form-control" placeholder="password">
            <br>
            <a href="">{!! Form::submit('Iniciar Sesion', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}</a>
            <a href="registro/usuario">{!! Form::submit('Registrarse', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}</a>
        </div>
  </div>

@endsection