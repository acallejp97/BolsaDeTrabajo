@extends('layouts.profe_admin') 
@section('content')
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <fieldset>
            <legend class="text-center">Contactar</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Nombre</label>
              <div class="col-md-9">
                <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control" value="{{Auth::user()->nombre}}">
              </div>
            </div>
            <br><br>
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Asunto</label>
              <div class="col-md-9">
              <input id="email" name="email" type="text" placeholder="Email" class="form-control" value="{{Auth::user()->email}}">
              </div>
            </div>
            <br><br>
          <!-- Message body -->
          <div class="form-group">
              <label class="col-md-3 control-label" for="message">Tu mensaje</label>
              <div class="col-md-9">
                <textarea id="mensaje" name="mensaje" placeholder="Introduce tu mensaje aqui, por favor..." class="form-control" rows="5"></textarea>
              </div>
            </div>
            <br><br>
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                  <br>
                <button id="enviarContacto" type="submit" class="btn btn-lg" style="background: #b50045; float:right; color: white;" >Enviar</button>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
@endsection