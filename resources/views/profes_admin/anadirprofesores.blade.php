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
          <label for="full_name_id" class="control-label">Nombre</label>
          <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
        </div>

        <div class="form-group">
          <!-- Street 1 -->
          <label for="street1_id" class="control-label">Apellidos</label>
		  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
		</div>
		<div class="form-group">
          <!-- Street 1 -->
          <label for="street1_id" class="control-label">Email</label>
		  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
        </div>

        <div class="form-group">
          <!-- State Button -->
          <label for="state_id" class="control-label">Grado</label>
          <select class="form-control" id="state_id">
            @foreach ($profesores['departamento'] as $departamento) 
            @foreach ($profesores['profe_admin'] as $profe) 
            @if($departamento['id']==$profe['id_depar'])
            
            <option value="AL">{{$departamento['nombre']}}</option>
            @break
            @endif
              @endforeach
              @endforeach
            </select>
        </div>
	
        <div class="form-group">
          <!-- Submit Button -->
          <button type="submit" style="background: #b50045; color:white"class="btn btn-primary">Añadir</button>
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
@endsection