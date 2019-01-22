@extends('layouts.profe_admin') 
@section('content')

<div class="container">
  <div class="row">
  <h6>Bienvenid@ {{Auth::user()->nombre}}</h6>
    <div class="col-md-3">
      <form>
      <div class="page-header">
      <h3>
       Publicar una oferta
      </h3>
    </div>

        <div class="form-group">
          <!-- Full Name -->
          <label for="full_name_id" class="control-label">Titulo</label>
          <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
        </div>

        <div class="form-group">
          <!-- Street 1 -->
          <label for="street1_id" class="control-label">Descriptción</label>
          <textarea type="text" class="form-control" rows="4" , cols="164" id="street1_id" name="street1" style="resize:none," placeholder="Street address, P.O. box, company name, c/o"></textarea>

        </div>



        <div class="form-group">
          <!-- State Button -->
          <label for="state_id" class="control-label">Grado</label>
          <select class="form-control" id="state_id">
            @foreach ($result['grados'] as $grado) 
            @foreach ($result['ofertas'] as $oferta) 
            @if($grado['id']==$oferta['id_grado'])
            
            <option value="AL">{{$grado['nombre']}}</option>
            @break
            @endif
              @endforeach
              @endforeach
            </select>
        </div>


        <div class="form-group">
          <!-- State Button -->
          <label for="state_id" class="control-label">Empresa</label>
          <select class="form-control" id="state_id">
            @foreach ($result['empresas'] as $empresa) 
            @foreach ($result['ofertas'] as $oferta) 
            @if($empresa['id']==$oferta['id_empresa'])
            
            <option value="AL">{{($empresa)['nombre']}}</option>
            @break
            @endif
            @endforeach
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <!-- Zip Code-->
          <label for="zip_id" class="control-label">Puestos Vacantes</label>
          <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
        </div>

        <div class="form-group">
          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary">Publicar</button>
        </div>

      </form>

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

    </div><br>
      @foreach ($result['ofertas'] as $oferta)
      <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="" style="width:30%; float:left;">
      <div class="col-md-7">
        <h3>{{$oferta['titulo']}}</h3>
        <p>{{$oferta['descripcion']}}</p>
        <p>{{$oferta['puestos-vacantes']}}</p>
        <td class="td-actions">
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-pencil"></span> Modificar
									</a>
									<a class="btn btn-default btn-xs" style="background: #b50045; color:white;"href="javascript:;">
										<span class="glyphicon glyphicon-remove" ></span> Borrar
									</a>
									
					</td>
      </div>

      @endforeach
    </div>
  </div>
</div>
@endsection