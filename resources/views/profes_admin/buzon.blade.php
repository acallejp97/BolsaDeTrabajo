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
								<button class="btn btn-default btn-xs borrarCorreo" style="background: #b50045; color:white;" value="{{$correo['id']}}">
										<span class="glyphicon glyphicon-remove" ></span> Borrar
								</button>

							</td>
							<!------------------------------------------------------------------------------------>

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
											<textarea class="form-control" rows="5" id="comment"></textarea>
										</div>
										<!-- Modal footer -->
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Enviar</button>
										</div>
									</div>
								</div>
							</div>
							<!------------------------------------------------------------------------------------>


						</tr>
					</tr>
					@endif @endif @endforeach @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
</script>
@endsection