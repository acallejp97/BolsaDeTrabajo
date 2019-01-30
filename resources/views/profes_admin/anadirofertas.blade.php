@extends('layouts.profe_admin') 
@section('content')

<div class="container">
  <div class="row">
    <h6>Bienvenid@ {{Auth::user()->nombre}}</h6>
    <div class="col-md-3">
      <div class="page-header">
        <h3>
          Publicar una oferta
        </h3>
      </div>

      <div class="form-group">
        <!-- Full Name -->
        <label for="titulo" class="control-label">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="John Deer">
      </div>

      <div class="form-group">
        <!-- Street 1 -->
        <label for="descripcion" class="control-label">Descriptción</label>
        <textarea type="text" name="descripcion" class="form-control" rows="4" , cols="164" id="descripcion" style="resize:none,"
          placeholder="Street address, P.O. box, company name, c/o"></textarea>

      </div>

      <div class="form-group">
        <!-- State Button -->
        <label for="id_grado" class="control-label">Grado</label>
        <select class="form-control" id="id_grado">
            @foreach ($result['grados'] as $grado) 
            @foreach ($result['ofertas'] as $oferta) 
            @if($grado['id']==$oferta['id_grado'])
            
            <option name="id_grado"value="{{$grado['id']}}">{{$grado['nombre']}}</option>
            @break
            @endif
              @endforeach
              @endforeach
            </select>
      </div>

      <div class="form-group">
        <!-- State Button -->
        <label for="id_empresa" class="control-label">Empresa</label>
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
        <!-- Zip Code-->
        <label for="puestos" class="control-label">Puestos Vacantes</label>
        <input type="text" class="form-control" id="puestos" name="puestos" placeholder="">
      </div>

      <div class="form-group">
        @foreach ($result['profesor'] as $profe)
      	@if($profe=true)
        <input type="hidden" id="id_profesor" value="{{$profe}}">
        @endif
         @endforeach
      </div>

      <div class="form-group">
        <!-- Submit Button -->
        <button type="submit" style="background: #b50045; color:white;" id="insertOferta" class="btn btn-primary">Publicar</button>
      </div>
    </div>

    <div class="row col-md-9">
      <div class="page-header">
        <h3>
          Lista de ofertas
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

      </div><br> @foreach ($result['ofertas'] as $oferta)
      
      <div class="col-md-12">
        <h3 class="center">{{$oferta['titulo']}}</h3>
        <p>{{$oferta['descripcion']}}</p>
        <p> <strong style="color: #b50045;">Puestos vacantes: </strong>{{$oferta['puestos-vacantes']}}</p>
        
        @foreach ($result['profe_admin'] as $profe_admin)
        @foreach ($result['user'] as $user)
        @if($oferta['id_profesor']==$profe_admin['id'])
        @if($user['id']==$profe_admin['id_user'])
        <h6><strong> Profesor que la ha publicado: </strong>{{$user['nombre']}}</h6>
        @endif
        @endif

        @endforeach
        @endforeach
         
        
        <td class="td-actions">
          <button class="btn btn-default btn-xs" style="float:right;" data-toggle="modal" href="#myModal" data-target="#edit-modal-cust-<?php echo $oferta->id;?>" id="<?php echo $oferta->id;?>">
              <span class="glyphicon glyphicon-pencil"></span> Modificar
            </button>
            <button value="{{$oferta['id']}}" class="borrarOferta btn btn-default btn-xs"  style="background: #b50045; float:right; color:white;">
                <span class="glyphicon glyphicon-remove" ></span> Borrar
              </button>
              
            </td>
    </div>
          
  
<script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>
<script>
  window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
</script>



<!-- The Modal -->
<div id="edit-modal-cust-<?php echo $oferta->id;?>" class="modal"  >
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div  class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5><b>Título:</b> <input    value="{{$oferta['titulo']}}"  class="form-control"> <h5>
  
        </div>
        <div  class="modal-header">
        <h5><b> Descripción:</b><textarea id="direccion" for="direccion" class="form-control">{{$oferta['descripcion']}}</textarea><h5>
        </div>
        <!-- Modal body -->
        <div  class="modal-header">
        <h5><b> Puestos Vacantes:</b><input id="email" value="{{$oferta['puestos-vacantes']}}" for="email" for="descripcion" class="form-control"><h5>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Guardar</button>
          </div>
        </div>
</div>
</div>


  @endforeach
</div>
</div>
</div>



@endsection