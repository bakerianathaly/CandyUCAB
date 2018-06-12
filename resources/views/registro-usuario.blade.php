@extends('layouts.index')
@yield('tittle','Registro usuario')
@yield('content')
    <div class="form-group">
        <label for="validationDefaultUsername">Username</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
            </div>
            <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
        </div>
    </div>
    <div class="form-group">
        <label for="formGroup">Clave</label>
        <input class="form-control" type="password" name="clave" placeholder="Ingresar clave para el usuario*">
    </div>  
@endsection