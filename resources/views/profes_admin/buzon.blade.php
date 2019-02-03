@extends('layouts.profe_admin') 
@section('content')

<div class="container">
	<div class="">

		<div class="page-header">
			<h3>
				Bandeja de entrada
			</h3>
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
						<th id="">Enviado
						</th>
						<th class="text-center" id="">Descripción
						</th>

						<th class="td-actions" id="table_action"></th>
					</tr>
				</thead>
				<tbody>


					<!--recorre mediante los foreach las tablas y saca lo que se le dice abajo-->
					@foreach ($user_correos['correos'] as $correo) @foreach ($user_correos['user'] as $usuarios) @if($usuarios->rango==1 or $usuarios->rango==2)
					@if($correo['id_remit']==$usuarios['id']) @if($usuarios->rango==1)
					<!--si es profesor que el correo salga de otro color resaltandolo-->
					<tr id="colorfila" style="background:#DC6E97;">
						@else
						<tr id="colorfila">
							@endif

							<div class="media-heading">

								<td><a class="pull-left"> </a>
									<img src='{{url("./perfiles/".$usuarios["imagen"])}}' class="media-object" style="float:left; height: 50px; width:50px">
								</td>
								<td> <a class="m-r-10">{{$correo['asunto']}}</a> </td>

								<td> <span class="badge bg-blue">{{$usuarios['nombre']}}</span></td>
								<td> <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">{{$correo['created_at']}}</time><i class="zmdi zmdi-attachment-alt"></i> </small>									</td>
							</div>
							<td>
								<p class="msg">{{$correo['descripcion']}} </p>
							</td>

							<td class="td-actions">
								<button  class="btn btn-default btn-xs" data-toggle="modal" href="#myModal" data-target="#edit-modal-cust-<?php echo $correo->id;?>" id="<?php echo $correo->id;?>">
										<span class="glyphicon glyphicon-pencil"></span> Abrir
								</button>
								<button class=" borrarCorreo btn btn-default btn-xs " style="background: #b50045; color:white;" value="{{$correo['id']}}">
										<span class="glyphicon glyphicon-remove" ></span> Borrar
								</button>

							</td>
							<!---------------------------------------------------------------------borrarCorreo--------------->

							<!-- The Modal -->
							<div id="edit-modal-cust-<?php echo $correo->id;?>" class="modal"  >
								<div class="modal-dialog">
									<div class="modal-content">
										<!-- Modal Header -->
										<div for="nombre" class="modal-header">
											<h4 id="fid" class="modal-title">{{$usuarios['nombre']}}</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div id="asunto" for="asunto" class="modal-header">
											{{$correo['asunto']}}
										</div>
										<!-- Modal body -->
										<div id="descripcion" for="descripcion" for="descripcion" class="modal-body">
											{{$correo['descripcion']}}
										</div>
										<div class="form-group">
											<label for="comment">Responder:</label>
											<textarea class="form-control" rows="5" id="comment" name="respuesta"></textarea>
										</div>
										<!-- Modal footer -->
										<div class="modal-footer">
											<button id="respuestaEmail" type="button" class="btn btn-danger responderCorreo" data-dismiss="modal" data-toggle="modal" data-target="#modalVacio">Enviar</button>
										</div>
									</div>
								</div>
							</div>
							<!------------------------------------------------------------------------------------>
						</tr>
					</tr>
					@endif @endif @endforeach @endforeach
<!--------------------------------------------------MODAL SI EL CAMPO RESPUESTA ESTÁ RELLENADO-------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------->
								<!-- The Modal -->
								<div id="modalEnviado" class="modal"  >
								<div class="modal-dialog">
									<div class="modal-content">
										<!-- Modal Header -->
										<div for="nombre" class="modal-header">
											<h4 id="fid" class="modal-title">Admin.</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<!-- Modal body -->
										<div class="form-group">
											<h3><center>La respuesta ha sido enviada.</center></h3>
										</div>
									</div>
								</div>
							</div>
<!------------------------------------------------------------------------------------------------------------------------------------->


<!----------------------------------------------------MODAL SI EL CAMPO RESPUESTA ESTÁ VACÍO---------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------->
								<!-- The Modal -->
								<div id="modalVacio" class="modal"  >
								<div class="modal-dialog">
									<div class="modal-content">
										<!-- Modal Header -->
										<div for="nombre" class="modal-header">
											<h4 id="fid" class="modal-title">Admin.</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<!-- Modal body -->
										<div class="form-group">
											<h3><center>Por favor, rellene el campo respuesta.</center></h3>
										</div>
									</div>
								</div>
							</div>
							<!------------------------------------------------------------------------------------>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection