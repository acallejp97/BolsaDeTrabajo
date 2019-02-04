@extends('layouts.profe_admin') 
@section('content')
<br>
<div class=row>
    <div class="text-right">
        <button id="anadirDepartamento" class="btn icon-btn d-inline" style="background-color: #DC6E97; float:left; margin-left:10em; width: 15em; text-align: center;">
            <span  class="glyphicon glyphicon-plus"></span>
            Añadir Departamento
        </button>
    </div>
    <br> <br> @foreach ($grados_depar['departamentos'] as $departamento)
    <br>

    <div class="container demo m-top">
        <div id="lista" class="text-left m-4 row" >
            <ul style=" width:100%; background: #b50045;"class="list-unstyled col-md-9" style="display:inline;">
            <li id="departamento"  class="h3 text-uppercase" style="color:white;"><strong>{{$departamento['nombre']}}
                </strong>
            </li>
     
            <button value="{{$departamento['id']}}" class="borrarDepartamento text-center btn icon-btn col-md-2" style="background-color: white; color:black; margin: 1em;">
                <span class="glyphicon glyphicon-minus"></span>
                Borrar Departamento
            </button>

            <button  value="{{$departamento['id']}}" class="anadirGrado text-center btn icon-btn btn-light col-md-2" style="background-color: white; color:black; margin: 1em; ">
                <span class="glyphicon glyphicon-plus"></span>
                Añadir Grado
            </button>
        </ul>
        </div>
        <hr> <br> @foreach ($grados_depar['grados'] as $grado) @if($departamento['id']==$grado['id_depar'])

        <div class="text-left m-4 row">
            <ul class="list-unstyled col-md-9">
                <li id="grado"> {{$grado['nombre']}}
                </li>
            </ul>

            <button value="{{$grado['id']}}" class="borrarGrado btn icon-btn col-md-2 " style="background-color: darkgrey ; color:white;">
                    <span class="glyphicon glyphicon-minus">
                    </span>Eliminar Grado
            </button>
            <br>
            <br>

        </div>
        @endif @endforeach

    </div>
    @endforeach
</div>
<style>
@media (min-width: 576px) { 
    #lista{
        display:block;
    }


 }

</style>
@endsection