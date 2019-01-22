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
				<div class="row">
					<div class="span3 side-by-side clearfix offset4">
				
		<div id="app" v-cloak>
			<input v-model="term" type="search">
			<button @click="search">Search</button>
			<p/>

			<div v-for="result in results" class="result">
				<img :src="result.artworkUrl100">
				@foreach ($empresas as $empresa)
					
								{{$empresa['nombre']}}
								

								
							@endforeach
			
				<br clear="left">
			</div>

			<div v-if="noexmpresas">
				Sorry, but no exmpresas were found. I blame Apple.
			</div>

			<div v-if="searching">
				<i>Searching...</i>
			</div>

		</div>

		<script src="https://unpkg.com/vue"></script>
		<script src="app.js"></script>
					</div>
				
				</div><br><br>
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
Vue.filter('formatDate', function(d) {
	if(!window.Intl) return d;
	return new Intl.DateTimeFormat('en-US').format(new Date(d));
}); 

const app = new Vue({
	el:'#app',
	data:{
		term:'',
		results:[],
		noResults:false,
		searching:false
	},
	methods:{
		search:function() {
			this.searching = true;
			fetch(`http://localhost/phpmyadmin/sql.php?server=1&db=TxJobs&table=empresas&pos=0`)
			.then(res => res.json())
			.then(res => {
				this.searching = false;
				this.results = res.results;
				this.noResults = this.results.length === 0;
			});
		}
	}
});</script>
@endsection