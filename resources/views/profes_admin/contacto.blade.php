@extends('layouts.profe_admin') 
@section('content')
<script>
  var example2 = new Vue({
  el: '.col-md-12 text-right',
  data: {
    name: 'Vue.js'
  },
  // define métodos dentro del objeto `methods`
  methods: {
    greet: function (event) {
      // `this` dentro de los métodos apunta a la instancia de Vue
      alert('Hello ' + this.name + '!')
      // `event` es el evento nativo del DOM
      if (event) {
        alert(event.target.tagName)
      }
    }
  }
})
</script>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="well well-sm">
        <form class="form-horizontal" action="{{URL::to('/')}}/contacto" method="get">
          <fieldset>
            <legend class="text-center">Contactar</legend>

            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Nombre</label>
              <div class="col-md-9">
                <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control" value="{{Auth::user()->nombre}}">@{{ $nombre }}
              </div>
            </div>

            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Asunto</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Email" class="form-control" value="{{Auth::user()->email}}">@{{ $email }}
              </div>
            </div>
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Tu mensaje</label>
              <div class="col-md-9">
                <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Introduce tu mensaje aquí, por favor..." rows="5">@{{ $mensaje }}</textarea>
              </div>
            </div>

            <!-- Form actions -->
            <div class="form-group">
              <div class="enviarCorreo">
                <div id="crud" class="col-md-12 text-right">
                  <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </div>
              </div>
            </div>
          </fieldset>
        </form>
      </div>  
    </div>
@endsection