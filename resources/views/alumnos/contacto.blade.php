@extends('layouts.alumno')

@section('content')

<div class="container">
	<div class="row">
      <div class="col-md-8 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="{{URL::to('/')}}/contacto" method="get">
          <fieldset>
            <legend class="text-center">Contactar</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Nombre</label>
              <div class="col-md-9">
                <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control" value="{{Auth::user()->nombre}}">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Asunto</label>
              <div class="col-md-9">
              <input id="email" name="email" type="text" placeholder="Email" class="form-control" value="{{Auth::user()->email}}">
              </div>
            </div>
          <!-- Message body -->
          <div class="form-group">
              <label class="col-md-3 control-label" for="message">Tu mensaje</label>
              <div class="col-md-9">
                <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Introduce tu mensaje aqui, por favor..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" style="background: #b50045; float:right;color:white;"class="btn btn-primary btn-lg">Enviar</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>

@endsection