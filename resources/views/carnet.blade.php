@extends('layouts.index')
@section('title','Perfil')
@section('content')

    <?php
        @session_start();
            if($_SESSION == NULL){
            $_SESSION['Middleware']=false;
            $_SESSION['carritoid']='';
        }
    ?>
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Perfil del Usuario</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card text-white bg-dark mb-3 mx-auto" style="max-width: 25rem;">
                <div class="card-header">
                    <h5 class="card-header text-center">Carnet del Usuario: {{$_SESSION['nombre']}}</h5>
                </div>
                <div class="card-body ">
                    <h5 class="card-title e">{{$cli_info[0]->cli_nombre}} {{$cli_info[0]->cli_apellido}}</h5>
                    <h5 class="card-title e">CI: {{$cli_info[0]->cli_ci}}</h5>
                    <h5 class="card-title text-center">ID: {{$numcarnet}}</h5>
                </div>
            </div>
        </div>
        <div class="mx-auto text-center">
            <a href="/perfil" class="btn btn-primary">Atras</a>
        </div>
    </div>
@endsection