@extends('layouts.profe_admin') 
@section('content')

<div class="container">
	<div class="row">
		<div class="span12">
			<div class="widget stacked widget-table action-table">
				<div class="widget-content">
					<br/>
					<table class="table table-striped table-bordered">
						<thead>
							<tr style="background: #b50045; color:white;">
								<th id="table_id">Usuario ID
								</th>
								<th id="">Nombre
								</th>
								<th id="">Apellidos
								</th>
								<th id="">Email
								</th>
								<th id="">Año Fin
								</th>
								</th>
								<th id="">Registrado

								</th>
								<th class="td-actions" id="table_action">Accion</th>
							</tr>
						</thead>
						<tbody>

							@foreach($alumnosuser['alumno'] as $alumno)
							@foreach($alumnosuser['user'] as $user)
							@if($alumno['id_user']==$user['id'])
							<tr>

								<td>{{$user['id']}}</td>
								<td>{{$user['nombre']}}</td>
								<td>{{$user['apellidos']}}</td>
								<td>{{$user['email']}}</td>
								<td>{{$alumno['anio_fin']}}</td> 
								<td><?php $fecha = explode(' ', trim(Auth::user()->created_at));?>
									{{$fecha[0]}}</td>


								<td class="td-actions">
										<button class="btn btn-default btn-xs" style="float:right;" data-toggle="modal" href="#myModal" data-target="#edit-modal-cust-<?php echo $user->id;?>" id="<?php echo $user->id;?>">
											<span class="glyphicon glyphicon-pencil"></span> Modificar
									</button>
									<button style="background: #b50045; color:white;"class="btn btn-default btn-xs borrarUsuario" href="javascript:;" value="{{$user['id']}}">
										<span class="glyphicon glyphicon-remove"></span> Borrar
									</button>

								</td>

							</tr>
							  <!--modal-->
      <div id="edit-modal-cust-<?php echo $user->id;?>" class="modal">
			<div class="modal-dialog">
			  <div class="modal-content">
	
				<button class="close" data-dismiss="modal">&times;</button>
				<div class="modal-header">
				  <h5><b>Nombre:</b>
				  </h5>
				  <input value="{{$user['nombre']}}" id="nombre<?php echo $user->id;?>" class="form-control">
				</div>
	
				<div class="modal-header">
				  <h5><b> Apellidos:</b>
				  </h5>
				  <textarea id="apellidos<?php echo $user->id;?>" class="form-control">{{$user['apellidos']}}</textarea>
				</div>
				
				<div class="modal-header">
				  <h5><b> Email:</b>
				  </h5>
				  <input value="{{$user['email']}}" id="email<?php echo $user->id;?>" class="form-control">
				</div>

				<div class="modal-header">
						<h5><b> Año Finalización:</b>
						</h5>
						<input value="{{$alumno['anio_fin']}}" id="anio<?php echo $alumno->id;?>" class="form-control">
					  </div>
	
				<div class="modal-footer">
				  <button type="button" value="{{$user->id}}" class="updateUsuarios btn btn-danger" data-dismiss="modal">Guardar</button>
				</div>
			  </div>
			</div>
		  </div>
							@endif
							@endforeach
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection