@extends('layouts.profe_admin') 
@section('content')


<div class="container">
	<div class="row">
		<div class="span12">
			<div class="widget stacked widget-table action-table">
				<div class="page-header">
					<h1>
						Lista de Empresas
					</h1>
				</div>
				
				<div class="widget-content">
					<table class="table table-striped table-bordered">
						<thead>
							<tr style="background: #b50045; color:white;">
								<th id="table_id">empresa ID
								</th>
								<th id="">Nombre
								</th>
								<th id="">Dirección
								</th>
								<th id="">Email
								</th>
								<th id="">URL
								</th>
								<th id="">Telefono
								</th>
							
								<th class="td-actions" id="table_action">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($empresas as $empresa)
							<tr>
								<td>{{$empresa['id']}}</td>
								<td>{{$empresa['nombre']}}</td>
								<td>{{$empresa['direccion']}}</td>
								<td>{{$empresa['email']}}</td>
								<td>{{$empresa['url']}}</td>
								<td>{{$empresa['telefono']}}</td>
								
								
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
				<!-- /widget-content -->
			
			</div>
		</div>
	</div>
</div>
<script>
</script>
@endsection