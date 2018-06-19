@extends('layouts.index')
@section('title', 'Creacion Diario Dulce')
@section('content')

    <div id="login-centro" class="container-fluid m-auto">
        <div class="m-2">
            <div class=" ">
                <h2 id="login-letras2">Crear Diario Dulce<img id="login-candy" src="/images/candyicon.ico" alt="candyicon"></h2>
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
        <div class="col-6 m-auto">
            {!! Form::open(['url' => 'DiarioDulce']) !!}
            <div class="form-group col">
                <label for="finicio">Seleccione la fecha de inicio del Diario</label>
                <input type="date" class="form-control" name="finicio" id="finicio">
            </div>
            <div class="form-group col">
                <label for="ffinal">Fecha final del Diario</label>
                <input type="date" class="form-control" name="ffinal" id="ffinal">
            </div>
            <div class="form-group" id="producto">
                <label for="formGroup">Producto</label>
                <select name= "producto[]" id="producto" class="form-control" required>
                    <option value="">Seleccione un Producto</option>
                    @foreach($productos as $producto)
                        <option value="{{$producto->pro_id}}">{{$producto->pro_nombre}}</option>
                    @endforeach
                </select> </br>
                <div class="form-group">
                    <label for="formGroup">Descuento</label>
                    <input class="form-control" type="number" min="2" max="99" name="descuento[]" placeholder="Ingresar el descuento">
                </div>
            </div>
            <span class="input-group-btn">
                <button type="button" class="btn btn-default addButton" onclick="producto_dinamico();" > Agregar otro producto<i class="fa fa-plus"></i> </button>
            </span>
        </div>
        <div class="trans text-center">
            {!! Form::submit('Crear Promociones', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        var add = 1;
        function producto_dinamico() {
            add++;
            var objTo = document.getElementById('producto')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass"+add);
            var rdiv = 'removeclass'+add;
            divtest.innerHTML = '<div class="form-group"> <label for="formGroup">Producto</label><select name= "producto[]" id="producto" class="form-control" required><option value="">Seleccione un Producto</option> @foreach($productos as $producto) <option value="{{$producto->pro_id}}">{{$producto->pro_nombre}}</option> @endforeach</select> </div> <div class="form-group"><label for="formGroup">Descuento</label><input class="form-control" type="number" min="2" max="99" name="descuento[]" placeholder="Ingresar el descuento"></div><span class="input-group-btn"> <button type="button" class="btn btn-danger" onclick="remove_producto_dinamico('+ add +');" >Eliminar un producto <i class="fa fa-minus"></i> </button>  </span>';
            objTo.appendChild(divtest)
        }

        function remove_producto_dinamico(rid) {
            $('.removeclass'+rid).remove();
        }
    </script>
    <script>
        $('#finicio').change(function() {
            var finicio = $(this).val();
            var time = moment(finicio, 'YYYY-MM-DD', true);
            if (time.isValid()) {
                var ffinal = time.add(10, 'd');
                $('#ffinal').val(ffinal.format('YYYY-MM-DD'));
            }
        });
    </script>

@endsection