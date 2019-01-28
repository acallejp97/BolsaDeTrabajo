@extends('layouts.profe_admin') 
@section('content')
<br>
<div class=row>
    <div class="text-right">
        <button id="anadirDepartamento" class="btn icon-btn d-inline" style="background-color: #DC6E97; margin-right:15em; width: 15em; text-align: center;">
            <span  class="glyphicon glyphicon-plus"></span>
            Añadir Departamento
        </button>
    </div>
    <br> <br> @foreach ($grados_depar['departamentos'] as $departamento)
    <br>
    <br>
    <div class="container demo m-top">
        <div class="text-left m-4 row" style="background: #b50045;">
            <li id="departamento" class="h3 text-uppercase d-inline col-md-9" style="color: white"><strong>{{$departamento['nombre']}}
                </strong>
            </li>
            <button value="{{$departamento['id']}}" class="anadirGrado btn icon-btn btn-light d-inline col-md-2" style="background-color: white; color:black; margin-top: 1em;">
                
                <span class="glyphicon glyphicon-plus"></span>
                Añadir Grado
            </button>
        </div>
        <hr> <br> @foreach ($grados_depar['grados'] as $grado) 
          @if($departamento['id']==$grado['id_depar'])
          
        <div class="text-left m-4 row">
            <ul class="list-unstyled col-md-9">
                <li id="grado" > {{$grado['nombre']}}
                </li>
            </ul>

            <button value="{{$grado['id']}}" class="borrarGrado btn icon-btn col-md-2 " style="background-color: darkgrey ; color:white;">
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