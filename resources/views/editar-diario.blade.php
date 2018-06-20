@extends('layouts.index')
@section('title', 'Editar Diario Dulce')
@section('content')

    <div id="login-centro" class="container-fluid m-auto">
        <div class="m-2">
            <div class=" ">
                <h2 id="login-letras2">Editar Diario Dulce<img id="login-candy" src="/images/candyicon.ico" alt="candyicon"></h2>
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
        {!! Form::open(array('action' => array('DiarioController@update', $id))) !!}
        {!! csrf_field() !!}
        <input name="_method" type="hidden" value="PATCH">
        <div class="col-6 m-auto">
            
            <div class="form-group col" >
                <input name="des" value="{{$y}}" type="hidden">
                <label for="ffinal">Fecha final del Diario</label>
                <input value="{{$diario[0]->dia_fvencimiento}}" type="date" class="form-control" name="ffinal" id="ffinal">
            </div>
            <div class="form-group col" id="producto">
                @foreach($descuento as $descuento)
                    
                            <label for="formGroup">Producto</label>
                            <select name= "producto[]" id="producto" class="form-control">
                                @foreach($productos as $producto)
                                @if($descuento->fkproducto == $producto->pro_id)
                                    
                                <option value="{{$descuento->fkproducto}}">{{$producto->pro_nombre}}</option>
                                <option value=""></option>
                                @endif
                                @endforeach
            
                            </select> </br>
                            <div class="form-group ">
                                <label for="formGroup">Descuento</label>
                                <input value="{{$descuento->des_cantidad}}" class="form-control" type="number" min="2" max="99" name="descuento[]" placeholder="Ingresar el descuento">
                            </div>
                @endforeach
                
            </div>
            <span class="input-group-btn">
                <button type="button" class="btn btn-default addButton" onclick="producto_dinamico();" > Agregar otro producto<i class="fa fa-plus"></i> </button>
            </span>
        </div>
        <div class="trans text-center mt-3">
            {!! Form::submit('Editar Promocion', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    
    <script>
        var add = 1;
        function producto_dinamico() {
            add++;
            var objTo = document.getElementById('producto')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass"+add);
            var rdiv = 'removeclass'+add;
            divtest.innerHTML = '<div class="form-group"> <label for="formGroup">Producto</label><select name= "producto[]" id="producto" class="form-control"><option value="">Seleccione un Producto</option> @foreach($productos as $producto) <option value="{{$producto->pro_id}}">{{$producto->pro_nombre}}</option> @endforeach</select> </div> <div class="form-group"><label for="formGroup">Descuento</label><input class="form-control" type="number" min="2" max="99" name="descuento[]" placeholder="Ingresar el descuento"></div><span class="input-group-btn"> <button type="button" class="btn btn-danger" onclick="remove_producto_dinamico('+ add +');" >Eliminar un producto <i class="fa fa-minus"></i> </button>  </span>';
            objTo.appendChild(divtest)
        }

        function remove_producto_dinamico(rid) {
            $('.removeclass'+rid).remove();
        }
    </script>

@endsection