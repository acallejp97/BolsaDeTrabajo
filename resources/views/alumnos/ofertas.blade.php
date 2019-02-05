@extends('layouts.alumno') 
@section('content')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<div class="row">
  <div   class="page-header text-left col-md-9 ">
    <h3>
      @lang('header.listaofertas')
    </h3>
  </div>
  @foreach ($result['ofertas'] as $oferta)
  <div  class="text-left col-md-9 ">
    <h3>{{$oferta['titulo']}}</h3>
    <p >{{$oferta['descripcion']}}</p>
    <p> <strong style="color: #b50045;">@lang('header.puestos'): </strong>{{$oferta['puestos-vacantes']}}</p>

    @foreach ($result['profe_admin'] as $profe_admin) @foreach ($result['user'] as $user) @if($oferta['id_profesor']==$profe_admin['id'])
    @if($user['id']==$profe_admin['id_user'])
    <h6><strong> @lang('header.profesorpublicado'): </strong>{{$user['nombre']}}</h6>
    <button class="btn btn-lg btn-success" id="" style="background: #b50045; float:right;color:white;" type="submit">
      <i class="glyphicon glyphicon-ok-sign"></i>
      @lang('header.inscribirse')
  </button>
    @endif @endif @endforeach @endforeach

  </div>

  @endforeach
</div>
@endsection