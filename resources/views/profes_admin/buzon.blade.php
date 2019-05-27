@extends('layouts.profe_admin') 
@section('content')
<script language="JavaScript" src="../resources/js/buscar.js"></script> 
<div class="container">
	<div class="">

		<div class="page-header">
			<h3>
				@lang('header.bandeja')
			</h3>
		</div>
	
		<div class="span3 side-by-side clearfix offset4">
				<form action="#" method="get">
					<div style="display:inline-flex; float:right;"class="input-group">
							<input class="form-control" id="searchTerm" type="text" onkeyup="doSearch()" />
							<i style="color: #b50045;" class="glyphicon glyphicon-search"></i>
							
						</div>
					</form>
				</div>
		<div class="widget-content">
			<table  id="datos" class="table table-striped table-bordered" style="overflow: auto; max-width: 100%; display: block;">
				<thead>
					<tr style="background: #b50045; color:white;">
						<th id="table_id">@lang('header.usuario')
						</th>
						<th class="text-center" id="">@lang('header.asunto')
						</th>
						<th id="">@lang('header.nombre')
						</th>
						<th id="">@lang('header.enviado')
						</th>
						<th class="text-center" id="">@lang('header.descripcion')
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
						@else @endif

						<div class="media-heading">

							<td><a class="pull-left"> </a>
								<img src='{{url("./fotosPerfil/".$usuarios["imagen"])}}' class="media-object" style="float:left; height: 50px; width:50px">
							</td>
							<td> <a class="m-r-10">{{$correo['asunto']}}</a> </td>

							<td> <span class="badge bg-blue">{{$usuarios['nombre']}}</span></td>
							<td> <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">{{$correo['created_at']}}</time><i class="zmdi zmdi-attachment-alt"></i> </small>								</td>
						</div>
						<td>
							<p class="msg">{{$correo['descripcion']}} </p>
						</td>

						<td class="td-actions">
							<button class="btn btn-default btn-xs" data-toggle="modal" href="#myModal" data-target="#edit-modal-cust-<?php echo $correo->id;?>"
							 id="<?php echo $correo->id;?>">
										<span class="glyphicon glyphicon-pencil"></span> @lang('header.abrir')
								</button>
							<button data-toggle="modal" data-target="#delete-modal-cust-<?php echo $correo->id;?>" class="  btn btn-default btn-xs " style="background: #b50045; color:white;">
										<span class="glyphicon glyphicon-remove" ></span> @lang('header.borrar')
								</button>

						</td>
						<!---------------------------------------------------------------------borrarCorreo--------------->
						<div id="delete-modal-cust-<?php echo $correo->id;?>" class="modal" >
							<div class="modal-dialog">
									<div class="modal-content">
											<center> <h1 style="color: #b50045;">@lang('header.atencion')</h1></center>
							  <h2>@lang('header.seguro')</h2>
							<center><img style="width:400px" src='deletemensajepng.png' ></center>
							<center><button class=" borrarCorreo btn btn-default btn-xl" style="background: #b50045; color:white;" value="{{$correo['id']}}">
								  <span class="glyphicon glyphicon-remove" ></span> @lang('header.borrar')
</button></center>
							  <h3>@lang('header.definitivo')</h3>
						
							<div class='panel__flaps'>
							  <div class='flap outer flap--left'></div>

							  <div class='flap outer flap--right'></div>
							</div>
						  </div>
						</div>	</div>
						  

						<!-- The Modal -->
						<div id="edit-modal-cust-<?php echo $correo->id;?>" class="modal">
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
										<label style="margin-left:3%;" class="mr-5"for="comment">@lang('header.responder'):</label>
										
										<textarea type="text" name="respuesta" class="form-control" rows="4" , cols="164" id="respuesta<?php echo $correo->id?>"
										 style="resize:none; margin-right:2%; margin-left:3%; width:94%;" placeholder="@lang('header.metemensaje')"></textarea>
									</div>
									<!-- Modal footer -->
									<div class="modal-footer">
										<button class="respuestaEmail" type="button" value="{{$correo['id']}}" class="btn btn-danger responderCorreo" data-dismiss="modal"
										 data-toggle="modal" data-target="#modalEnviado">Enviar</button>
									</div>
								
								</div>
							</div>
						</div>
					</tr>
					@endif @endif @endforeach @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
