@extends('layouts.profe_admin') 
@section('content')
<br>
<div class=row>
    <div class="text-right">
        <button id="anadirDepartamento" class="btn icon-btn d-inline" style="background-color: #ff1a66; width: 14%; text-align: center;">
            <span class="glyphicon glyphicon-plus"></span>
            Añadir Departamento
        </button>
    </div>
    <br> <br> @foreach ($grados_depar['departamentos'] as $departamento)
    <br>
    <br>
    <div class="container demo m-top">
        <div class="text-left m-4 row" style="background: #b50045;">
            <li id="elDepartamento" value="{{$departamento['id']}}" class="h3 text-uppercase d-inline col-md-9" style="color: white" ><strong>{{$departamento['nombre']}}
                </strong>
            </li>
            <button id="anadirGrado" class="btn icon-btn btn-light d-inline col-md-2" style="background-color: white; color:black; margin-top: 1em;">
                
                <span class="glyphicon glyphicon-plus"></span>
                Añadir Grado
            </button>
        </div>
        <hr> <br> @foreach ($grados_depar['grados'] as $grado) @if($departamento['id']==$grado['id_depar'])
        <div class="text-left m-4 row">
            <ul class="list-unstyled col-md-9">
                <li id="grado" value="{{$grado['id']}}"> {{$grado['nombre']}}
                </li>
            </ul>

            <button id="borrarGrado" class="btn icon-btn col-md-2 " style="background-color: darkgrey ; color:white;">
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