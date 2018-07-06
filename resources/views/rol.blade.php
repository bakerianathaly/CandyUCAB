@extends('layouts.index')
@section('title','Editar producto')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">{{$rol[0]->rol_tipo}}</h2>
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
    {!!Form::open(array('action' => array('RolController@edit', $rol[0]->rol_id)))!!}
    <div class="row container-fluid mt-5" style="margin-left:640px">
        <div class="col-lg-4 mr-auto">
            <div class="form-group">
                <div class="radio">
                @foreach($privilegios as $privilegio)
                @if($privilegio->fkrol != 0)
                <label style="margin-right:20px">{!!Form::checkbox('pri_id[]', $privilegio->pri_id, true)!!}{{$privilegio->pri_nombre}}</label> 
                 @else
                <label style="margin-right:20px">{!!Form::checkbox('pri_id[]', $privilegio->pri_id, false)!!}{{$privilegio->pri_nombre}}</label> 
                @endif
                @endforeach
                </div>
            </div>
         </div>
        </div>
    </div>

    <div class="trans text-center">
        {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF; margin-left: 587px;']) !!}
    </div>
    {!! Form::close() !!}
@endsection