@extends('layouts.alumno') 
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-3">
      <div style="margin-top:6em;" class="well well-sm  form-horizontal">
        <fieldset>
          <legend class="text-center">Contactar</legend>

          <div class="form-group">
            <label class="col-md-3 control-label" for="name">Nombre</label>
            <div class="col-md-9">
              <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control" value="{{Auth::user()->nombre}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="asunto">Asunto</label>
            <div class="col-md-9">
              <input id="asunto" name="asunto" type="text" placeholder="Asunto" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="message">Tu mensaje</label>
            <div class="col-md-9">
              <textarea id="mensaje" name="mensaje" placeholder="Introduzca su mensaje" class="form-control" rows="5"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12 text-right">
              <button id="enviarContacto" type="submit" style="background: #b50045; color:white;" class="btn btn-lg">Enviar</button>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
@endsection