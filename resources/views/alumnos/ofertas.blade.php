@extends('layouts.alumno')

@section('content')


    <div class="row col-md-12">
   
		
   <div class="page-header">
     <h3>
       Lista de ofertas
     </h3>
   </div>
   <div class="row">
     <div class="span3 side-by-side clearfix offset4">
       <form action="#" method="get">
         <div class="input-group col-md-9 " style="float:right">
         <br>
           <input class="form-control" id="system-search" name="q" placeholder="Buscar por" required="">
           <span class="input-group-btn">
           <button type="submit" class="btn btn-default" style="background: #b50045; color:white;" data-original-title="" title=""><i class="glyphicon glyphicon-search"></i></button>           </span>
           
         </div>
       </form>
     </div>
@foreach($ofertas as $oferta)

<div class="row col-md-10">
       
        <div class="col-md-10" id="example-1">
          <h3>{{$oferta['titulo']}}</h3>
          <p>{{$oferta['descripcion']}}</p>
          <p>{{$oferta['puestos-vacantes']}}</p>
          <a class="btn btn-primary" v-on:click=""style="background: #b50045; color:white;" href="#">Inscribirse</a>
         
        </div>
      </div>

      <script>
    
      var example1 = new Vue({
          el: '#example-1',
          data: {
            counter: 0
          },
          methods:{
            guardarC():{

            }
          }
})


</script>
      @endforeach
@endsection