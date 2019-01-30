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
								<td>{{$user['created_at']}}</td>


								<td class="td-actions">
									<a class="btn btn-default btn-xs" style="background: #b50045; color:white;"href="javascript:;">
										<span class="glyphicon glyphicon-pencil" ></span> Modificar
									</a>
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-remove"></span> Borrar
									</a>

								</td>

							</tr>
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