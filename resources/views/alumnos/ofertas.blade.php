@extends('layouts.alumno')

@section('content')

@foreach($oferta as $ofer)

<div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>$ofer->$titulo</h3>
          <p>$ofer->$descripcion</p>
          <p>$ofer->$puestos-vacantes</p>
          <a class="btn btn-primary" href="#">Inscribirse</a>
        </div>
      </div>
      @endforeach
@endsection
