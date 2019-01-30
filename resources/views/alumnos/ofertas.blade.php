@extends('layouts.alumno') 
@section('content')
<div class="row">
  <div class="page-header">
    <h3>
      Lista de ofertas
    </h3>
  </div>
  @foreach ($result['ofertas'] as $oferta)
  <div class="justify col-md-12">
    <h3>{{$oferta['titulo']}}</h3>
    <p>{{$oferta['descripcion']}}</p>
    <p> <strong style="color: #b50045;">Puestos vacantes: </strong>{{$oferta['puestos-vacantes']}}</p>

    @foreach ($result['profe_admin'] as $profe_admin) @foreach ($result['user'] as $user) @if($oferta['id_profesor']==$profe_admin['id'])
    @if($user['id']==$profe_admin['id_user'])
    <h6><strong> Profesor que la ha publicado: </strong>{{$user['nombre']}}</h6>
    @endif @endif @endforeach @endforeach

  </div>
  <div>
    <td class="td-actions">
      <a class="btn btn-default btn-xs" style="float:right;" href="javascript:;">
                <span class="glyphicon glyphicon-pencil"></span> Modificar
              </a>
      <a class="btn btn-default btn-xs" style="background: #b50045; float:right; color:white;" href="javascript:;">
                  <span class="glyphicon glyphicon-remove" ></span> Borrar
                </a>
    </td>
  </div>
  @endforeach
</div>
@endsection