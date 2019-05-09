@extends('layouts.'.$result['rango'])
@section('content')

<script language="JavaScript" src="../resources/js/buscar.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


<div class="container">
  <div class="row">
    @if ($result['rango'] == 'profe_admin')
        
    <div class="col-md-3">
      <div class="page-header">
        <h3>
          @lang('header.publicaroferta')
        </h3>
      </div>
      <div class="form-group">
        <label for="titulo" class="control-label">@lang('header.titulo')</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="@lang('header.metenombre')">
      </div>

      <div class="form-group">
        <label for="descripcion" class="control-label">@lang('header.descripcion')</label>
        <textarea type="text" name="descripcion" class="form-control" rows="4" , cols="164" id="descripcion" style="resize:none,"
          placeholder="@lang('header.metedescripcion')"></textarea>

      </div>

      <div class="form-group">
        <label for="id_grado" class="control-label">@lang('header.grado')</label>
        <select class="form-control" id="id_grado">
            @foreach ($result['grados'] as $grado) 
            <option name="id_grado" value="{{$grado['id']}}">{{$grado['nombre']}}</option>
              @endforeach
            </select>
      </div>

      <div class="form-group">
        <label for="id_empresa" class="control-label">@lang('header.empresa')</label>
        <select class="form-control" id="id_empresa">
            @foreach ($result['empresas'] as $empresa) 
            @foreach ($result['ofertas'] as $oferta) 
            @if($empresa['id']==$oferta['id_empresa'])
            
            <option name="id_empresa" value="{{($empresa)['id']}}">{{($empresa)['nombre']}}</option>
            @break
            @endif
            @endforeach
            @endforeach
          </select>
      </div>

      <div class="form-group">
        <label for="puestos" class="control-label">@lang('header.puestos')</label>
        <input type="text" class="form-control" id="puestos" name="puestos" placeholder="@lang('header.metepuestos')">
      </div>

      <div class="form-group">
        @foreach ($result['profe_admin'] as $profe) @if($profe=true)
        <input type="hidden" id="id_profesor" value="{{$profe}}"> @endif @endforeach
      </div>

      <div class="form-group">
        <button type="submit" style="background: #b50045; color:white;" id="insertOferta" class="btn btn-primary">@lang('header.publicar')</button>
      </div>
    </div>

    @endif


    <div class="row col-md-9">
      <div class="page-header">
        <h3>
          @lang('header.listaofertas')
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
      <!--comienzo foreach-->




      <table  id="datos"  style=" border:hidden">
          <thead >
            <tr >
              <th id="table_id">
              </th>
              <th id="">
              </th>
            </tr>
          </thead>
          <tbody style="border:hidden, ">
    
            <div class="row"  >
     @foreach ($result['ofertas'] as $oferta)
     <tr style="border:hidden">
        <td style="background:white, " class="col-md-9">

      <div >
        <h3 class="center">{{$oferta['titulo']}}</h3>
        <p>{{$oferta['descripcion']}}</p>
        <p> <strong style="color: #b50045;">@lang('header.puestos'): </strong>{{$oferta['puestos-vacantes']}}</p>

        @foreach ($result['profe_admin'] as $profe_admin) @foreach ($result['user'] as $user) @if($oferta['id_profesor']==$profe_admin['id'])
        @if($user['id']==$profe_admin['id_user'])
        <h6><strong> @lang('header.profesorpublicado'): </strong>{{$user['nombre']}}</h6>
        @endif @endif @endforeach @endforeach
 </td>
</div>

<<<<<<< HEAD:resources/views/profes_admin/anadirofertas.blade.php
        <td class="td-actions" style="background:white">
=======
        @if ($result['rango']=='alumno')
            
        <button type="submit" class="inscribirse btn btn-danger" style="background:#b50045;" id="inscribirse" value="{{$oferta['id']}}">@lang('header.inscribirse')</button>

        @else
        <td class="td-actions">
>>>>>>> 777dca9c6fb253a6095098b64c200733abd7b4cb:resources/views/common/ofertas.blade.php
          <button class="btn btn-default btn-xs" style="float:right;" data-toggle="modal" href="#myModal" data-target="#edit-modal-cust-<?php echo $oferta->id;?>"
              id="<?php echo $oferta->id;?>">
              <span class="glyphicon glyphicon-pencil"></span> @lang('header.modificar')
            </button>
            <button value="{{$oferta['id']}}" class="borrarOferta btn btn-default btn-xs" style="background: #b50045; float:right; color:white;">
                <span class="glyphicon glyphicon-remove" ></span> @lang('header.borrar')
              </button>
<<<<<<< HEAD:resources/views/profes_admin/anadirofertas.blade.php

        </td>
     
=======
              
            </td>
        @endif
>>>>>>> 777dca9c6fb253a6095098b64c200733abd7b4cb:resources/views/common/ofertas.blade.php
      </div>
    </tr>
  
      <!--modal-->
      <div id="edit-modal-cust-<?php echo $oferta->id;?>" class="modal">
        <div class="modal-dialog">
          <div class="modal-content">

            <button class="close" data-dismiss="modal">&times;</button>
            <div class="modal-header">
              <h5><b>@lang('header.titulo'):</b>
              </h5>
              <input value="{{$oferta['titulo']}}" id="titulo<?php echo $oferta->id;?>" class="form-control">
            </div>

            <div class="modal-header">
              <h5><b> @lang('header.descripcion'):</b>
              </h5>
              <textarea id="descripcion<?php echo $oferta->id;?>" class="form-control">{{$oferta['descripcion']}}</textarea>
            </div>

            <div class="modal-header">
              <h5><b> @lang('header.puestos'):</b>
              </h5>
              <input value="{{$oferta['puestos-vacantes']}}" id="puestos<?php echo $oferta->id;?>" class="form-control">
            </div>

            <div class="modal-footer">
              <button type="button" value="{{$oferta->id}}" class="updateOferta btn btn-danger" data-dismiss="modal">@lang('header.guardar')</button>
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