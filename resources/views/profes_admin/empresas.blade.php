@extends('layouts.profe_admin') 
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="page-header">
        <h3>
          Añadir empresas
        </h3>
      </div>

      <div class="form-group">
        <!-- Full Name -->
        <label for="nombre" class="control-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="John Deer">
      </div>

      <div class="form-group">
        <!-- Street 1 -->
        <label for="direccion" class="control-label">Direccion</label>
        <input type="text" name="direccion" class="form-control" rows="4" , cols="164" id="direccion" style="resize:none," placeholder="">

      </div>

      <div class="form-group">
        <!-- Street 1 -->
        <label for="email" class="control-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="">

      </div>

      <div class="form-group">
        <!-- Zip Code-->
        <label for="url" class="control-label">Url</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="">
      </div>

      <div class="form-group">
        <!-- Zip Code-->
        <label for="telefono" class="control-label">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="">
      </div>

      <div class="form-group">
        <!-- Submit Button -->
        <button type="submit" style="background: #b50045; color:white;" id="insertEmpresa" class="btn btn-primary">Publicar</button>
      </div>
    </div>

    <div class="row col-md-9">
      <div class="page-header">
        <h3>
          Lista de Empresas
        </h3>
      </div>

      <div class="row">
        <div class="span3 side-by-side clearfix offset4">
          <form action="#" method="get">
            <div class="input-group col-md-3 " style="float:right">
              <input class="form-control" id="system-search" name="q" placeholder="Buscar por" required="">
              <span class="input-group-btn">
              <button type="submit" class="btn btn-default" style="background: #b50045; color:white;"data-original-title="" title=""><i class="glyphicon glyphicon-search"></i></button>
            </span>

            </div>
          </form>
        </div>
      </div>
      <br> @foreach ($empresas as $empre)

      <div class="col-md-12">
        <h3 class="center">{{$empre['nombre']}}</h3>
        <p>{{$empre['direccion']}}</p>
        <p> <strong> {{$empre['email']}}</strong></p>
        <p>{{$empre['URL']}}</p>
        <p>{{$empre['telefono']}}</p>
        <td class="td-actions">
          <button class="btn btn-default btn-xs" style="float:right;" data-toggle="modal" href="#myModal" data-target="#edit-modal-cust-<?php echo $empre->id;?>" id="<?php echo $empre->id;?>">
              <span class="glyphicon glyphicon-pencil"></span> Modificar
            </button>

          <button value="{{$empre['id']}}" class="borrarEmpresa btn btn-default btn-xs" style="background: #b50045; float:right; color:white;"
            href="javascript:;">
                <span class="glyphicon glyphicon-remove" ></span> Borrar
              </button>
        </td>
      </div>


      <!-- The Modal -->
      <div id="edit-modal-cust-<?php echo $empre->id;?>" class="modal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
              <h5><b>Nombre:</b> </h5>
              <input id="nombre<?php echo $empre->id;?>" value="{{$empre['nombre']}}" class="form-control">

            </div>
            <div class="modal-header">
              <h5><b> Dirección:</b>
              </h5>
              <input id="direccion<?php echo $empre->id;?>" value="{{$empre['direccion']}}" class="form-control">
            </div>
            <!-- Modal body -->
            <div class="modal-header">
              <h5><b> Email:</b>
              </h5>
              <input id="email<?php echo $empre->id;?>" value="{{$empre['email']}}" class="form-control">


            </div>
            <div class="modal-header">
              <h5><b> URL:</b>
              </h5>
              <input value="{{$empre['url']}}" id="url<?php echo $empre->id;?>" class="form-control">

            </div>
            <div class="modal-header">
              <h5><b> Teléfono:</b></h5>
              <input id="telefono<?php echo $empre->id;?>" value="{{$empre['telefono']}}" class="form-control">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" value="{{$empre->id}}" class="updateEmpresa  btn btn-danger" data-dismiss="modal">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>
<script>
  window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};

</script>
@endsection