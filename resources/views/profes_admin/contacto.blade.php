@extends('layouts.profe_admin') 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-3">
      <div style="margin-top:6em;" class="well well-sm  form-horizontal">
        <fieldset>
          <legend class="text-center">@lang('header.contactar')</legend>

          <div class="form-group">
            <label class="col-md-3 control-label" for="name">@lang('header.nombre')</label>
            <div class="col-md-9">
              <input id="nombre" name="nombre" type="text" placeholder="@lang('header.metenombre')" class="form-control" value="{{Auth::user()->nombre}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="asunto">@lang('header.asunto')</label>
            <div class="col-md-9">
              <input id="asunto" name="asunto" type="text" placeholder="@lang('header.meteasunto')" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="message">@lang('header.tumensaje')</label>
            <div class="col-md-9">
              <textarea id="mensaje" name="mensaje" placeholder="@lang('header.metemensaje')" class="form-control" rows="5"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12 text-right">
              <button id="enviarContacto" type="submit" style="background: #b50045; color:white;" class="btn btn-lg">@lang('header.enviar')</button>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
@endsection