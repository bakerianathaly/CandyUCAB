@extends('layouts.index')
@section('title','Registro')
@section('content')
    <div class="container-fluid">
        <div class="m-2">
           <div class=" ">
             <h2 id="registro-letras">Registro Clientes</h2>
            </div>
        </div>    
    </div>

    <div class="container">
        <ul class="nav nav-tabs nav-justified">
            <li class="registro-rosa nav-item"><a id="registro-natural" class="nav-link active" href="#Naturales" role="tab" data-toggle="tab" aria-selected="true" aria-controls="Naturales">Naturales</a></li>
            <li class="registro-rosa nav-item"><a id="registro-juridic" class="nav-link" href="#Juridicos" role="tab" data-toggle="tab" aria-selected="false" aria-controls="Juridicos">Juridicos</a></li>
        </ul>
    </div>

    <div class="tab-content">
      <!--Registro para clientes naturales -->
      <div class="tab-pane active" id="Naturales" role="tabpanel" aria-labelledby="registro-natural">
        
      {!! Form::open(['route' => 'registro.store']) !!}
        <div class="container-fluid " id="margenSubmenu">
          <div class="row">
              <div class="col-lg-4 ml-auto" id="Naturales">          
                <div class="form-group">
                  <label for="formGroup">Nombre</label>
                  <input class="form-control" type="text" name="nombre" placeholder="Ingresar nombres*">
                </div>
                <div class="form-group">
                  <label for="formGroup">Apellido</label>
                  <input class="form-control" type="text" name="apellido" placeholder="Ingresar apellidos*">
                </div>
                <div class="form-group">
                  <label for="formGroup">Cedula</label>
                  <input class="form-control" type="text" name="cedula" placeholder="Ingresar cedula*">
                </div>
                <div class="form-group">
                  <label for="formGroup">RIF</label>
                  <input class="form-control" type="text" name="RIF" placeholder="Ingresar el RIF*">
                </div>  
                <div class="form-group">
                  <label for="formGroup">Correo Electronico</label>
                  <input class="form-control" type="email" name="correo electronico" placeholder="candyucab@example.com*">
                </div>
            </div>
            <div class="col-lg-4 mr-auto" id="Naturales"> 
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
              <div class="form-group">
                <label for="formGroup">Telefono</label>
                <input class="form-control" type="text" name="telefono" placeholder="Ingresar telefono*">
              </div>      
              <div class="form-group">
                <label for="formGroup">Tienda de Preferencia</label>
                <select name= "estado" id="estado" class="form-control mb-2" required>
                  <option value="">Seleccione la tienda de preferencia </option>
                  @foreach($tiendas as $tienda)
                    <option value="{{$tienda->tie_id}}">{{$tienda->tie_tipo}} {{$tienda->lug_nombre}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-lg-4">
                {!! Form::submit('Registrar cliente', ['class' => 'btn btn-default', 'style'=> 'background-color:#F79BEF']) !!}              
              </div>
            </div>
          </div>
        </div>
  
  
      </div>  
      {!! Form::close() !!}      
      <!--Registro para clientes juridicos -->
      <div class="tab-pane" id="Juridicos" role="tabpanel" aria-labelledby="registro-juridic">
          <div class="container-fluid " id="margenSubmenu">
              <div class="row">
                <div class="col-lg-4 ml-auto" id="Naturales">
                  <form action="">
                    <div class="form-group">
                      <label for="formGroup">Cedula</label>
                      <input class="form-control" type="text" name="cedula" placeholder="Ingresar cedula*">
                    </div>
                    <div class="form-group">
                      <label for="formGroup">RIF</label>
                      <input class="form-control" type="text" name="RIF" placeholder="Ingresar el RIF*">
                    </div>
                    <div class="form-group">
                      <label for="formGroup">Nombre</label>
                      <input class="form-control" type="text" name="nombre" placeholder="Ingresar nombres*">
                    </div>
                    <div class="form-group">
                      <label for="formGroup">Apellido</label>
                      <input class="form-control" type="text" name="apellido" placeholder="Ingresar apellidos*">
                    </div>
                    <div class="form-group">
                      <label for="formGroup">Correo Electronico</label>
                      <input class="form-control" type="email" name="correo electronico" placeholder="Ingresar correo electronico*">
                    </div>
                </form>
                </div>
                <div class="col-lg-4 mr-auto" id="Naturales">
                <form action="">
                  
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
                  <div class="form-group">
                    <label for="formGroup">Telefono</label>
                    <input class="form-control" type="text" name="telefono" placeholder="Ingresar telefono*">
                  </div>
                  <div class="form-group">
                    <label for="formGroup">Clave</label>
                    <input class="form-control" type="password" name="clave" placeholder="Ingresar clave para el usuario*">
                    </div>
              </form>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div id="margenSubmenu">
                    <button type="submit" class="btn btn-default botonRosado">Registrar empresa</button>
                  </div>
                </div>
              </div>
            </div>
      </div>  
    </div>
    <script>
      $(function () {
        $('#myTab li:last-child a').tab('show')
      });
    </script>
@endsection