@extends('layouts.profe_admin')
@section('content')
@foreach($ofertas as $oferta)
<div class="row">
  <div class="col-md-7">
    <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
  </div>
  <div class="col-md-5">
    <h3>{{$oferta['titulo']}}</h3>
    <p>{{$oferta['descripcion']}}</p>
    <p><b> Puestos Vacantes : </b>{{$oferta['puestos-vacantes']}}</p>
    <a class="btn btn-primary" href="#">Inscribirse</a>
  </div>
</div>
@endforeach
@endsection