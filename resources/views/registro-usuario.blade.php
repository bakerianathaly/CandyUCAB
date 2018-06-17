@extends('layouts.index')
@yield('tittle','Registro usuario')
@section('content')

    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Registro de usuario</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid row ">
        <div class="col-6 m-auto">
            {!! Form::open(['url'=>'registro/usuario', 'method'=>'POST']) !!}
            <div class="form-group">
                <label for="formGroup">Correo registrado en clientes</label>
                <input class="form-control" type="text" name="correo" placeholder="Ingrese el correo electronico">
            </div>
            <div class="form-group">
                <label for="validationDefaultUsername">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    </div>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroup">Clave</label>
                <input class="form-control" type="password" name="clave" id="clave" placeholder="Ingresar clave para el usuario*">
            </div> 
            <div class="a text-center">
                {!! Form::submit('Crear usuario', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
     
@endsection