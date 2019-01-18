@extends('layouts.profe_admin')
@section('content')


<div class="container">
	<div class="row">
    	<div class="span12">
			<div class="widget stacked widget-table action-table">
				<div class="page-header">
					<h1>
						Lista de Usuarios
					</h1>
				</div>
				<div class="row">
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
					<div class="span1 side-by-side clearfix">
						<a class="btn btn-default" href="javascript:;">
							<span class="glyphicon glyphicon-globe"></span> Buscar
						</a>
					</div>
				</div><br><br>
				<div class="widget-content">
					<table class="table table-striped table-bordered">
                        <thead>
                                <tr style="background: #b50045; color:white;">
    
                                    </th><th id="">Nombre
                                    </th><th id="">Apellidos
                                    </th><th id="">Departamento
                                    </th><th id="">Email
                                    </th><th id="">Registrado
                                 
                                    </th><th class="td-actions" id="table_action">Accion</th>
                                </tr>
						@foreach ($profesores['profe_admin'] as $profesor)
                               @foreach ($profesores['user'] as $usuario)
                               @foreach ($profesores['departamento'] as $departamento)
						</thead>
						<tbody>
                        @if($profesor['id']==$usuario['id'])
                        @if($profesor['id_depar']==$departamento['id'])
							<tr>
							
								<td>{{$usuario['nombre']}}</td>
                                <td>{{$usuario['apellidos']}}</td>
                                <td>{{$departamento['nombre']}}</td>
                                <td>{{$usuario['email']}}</td>
                                <td>{{$usuario['created_at']}}</td>
								
								
								<td class="td-actions">
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-pencil"></span> Modificar
									</a>
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-remove"></span> Borrar
									</a>
									
								</td>
                            </tr>
                            @endif
                            @endif
                            </tbody>
                @endforeach  
                @endforeach  
                @endforeach  
						
					</table>
				</div> <!-- /widget-content -->
			</div>
	    </div>
	</div>
</div>
@endsection