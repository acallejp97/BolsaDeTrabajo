@extends('layouts.profe_admin')
@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-3">
      <form>
	  <div class="page-header">
      <h3>
        Añadir un profesor
      </h3>
    </div>

        <div class="form-group">
          <!-- Full Name -->
          <label for="nombre" class="control-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
        </div>

        <div class="form-group">
          <!-- Street 1 -->
          <label for="apellidos" class="control-label">Apellidos</label>
		  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="">
		</div>
		<div class="form-group">
          <!-- Street 1 -->
          <label for="email" class="control-label">Email</label>
		  <input type="text" class="form-control" id="email" name="email" placeholder="">
        </div>

        <div class="form-group">
          <!-- State Button -->
          <label for="id_depar" class="control-label">Departamento</label>
          <select class="form-control" id="id_depar" name="id_depar">
            @foreach ($profesores['departamento'] as $departamento) 
            @foreach ($profesores['profe_admin'] as $profe) 
            @if($departamento['id']==$profe['id_depar'])
            
            <option name="id_depar"value="{{($departamento)['id']}}">{{$departamento['nombre']}}</option>
            @break
            @endif
              @endforeach
              @endforeach
            </select>
        </div>
        <div class="form-group">
      
        <input type="hidden" id="rango" value="{{1}}">
       
      </div>
      <div class="form-group">
      
      <input type="hidden" id="password" value="{{'prueba'}}">
     
    </div>
    @foreach ($profesores['user'] as $user)
    @foreach ($profesores['profe_admin'] as $profe)
    @if($profeid =true)
    <div class="form-group">
      
      <input type="hidden" id="id_user" value="{{($profeid]}}">
     

    </div>
    @endif
    @endforeach
    @endforeach
        <div class="form-group">
          <!-- Submit Button -->
          <button type="submit" id="insertProfe"style="background: #b50045; color:white"class="btn btn-primary">Añadir</button>
        </div>

      </form>

    </div>





 
	
	<div class="col-md-9">
		
				<div class="page-header">
					<h3>
						Profesorado
					</h3>
				</div>
				<div class="row">
					<div class="span3 side-by-side clearfix offset4">
						<form action="#" method="get">
							<div class="input-group col-md-3 " style="float:right">
								<input class="form-control" id="system-search" name="q" placeholder="Buscar por" required="">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default"  style="background: #b50045; color:white;"data-original-title="" title=""><i class="glyphicon glyphicon-search"></i></button>
								</span>
								
							</div>
						</form>
					</div>
	
				</div><br>
				<div class="widget-content">
					<table class="table table-striped table-bordered">
                        <thead>
                                <tr style="background: #b50045; color:white;">
    
                                    </th><th id="">Nombre
                                    </th><th id="">Apellidos
                                    </th><th id="">Departamento
                                    </th><th id="">Email
                                    </th><th id="">Registrado
                                 
                                    </th><th class="td-actions" id="table_action">Accion</th>
                                </tr>
						@foreach ($profesores['profe_admin'] as $profesor)
                               @foreach ($profesores['user'] as $usuario)
                               @foreach ($profesores['departamento'] as $departamento)
						</thead>
						<tbody>
                        @if($profesor['id']==$usuario['id'])
                        @if($profesor['id_depar']==$departamento['id'])
							<tr>
							
								                <td>{{$usuario['nombre']}}</td>
                                <td>{{$usuario['apellidos']}}</td>
                                <td>{{$departamento['nombre']}}</td>
                                <td>{{$usuario['email']}}</td>
                                <td>{{$usuario['created_at']}}</td>
								
								
								<td class="td-actions">
									<a style="background: #b50045; color:white;"class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-pencil"></span> Modificar
									</a>
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-remove"></span> Borrar
									</a>
									
								</td>
                            </tr>
                            @endif
                            @endif
                            </tbody>
                @endforeach  
                @endforeach  
                @endforeach  
						
					</table>
				</div> <!-- /widget-content -->
			
	    </div>


</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>
<script>
  window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
</script>
@endsection