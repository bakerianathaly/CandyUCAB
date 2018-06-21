@extends('layouts.index')
@section('title','Perfil')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Perfil del Usuario</h2>
            </div>
        </div>
    </div>

    <div class="container fluid">
        <div class="card mx-auto ">
            <h5 class="card-header text-center">Informacion del cliente con usuario: {{$_SESSION['nombre']}}</h5>
            <div class="card-body text-center">
                <h5 class="card-title">{{$cli_info[0]->cli_nombre}} {{$cli_info[0]->cli_apellido}}</h5>
                <h5 class="card-body">{{$cli_info[0]->cli_ci}}</h5>
                <h5 class="card-footer">{{$cli_info[0]->cli_correo}}</h5>
                @if($cli_info[0]->cli_numcarnet == null)
                    <a href="/perfil/{{$cli_info[0]->cli_id}}" class="btn btn-primary">Generar Carnet</a>
                    <a href="/perfil/create" class="btn btn-dark">Ver metodo de pago</a>
                    <a href="/registro/{{$cli_info[0]->cli_id}}/edit" class="btn btn-dark">Editar cliente</a>
                @else
                    <a href="/perfil/{{$cli_info[0]->cli_id}}" class="btn btn-primary">Mostrar Carnet</a>
                    <a href="/perfil/create" class="btn btn-dark">Ver metodo de pago</a>
                    <a href="/registro/{{$cli_info[0]->cli_id}}/edit" class="btn btn-warning">Editar cliente</a>
                @endif
            </div>
        </div>
    </div>
@endsection