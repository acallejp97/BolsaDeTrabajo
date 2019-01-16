@extends('layouts.profesor')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>{{Auth::user()->nombre . ' ' . Auth::user()->apellidos}}</h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->


      <div class="text-center">
        <img src="Auth::user()->imagen" class="avatar img-circle img-thumbnail" alt="avatar">

        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>


          <div class="panel panel-default">
            <div class="panel-heading">Registrado desde <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body">{{Auth::user()->created_at}}</div>
          </div>



          <ul class="list-group">
            <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i></li>
            @if(Auth::user()->rango==0)
            <li class="list-group-item text-center"><span class="pull-center"><strong>Has gozao, eres admin</strong></span> </li>
            @else
            @foreach ($nombreDepar as $nimbre)
            <li class="list-group-item text-center"><span class="pull-center"><strong>Departamento</strong><br/>{{$nimbre->nombre}}</span> </li>
            @endforeach
            @endif
          </ul>



        </div><!--/col-3-->
    	<div class="col-sm-9">



        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">

                          <div class="col-xs-11">
                              <label for="nombre"><h4>Nombre</h4></label>
                              <input type="text" class="form-control" value="{{Auth::user()->nombre}}" name="nombre" id="nombre" placeholder="Nombre" title="Introduce tu nombre.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-11">
                            <label for="apellido"><h4>Apellidos</h4></label>
                              <input type="text" class="form-control" name="apellido" value="{{Auth::user()->apellidos}}" id="apellido" placeholder="Apellidos" title="Introduce tus apellidos.">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-11">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" id="email" placeholder="you@email.com" title="Introduce tu email.">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-11">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" value="{{Auth::user()->password}}" name="password" id="password" placeholder="Contraseña" title="Introduce la contraseña.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-11">
                            <label for="password2"><h4>Confirmar Contraseña</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="Repite Contraseña" title="Confirma tu contraseña por favor.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Borrar</button>
                            </div>
                      </div>
              	</form>

              <hr>


@endsection
