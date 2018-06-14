@extends('layouts.index')
@section('title','Agregar producto')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Agregar Tienda</h2>
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
            {!! Form::open(['url' => 'Tienda']) !!}
             <label for="formGroup">Tipo de tienda</label>  
                <select name= "tipo" id="tipocandy" class="form-control" required>
                    <option value="">Seleccione el tipo de tienda</option>
                    <option value="">CandyUCAB</option>
                    <option value="">MiniCandyUCAB</option>
                </select>

        </div>
        <div class="col-lg-4 mr-auto">
            <div class="form-group">
                <label for="formGroup">Direccion</label>
                <select name= "direccion" id="direccion" class="form-control" required>
                    <option value="">Seleccione el estado </option>
                    @foreach($estados as $estado)
                    <option value="{{$estado->lug_nombre}}">{{$estado->lug_nombre}}</option>
                    @endforeach
                </select>
            </div>
            </div>
        </div>
    </div>

    <div class="trans text-center">
        {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
    </div>
    {!! Form::close() !!}
@endsection
