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
						@foreach ($profesores['profe_admin'] as $profesor)
                               
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
                            
							<tr>
							
								<td>{{$profesor['id']}}</td>
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
				<div class="row">
					<div class="col-md-12">
						<ul class="pagination pagination-sm pull-left">
							<li class="disabled"><a href="javascript:void(0)">«</a></li>
							<li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="javascript:void(0)">»</a></li>
						</ul>
					</div>
				</div>
			</div>
	    </div>
	</div>
</div>
@endsection