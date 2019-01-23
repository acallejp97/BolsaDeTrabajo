@extends('layouts.alumno')

@section('content')



<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Curriculum de {{Auth::user()->nombre}}</h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

     <form method='post' action='{{url("fotocv")}}' enctype='multipart/form-data'>
	{{csrf_field()}}
	<div class='form-group'>

        <img src='{{url("./perfiles/".Auth::user()->imagen)}}' class='img-responsive' style=' height:200px; width: 200px;' />
       
		<input style="color: transparent; margin-top: 3em;" type="file" name="image" />
		<div class='text-danger'>{{$errors->first('image')}}</div>
	</div>
	<button type='submit' style="background: #b50045; color:white;"class='btn btn-primary'>Actualizar imagen de perfil</button>
</form>
      </hr><br>

<!--                
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
           -->
          
          <ul class="list-group">
            <li class="list-group-item text-muted">IDIOMAS<i class="fa fa-dashboard fa-1x"></i></li>

                        <textarea class="form-control counted" name="idiomas"  placeholder="idiomas" rows="5" style="margin-bottom:10px;">{{$curriculum['idiomas']}}</textarea>          </ul> 
               
          
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
              </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-4">
                              <label for="nombre"><h4>Nombre</h4></label>
                              <input type="text" class="form-control" name="nombre" id="nombre" value="{{Auth::user()->nombre}}" placeholder="Nombre" title="Introduce tu nombre.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-4">
                            <label for="apellido"><h4>Apellido</h4></label>
                              <input type="text" class="form-control" name="apellido" value="{{Auth::user()->apellidos}}"id="apellido" placeholder="Apellido" title="Introduce tu apellido.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-4">
                              <label for="teléfono"><h4>Telefono</h4></label>
                              <input type="text" class="form-control" name="teléfono" value="{{$curriculum['telefono']}}" id="teléfono" placeholder="Introduce Teléfono" title="Introduce tu telefono.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-12">

                              
                              <label for="direccion"><h4>Dirección</h4></label>
                              
                           
                              <input type="text" class="form-control" value="{{$curriculum['direccion']}}" name="direccion" id="direccion" placeholder="Introduce dirección" title="Introduce tu dirección.">
                       
                                              </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-5">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" value="{{Auth::user()->email}}"id="email" placeholder="you@email.com" title="Introduce tu correo electrónico.">
                          </div>
                      </div>
                   
                         
                      <div class="panel-body">                
                    
                    <label for="formacion"><h4>Formación Académica</h4></label>
                        <textarea class="form-control counted" name="academica"  placeholder="Formación academica" rows="5" style="margin-bottom:10px;">{{$curriculum['competencias']}}</textarea>
                    
                </div>
                      <div class="panel-body">                
                   
                    <label for="experiencia"><h4>Experiencia</h4></label>
                        <textarea class="form-control counted" name="experiencia" placeholder="Experiencia Laboral" rows="5" style="margin-bottom:10px;">{{$curriculum['experiencia']}}</textarea>
                  
                </div>
                <div class="panel-body">                
                    <form accept-charset="UTF-8" action="" method="POST">
                    <label for="otros"><h4>Otros datos</h4></label>
                        <textarea class="form-control counted" name="message"  placeholder="Otros datos" rows="5" style="margin-bottom:10px;">{{$curriculum['otros_datos']}}</textarea>
                    </form>
                </div>
                      <div class="form-group">
                          
                 
                    
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" style="background:#D8BFD8; float:right; color:black;"href="javascript:;">
										<span class="glyphicon glyphicon-remove" ></span> Borrar
									</button>
                              	<button class="btn btn-lg btn-success" style="background: #b50045; float:right;color:white;"type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                                 
                            </div>
                      </div>
                      <div class="form-group">
                          
              
              	</form>
              
              <hr>
              
             
          </div><!--/tab-content-->


        </div><!--/col-9-->
    </div><!--/row-->
                                     
@endsection
