@extends('layouts.index')
@section('title','Comprar en tiendas')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Tiendas</h2>
            </div>
        </div>
    </div>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
   <div class="container">
    <br /> @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    <br /> @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Ubicacion</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tiendas as $tienda)
            <tr>
                <td>{{$tienda->tie_tipo}}</td>
                <td>{{$tienda->lug_nombre}}</td>
                <td>
                    <a href="{{action('TiendasController@inventario',$tienda->tie_id)}}" class="btn" style="background-color:#F79BEF; color:black;">Comprar aqui</a>   
                    <input name="_method" type="hidden" value="GET">         
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{!! Form::close() !!} 
@endsection