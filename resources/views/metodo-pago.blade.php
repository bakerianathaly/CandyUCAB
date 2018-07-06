@extends('layouts.index')
@section('title','Elegir metodo de pago')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
            <div class=" ">
                <h2 id="registro-letras">Metodo de pago</h2>
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
    <div class="row">
             {!! Form::open(array('action' => array('PresupuestosController@compraOnline', $_SESSION['carritoid']))) !!}
             {{csrf_field()}}
             <label for="formGroup" style="margin-left:400px">Metodo de pago</label>  
                <select name= "metodoid" id="tipocandy" class="form-control mb-3" style="margin-left:400px" required>
                    <option value="">Seleccione el metodo de pago</option>
                    @foreach($metodos as $metodo)
                    @if($metodo->met_tipo=='T')
                    <option value="{{$metodo->met_id}}">Tarjeta de credito</option>
                    @elseif($metodo->met_tipo=='C')
                     <option value="{{$metodo->met_id}}">Cheque</option>
                    @elseif($metodo->met_tipo=='E')
                     <option value="{{$metodo->met_id}}">Efectivo</option>
                    @endif
                    @endforeach
                </select>
    </div>

    <div class="trans text-center">
        {!! Form::submit('Realizar compra', ['class' => 'btn btn-secondary mx-auto text-center', 'style'=> 'color: white;']) !!}
    </div>
    {!! Form::close() !!}
@endsection
