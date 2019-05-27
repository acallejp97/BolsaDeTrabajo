@extends('layouts.profe_admin')
@section('content')
<script language="JavaScript" src="../resources/js/buscar.js"></script>
<div class="container">
	<div class="row col-md-12">
		<div class="page-header">
			<h3>
				@lang('header.listausuarios')
			</h3>
		</div>


		<div class="span3 side-by-side clearfix offset4">
			<form action="#" method="get">
				<div style="display:inline-flex; float:right;" class="input-group">
					<input class="form-control" id="searchTerm" type="text" onkeyup="doSearch()" />
					<i @if(Auth::user()->rango==0) style="background: #b50045;"
						@elseif(Auth::user()->rango==1) style="background: blue;"
						@else style="background: green;"
						@endif class="glyphicon glyphicon-search"></i>

				</div>
			</form>
		</div>


		<div class="span12">
			<div class="widget stacked widget-table action-table">
				<div class="widget-content">
					<br />
					<table id="datos" class="table table-striped table-bordered"
						style="overflow: auto; max-width: 100%;">
						<thead style="width:100%;">
							<tr @if(Auth::user()->rango==0) style="background: #b50045;color:white;"
								@elseif(Auth::user()->rango==1) style="background: blue; color:white;"
								@else style="background: green; color:white;"
								@endif>

								<th id="table_id">ID
								</th>
								<th id="">@lang('header.nombre')
								</th>
								<th id="">@lang('header.apellidos')
								</th>
								<th id="">@lang('header.email')
								</th>
								<th id="">@lang('header.añofinalu')
								</th>
								</th>
								<th id="">@lang('header.registrado')

								</th>
								<th class="td-actions" id="table_action">@lang('header.accion')</th>
							</tr>
						</thead>
						<tbody>

							@foreach($alumnosuser['alumno'] as $alumno) @foreach($alumnosuser['user'] as $user)
							@if($alumno['id_user']==$user['id'])
							<tr>

								<td>{{$user['id']}}</td>
								<td>{{$user['nombre']}}</td>
								<td>{{$user['apellidos']}}</td>
								<td>{{$user['email']}}</td>
								<td>{{$alumno['anio_fin']}}</td>
								<td>
									<?php $fecha = explode(' ', trim($user['created_at']));?> {{$fecha[0]}}
								</td>


								<td class="td-actions">
									<button class="btn btn-default btn-xs" style="float:right;" data-toggle="modal"
										href="#myModal" data-target="#edit-modal-cust-<?php echo $user->id;?>"
										id="<?php echo $user->id;?>">
										<span class="glyphicon glyphicon-pencil"></span> @lang('header.modificar')
									</button>
									<button data-toggle="modal" data-target="#delete-modal-cust-<?php echo $user->id;?>"
										class="  btn btn-default btn-xs "  @if(Auth::user()->rango==0) style="background: #b50045;color:white;"
										@elseif(Auth::user()->rango==1) style="background: blue; color:white;"
										@else style="background: green; color:white;"
										@endif>
										<span class="glyphicon glyphicon-remove"></span> @lang('header.borrar')
									</button>

								</td>
							</tr>



							</td>
							<!---------------------------------------------------------------------borrarCorreo--------------->
							<div id="delete-modal-cust-<?php echo $user->id;?>" class="modal">
								<div class="modal-dialog">
									<div class="modal-content">
										<center>
											<h1 style="color: #b50045;">@lang('header.atencion')</h1>
										</center>
										<h2>@lang('header.seguro')</h2>
										<center><img style="width:400px" src='deletemensajepng.png'></center>
										<center><button class=" borrarUsuario btn btn-default btn-xl"
											@if(Auth::user()->rango==0) style="background: #b50045;color:white;"
											@elseif(Auth::user()->rango==1) style="background: blue; color:white;"
											@else style="background: green; color:white;"
											@endif value="{{$user['id']}}">
												<span class="glyphicon glyphicon-remove"></span> @lang('header.borrar')
											</button></center>
										<h3>@lang('header.definitivo')</h3>

										<div class='panel__flaps'>
											<div class='flap outer flap--left'></div>

											<div class='flap outer flap--right'></div>
										</div>
									</div>
								</div>
							</div>

							<!--modal-->
							<div id="edit-modal-cust-<?php echo $user->id;?>" class="modal">
								<div class="modal-dialog">
									<div class="modal-content">

										<button class="close" data-dismiss="modal">&times;</button>
										<div class="modal-header">
											<h5><b>@lang('header.nombre'):</b>
											</h5>
											<input value="{{$user['nombre']}}" id="nombre<?php echo $user->id;?>"
												class="form-control">
										</div>

										<div class="modal-header">
											<h5><b> @lang('header.apellidos'):</b>
											</h5>
											<textarea id="apellidos<?php echo $user->id;?>"
												class="form-control">{{$user['apellidos']}}</textarea>
										</div>

										<div class="modal-header">
											<h5><b> @lang('header.email'):</b>
											</h5>
											<input value="{{$user['email']}}" id="email<?php echo $user->id;?>"
												class="form-control">
										</div>

										<div class="modal-header">
											<h5><b> @lang('header.añofinalu'):</b>
											</h5>
											<input value="{{$alumno['anio_fin']}}" id="anio<?php echo $user->id;?>"
												class="form-control">
										</div>

										<div class="modal-footer">
											<button type="button" value="{{$user->id}}"
												class="updateUsuarios btn btn-danger"
												data-dismiss="modal">@lang('header.guardar')</button>
										</div>
									</div>
								</div>
							</div>
							@endif @endforeach @endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection