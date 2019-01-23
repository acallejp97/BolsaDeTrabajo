@extends('layouts.profe_admin') 
@section('content')
<br>
<div class=row>
    <div class="text-right col-md-10">
        <button class="btn icon-btn btn-success d-inline">
            <span class="glyphicon glyphicon-plus"></span>
            Añadir Departamento
        </button>
    </div>
    <br> <br> @foreach ($grados_depar['departamentos'] as $departamento)
    <br>
    <br>
    <div class="container demo m-top bg-info">
        <div class="text-left m-4 row">
            <p class="h3 text-uppercase d-inline col-md-9">
                <strong>
                    {{$departamento['nombre']}}
                    </strong>
            </p>
            <button id="aniadirDepartamento" class="btn icon-btn btn-primary d-inline col-md-2">
                <span class="glyphicon glyphicon-plus"></span>
                Añadir Grado
            </button>
        </div>
        <hr> <br> @foreach ($grados_depar['grados'] as $grado) @if($departamento['id']==$grado['id_depar'])
        <div class="text-left m-4 row">
            <ul class="list-unstyled col-md-9">
                <li> {{$grado['nombre']}}
                </li>
            </ul>

            <button class="btn icon-btn btn-danger col-md-2">
                    <span class="glyphicon glyphicon-minus">
                    </span>Eliminar Grado</button>
            <br>
            <br>
        </div>
        @endif @endforeach
    </div>
    @endforeach
</div>
@endsection