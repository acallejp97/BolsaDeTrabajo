@extends('layouts.alumno') 
@section('content')
<div class="row">
  <div class="page-header">
    <h3>
      Lista de ofertas
    </h3>
  </div>
  @foreach ($result['ofertas'] as $oferta)
  <div style="margin-left: 14em;" class="text-left col-md-9 ">
    <h3>{{$oferta['titulo']}}</h3>
    <p >{{$oferta['descripcion']}}</p>
    <p> <strong style="color: #b50045;">Puestos vacantes: </strong>{{$oferta['puestos-vacantes']}}</p>

    @foreach ($result['profe_admin'] as $profe_admin) @foreach ($result['user'] as $user) @if($oferta['id_profesor']==$profe_admin['id'])
    @if($user['id']==$profe_admin['id_user'])
    <h6><strong> Profesor que la ha publicado: </strong>{{$user['nombre']}}</h6>
    <button class="btn btn-lg btn-success" id="" style="background: #b50045; float:right;color:white;" type="submit">
      <i class="glyphicon glyphicon-ok-sign"></i>
     Inscribirse
  </button>
    @endif @endif @endforeach @endforeach

  </div>

  @endforeach
</div>
@endsection