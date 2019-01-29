@extends('layouts.profe_admin') 
@section('content')

<div class="container">
<div class="">
		
		<div class="page-header">
			<h3>
				Bandeja de entrada
			</h3>
		</div>
		<div class="row">
			<div class="span3 side-by-side clearfix offset4">
				<form action="#" method="get">
					<div class="input-group col-md-3 " style="float:right">
						<input class="form-control" id="system-search" name="q" placeholder="Buscar por" required="">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default" style="background: #b50045; color:white;" data-original-title="" title=""><i class="glyphicon glyphicon-search"></i></button>
						</span>
						
					</div>
				</form>
			</div>

		</div><br>
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
								<th id="">Fecha
								</th>
								<th class="text-center" id="">Descripción
								</th>
								
								<th class="td-actions" id="table_action"></th>
							</tr>
						</thead>
						<tbody>

			
			<!--recorre mediante los foreach las tablas y saca lo que se le dice abajo-->
							@foreach ($user_correos['correos'] as $correo) 
							@foreach ($user_correos['user'] as $usuarios) 
							
							@if($usuarios->rango==1 or $usuarios->rango==2)
							@if($correo['id_remit']==$usuarios['id'])
							@if($usuarios->rango==1)
							<!--si es profesor que el correo salga de otro colokmmmr resaltandolo-->
							<tr id="colorfila" style="background:#DC6E97;">
							@else 
							<tr id="colorfila" >
@endif
					
					<div class="media-heading">

									<td><a href="#" class="pull-left"> </a>
									<img src='{{url("./perfiles/".$usuarios["imagen"])}}' class="media-object" style="float:left; height: 50px; width:50px">
									</td>
									<td> <a href="mail-single.html" class="m-r-10">{{$correo['asunto']}}</a> </td>

									<td> <span class="badge bg-blue">{{$usuarios['nombre']}}</span></td>
									<td> <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>										</td>
								</div>
								<td>
									<p class="msg">{{$correo['descripcion']}} </p>
								</td>

						   <td class="td-actions">
									<button class="btn btn-default btn-xs abrirMensaje"  href="javascript:;">
										<span class="glyphicon glyphicon-pencil"></span> Abrir
									</button>
									<button class="btn btn-default btn-xs deleteMensaje" style="background: #b50045; color:white;"href="javascript:;" id="deleteMensaje">
										<span class="glyphicon glyphicon-remove" ></span> Borrar
									</button>
									
					</td>
			</div>
			
			</div>
			@endif
			@endif @endforeach
			</tr>
			@endforeach
			
			</table>

		</div>
	</div>
</div>
</section>
@endsection