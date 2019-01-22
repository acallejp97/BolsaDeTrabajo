@extends('layouts.profe_admin') 
@section('content')
<div id="modificarCursos">
    <button v-on:click="aniadirDepartamento" class="btn icon-btn btn-success d-inline">
            <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-dark"></span>Añadir Departamento</button></li>
    @foreach ($grados_depar['departamentos'] as $departamento)
    <div class="container demo m-top">
        <div class="row">
            <h3 class="col-sm-7 text-uppercase  d-inline "><strong> <td>  {{$departamento['nombre']}} </td></strong> </h3> <a id="aniadirDepartamento" class="btn icon-btn btn-primary d-inline">
                    <span class="col-sm-5 glyphicon btn-glyphicon glyphicon-plus img-circle text-dark"></span>Añadir Grado</a>
        </div>
        <hr><br> @foreach ($grados_depar['grados'] as $grado) @if($departamento['id']==$grado['id_depar'])
        <div class="list3 text-left m-4">
            <ul class="list-unstyled ">
                <a class="btn icon-btn btn-danger float-right "><span id="{{$grado['nombre']}}"class="glyphicon btn-glyphicon glyphicon-minus img-circle text-dark"></span>Eliminar Grado</a>
                <br>
                <li>{{$grado['nombre']}}</li>
            </ul>
        </div>
        @endif @endforeach
    </div>
</div>
@endforeach
@endsection