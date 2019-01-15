@extends('layouts.admin')

@section('content')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

  <div class="container">
	<div class="row" >
    	<div class="span12" >
			<div class="widget stacked widget-table action-table" >
				
				<div class="row" style="margin-bottom:2em">
					<div class="span3 side-by-side clearfix offset4" >
						<form action="#" method="get">
							<div class="input-group" >
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
								</th><th id="">Nombre
								</th><th id="">Apellidos
								</th><th id="">Email
								</th><th id="">Anio Fin
								</th><th id="">Date Created
								</th><th id="">Exam Date
								</th><th id="">Status
								</th><th class="td-actions" id="table_action">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($users as $usuario)
							<tr>
								<td>{{$usuario['id']}}</td>
								<td>{{$usuario['nombre']}}</td>
								<td>{{$usuario['apellidos']}}</td>
								<td>{{$usuario['email']}}</td>
								<td>{{$usuario['anio_fin']}}</td>
								<td>2014-01-10</td>
								<td>2014-06-14</td>
								<td>Active</td>
								<td class="td-actions">
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-pencil"></span> Edit
									</a>
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-remove"></span> Remove
									</a>
									<a class="btn btn-default btn-xs" href="javascript:;">
										<span class="glyphicon glyphicon-search"></span> View
									</a>
								</td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
				</div> <!-- /widget-content -->
			
			</div>
	    </div>
	</div>
</div>

@endsection