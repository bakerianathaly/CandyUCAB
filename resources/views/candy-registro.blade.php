@extends('layouts.index')
@section('title','Registro Clientes Naturales')
@section('content')

  <div class="container-fluid">
    <div class="m-2">
      <div >
       <h2 id="registro-letras">Registro Clientes</h2>
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
    <ul class="nav nav-tabs nav-justified">
      <li class="registro-rosa nav-item"><a id="registro-natural" class="nav-link active" href="#Naturales" role="tab" data-toggle="tab" aria-selected="true" aria-controls="Naturales">Naturales</a></li>
      <li class="registro-rosa nav-item"><a id="registro-juridic" class="nav-link" href="#Juridicos" role="tab" data-toggle="tab" aria-selected="false" aria-controls="Juridicos">Juridicos</a></li>
    </ul>
  </div>

  <div class="tab-content">
    <!--Registro para clientes naturales -->
    <div class="tab-pane active" id="Naturales" role="tabpanel" aria-labelledby="registro-natural">
      <div class="row container-fluid mt-5">
        <div class="col-lg-4 ml-auto" id="Naturales">
          {!! Form::open(['url' => 'registro']) !!}
          <div class="form-group">
            <label for="formGroup">Nombre</label>
            <input class="form-control" type="text" name="nombre" placeholder="Ingresar nombre">
          </div>
          <div class="form-group">
            <label for="formGroup">Apellido</label>
            <input class="form-control" type="text" name="apellido" placeholder="Ingresar el apellido">
          </div>
          <div class="form-group">
            <label for="formGroup">Correo</label>
            <input class="form-control" type="text" name="correo" placeholder="Ingrese el correo electronico">
          </div> 
          <div class="form-group">
            <label for="formGroup">Telefono de contacto</label>
            <input class="form-control" type="text" name="telefono" placeholder="02432398765" required>
          </div>
          <div class="form-group">
            <label for="formGroup">RIF</label>
            <input class="form-control" type="text" name="rif" placeholder="Ingrese el RIF" required>
          </div>
        </div>
        <div class="col-lg-4 mr-auto">
          <div class="form-group">
            <label for="formGroup">Cedula</label>
            <input class="form-control" type="text" name="ci" placeholder="Ingrese la cedula">
          </div>
          <div class="form-group">
            <label for="formGroup">Tienda</label>
            <select name= "tienda" id="tienda" class="form-control" required>
              <option value="">Seleccione la tienda de preferencia</option>
              @foreach($tiendas as $tienda)
                <option value="{{$tienda->tie_id}}">{{$tienda->tie_tipo}} {{$tienda->lug_nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="formGroup">Direccion</label>
            <select name= "estado" id="estado" class="form-control mb-2" required>
              <option value="">Seleccione su estado </option>
              @foreach($estados as $estado)
                <option value="{{$estado->lug_id}}">{{$estado->lug_nombre}}</option>
              @endforeach
            </select>
            <select name= "municipio" id="municipio" class="form-control mb-2" required>
              <option value="">Seleccione el municipio </option>
              @foreach($municipios as $municipio)
                <option value="{{$municipio->lug_id}}">{{$municipio->lug_nombre}}</option>
              @endforeach
            </select>
            <select name= "parroquia" id="parroquia" class="form-control" required>
              <option value="">Seleccione la parroquia </option>
              @foreach($parroquias as $parroquia)
                <option value="{{$parroquia->lug_id}}">{{$parroquia->lug_nombre}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="trans text-center">
        {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
      </div>
      {!! Form::close() !!}
    </div>
    <!-- Registro para clientes juridicos -->
    <div class="tab-pane" id="Juridicos" role="tabpanel" aria-labelledby="registro-juridico">
      <div class="row container-fluid mt-5">
        <div class="col-lg-4 ml-auto" id="Juridicos">
          {!! Form::open(['url' => 'registro']) !!}
          <div class="form-group">
            <label for="formGroup">RIF</label>
            <input class="form-control" type="text" name="rif" placeholder="Ingrese el RIF">
          </div>
          <div class="form-group">
            <label for="formGroup">Correo</label>
            <input class="form-control" type="text" name="correo" placeholder="candyUCAB@candy.com">
          </div> 
          <div class="form-group">
            <label for="formGroup">Total capital de la empresa</label>
            <input class="form-control" type="text" name="total_capital" placeholder="Ingresar el capital">
          </div>
          <div class="form-group">
            <label for="formGroup">Persona de contacto</label>
            <input class="form-control" type="text" name="contacto" placeholder="Ingrese el nombre de la persona de contacto">
          </div>
          <div class="form-group">
            <label for="formGroup">Pagina web</label>
            <input class="form-control" type="text" name="pagina_web" placeholder="www.candyUCAB.com">
          </div>
          <div class="form-group">
            <label for="formGroup">Razon social</label>
            <input class="form-control" type="text" name="razon_social" placeholder="C.A">
          </div>
          <div class="form-group">
            <label for="formGroup">Denominacion comercial</label>
            <input class="form-control" type="text" name="deno_comercial" placeholder="Venta de dulces al mayor">
          </div>
        </div>
        <div class="col-lg-4 mr-auto">
          <div class="form-group">
            <label for="formGroup">Telefono de contacto</label>
            <input class="form-control" type="text" name="telefono" placeholder="02432398765" required>
          </div>
          <div class="form-group">
            <label for="formGroup">Tienda</label>
            <select name= "tienda" id="tienda" class="form-control" required>
              <option value="">Seleccione la tienda de preferencia</option>
              @foreach($tiendas as $tienda)
                <option value="{{$tienda->tie_id}}">{{$tienda->tie_tipo}} {{$tienda->lug_nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="formGroup">Direccion Fiscal</label>
            <select name= "estadoF" id="estadoF" class="form-control mb-2" required>
              <option value="">Seleccione su estado </option>
              @foreach($estados as $estadoF)
                <option value="{{$estadoF->lug_id}}">{{$estadoF->lug_nombre}}</option>
              @endforeach
            </select>
            <select name= "municipioF" id="municipioF" class="form-control mb-2" required>
              <option value="">Seleccione el municipio </option>
              @foreach($municipios as $municipioF)
                <option value="{{$municipioF->lug_id}}">{{$municipioF->lug_nombre}}</option>
              @endforeach
            </select>
            <select name= "parroquiaF" id="parroquiaF" class="form-control" required>
              <option value="">Seleccione la parroquia </option>
              @foreach($parroquias as $parroquiaF)
                <option value="{{$parroquiaF->lug_id}}">{{$parroquiaF->lug_nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="formGroup">Direccion Fiscal Principal</label>
            <select name= "estadoFP" id="estadoFP" class="form-control mb-2" required>
              <option value="">Seleccione su estado </option>
              @foreach($estados as $estadoFP)
                <option value="{{$estadoFP->lug_id}}">{{$estadoFP->lug_nombre}}</option>
              @endforeach
            </select>
            <select name= "municipioFP" id="municipioFP" class="form-control mb-2" required>
              <option value="">Seleccione el municipio </option>
              @foreach($municipios as $municipioFP)
                <option value="{{$municipioFP->lug_id}}">{{$municipioFP->lug_nombre}}</option>
              @endforeach
            </select>
            <select name= "parroquiaFP" id="parroquiaFP" class="form-control" required>
              <option value="">Seleccione la parroquia </option>
              @foreach($parroquias as $parroquiaFP)
                <option value="{{$parroquiaFP->lug_id}}">{{$parroquiaFP->lug_nombre}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="trans text-center">
        {!! Form::submit('Agregar', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
  <script>
    $(function () {
      $('#myTab li:last-child a').tab('show')
    });
  </script>

@endsection