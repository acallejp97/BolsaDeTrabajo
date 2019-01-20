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
								<th id="table_id">Usuario
								</th>
								<th class="text-center" id="">Asunto
								</th>
								<th id="">Nombre
								</th>
								<th id="">Email
								</th>
								<th class="text-center" id="">Descripción
								</th>
								<th id="">
								</th>
								<th class="td-actions" id="table_action"></th>
							</tr>
						</thead>
						<tbody>


							@foreach ($user_correos['correos'] as $correo) 
							@foreach ($user_correos['user'] as $usuarios) 
							@if($correo['id_remit']==$usuarios['id'])
							<tr>

								<div class="media-heading">

									<td><a href="#" class="pull-left"> </a>
										<img alt="..." src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object" style="float:left; width:50px">
									</td>
									<td> <a href="mail-single.html" class="m-r-10">{{$correo['asunto']}}</a> </td>

									<td> <span class="badge bg-blue">{{$usuarios['nombre']}}</span></td>
									<td> <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>										</td>
								</div>
								<td>
									<p class="msg">{{$correo['descripcion']}} </p>
								</td>

								<td> <button> Abrir</button></td>
				</div>
				</li>
				<td> <button>Borrar</button></td>
			</div>
			@endif @endforeach
			</tr>
			@endforeach

			</table>

		</div>
	</div>
</div>
</section>
@endsection