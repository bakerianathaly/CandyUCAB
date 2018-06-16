@extends('layouts.index')
@section('title','Editar producto')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Editar tienda</h2>
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
    <div class="row container-fluid mt-5">
        <div class="col-lg-4 ml-auto">
            {!! Form::open(array('action' => array('TiendasController@update', $id))) !!}
            {!! csrf_field() !!}
            <input name="_method" type="hidden" value="PATCH">
            <label for="formGroup">Tipo de tienda</label>  
                <select name= "tipo" id="tipocandy" class="form-control" required>
                    <option value="{{$tienda->tie_tipo}}">{{$tienda->tie_tipo}}</option>
                    <option value="CandyUCAB">CandyUCAB</option>
                    <option value="MiniCandyUCAB">MiniCandyUCAB</option>
                </select>
        </div>
        <div class="col-lg-4 mr-auto">
            <div class="form-group">
                <label for="formGroup">Direccion</label>
                <select name= "fklugar" id="direccion" class="form-control" required>
                    <option value="{{$lugar->lug_id}}">{{$lugar->lug_nombre}}</option>
                    @foreach($parroquias as $parroquia)
                    <option value="{{$parroquia->lug_id}}">{{$parroquia->lug_nombre}}</option>
                    @endforeach
                </select>
            </div>
         </div>
        </div>
    </div>

    <div class="trans text-center">
        {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF; margin-left: 587px;']) !!}
    </div>
    {!! Form::close() !!}
@endsection