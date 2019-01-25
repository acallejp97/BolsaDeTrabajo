@extends('layouts.profe_admin') 
@section('content')

<div class="container">
	<div class="row">
		<div class="span12">
			<div class="widget stacked widget-table action-table">

				<div class="row" style="margin-bottom:2em">
					<div class="span3 side-by-side clearfix offset4">
						<form action="#" method="get">
							<div class="input-group">
								<input class="form-control" id="system-search" name="q" placeholder="Buscar por" required="">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default" data-original-title="" title=""><i class="glyphicon glyphicon-search"></i></button>
								</span>
							</div>
						</form>
					</div>

					<a class="btn btn-default" href="javascript:;">
							<span class="glyphicon glyphicon-globe"></span> Buscar
						</a>

				</div>
				<div class="widget-content">
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

							@foreach($alumno as $alum)

							<tr>

								<td>{{$alum['id']}}</td>
								<td>{{$alum['nombre']}}</td>
								<td>{{$alum['apellidos']}}</td>
								<td>{{$alum['email']}}</td>
								{{--
								<td>{{$alum['anio_fin']}}</td> --}}
								<td>{{$alum['created_at']}}</td>


								<td class="td-actions">
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-pencil"></span> Modificar
									</a>
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-remove"></span> Borrar
									</a>

								</td>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection