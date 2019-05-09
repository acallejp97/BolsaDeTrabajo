@extends('layouts.profe_admin') 
@section('content')
<script language="JavaScript" src="../resources/js/buscar.js"></script> 
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="page-header">
        <h3>
          @lang('header.añadirempresas')
        </h3>
      </div>
  

      <div class="form-group">
        <!-- Full Name -->
        <label for="nombre" class="control-label">@lang('header.nombre')</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="@lang('header.metenombre')">
      </div>

      <div class="form-group">
        <!-- Street 1 -->
        <label for="direccion" class="control-label">@lang('header.direccion')</label>
        <input type="text" name="direccion" class="form-control" rows="4" , cols="164" id="direccion" style="resize:none," placeholder="@lang('header.meteapellidos')">

      </div>

      <div class="form-group">
        <!-- Street 1 -->
        <label for="email" class="control-label">@lang('header.email')</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="@lang('header.meteemail')">

      </div>

      <div class="form-group">
        <!-- Zip Code-->
        <label for="url" class="control-label">@lang('header.url')</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="@lang('header.meteurl')">
      </div>

      <div class="form-group">
        <!-- Zip Code-->
        <label for="telefono" class="control-label">@lang('header.telefono')</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="@lang('header.metetelefono')">
      </div>

      <div class="form-group">
        <!-- Submit Button -->
        <button type="submit" style="background: #b50045; color:white;" id="insertEmpresa" class="btn btn-primary">@lang('header.publicar')</button>
      </div>
    </div>


        
    <div class="row col-md-9">
      <div class="page-header">
        <h3>
          @lang('header.listaempresas')
        </h3>
      </div>
  <!-- buscador -->
  <div class="span3 side-by-side clearfix offset4">
    <form action="#" method="get">
      <div style="display:inline-flex; float:right;"class="input-group">
          <input class="form-control" id="searchTerm" type="text" onkeyup="doSearch()" />
          <i style="color: #b50045;" class="glyphicon glyphicon-search"></i>
          
        </div>
      </form>
    </div>


    <table  id="datos" class="table table-striped table-bordered" style=" border:hidden">
      <thead style="width:100%;">
        <tr >
          <th id="table_id">
          </th>
          <th id="">
          </th>
        </tr>
      </thead>
      <tbody style="border:hidden, ">

        <div class="row"  >
          @foreach ($empresas as $empre)
            <tr style="border:hidden">
          <td style="background:white">

      <div class="col-md-12" >
        <h3 class="center">{{$empre['nombre']}}</h3>
        <p>{{$empre['direccion']}}</p>
        <p> <strong> {{$empre['email']}}</strong></p>
        <p>{{$empre['URL']}}</p>
        <p>{{$empre['telefono']}}</p>
      </td>
        <td class="td-actions" style="border:hidden; background:white">
          <button class="btn btn-default btn-xs" style="float:right;" data-toggle="modal" href="#myModal" data-target="#edit-modal-cust-<?php echo $empre->id;?>" id="<?php echo $empre->id;?>">
              <span class="glyphicon glyphicon-pencil"></span> @lang('header.modificar')
            </button>

          <button value="{{$empre['id']}}" class="borrarEmpresa btn btn-default btn-xs" style="background: #b50045; float:right; color:white;"
            href="javascript:;">
                <span class="glyphicon glyphicon-remove" ></span> @lang('header.borrar')
              </button>
        </td>
      
 
      </div>
    </tr>
  

      <!-- The Modal -->
      <div id="edit-modal-cust-<?php echo $empre->id;?>" class="modal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
              <h5><b>@lang('header.nombre'):</b> </h5>
              <input id="nombre<?php echo $empre->id;?>" value="{{$empre['nombre']}}" class="form-control">

            </div>
            <div class="modal-header">
              <h5><b> @lang('header.direccion'):</b>
              </h5>
              <input id="direccion<?php echo $empre->id;?>" value="{{$empre['direccion']}}" class="form-control">
            </div>
            <!-- Modal body -->
            <div class="modal-header">
              <h5><b> @lang('header.email'):</b>
              </h5>
              <input id="email<?php echo $empre->id;?>" value="{{$empre['email']}}" class="form-control">


            </div>
            <div class="modal-header">
              <h5><b> @lang('header.url'):</b>
              </h5>
              <input value="{{$empre['url']}}" id="url<?php echo $empre->id;?>" class="form-control">

            </div>
            <div class="modal-header">
              <h5><b> @lang('header.telefono'):</b></h5>
              <input id="telefono<?php echo $empre->id;?>" value="{{$empre['telefono']}}" class="form-control">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" value="{{$empre->id}}" class="updateEmpresa  btn btn-danger" data-dismiss="modal">@lang('header.guardar')</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>
<script>
  window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};

</script>
@endsection