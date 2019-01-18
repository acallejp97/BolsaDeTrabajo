@extends('layouts.profe_admin') 
@section('content')
<div id="modificarCursos">
    <button style="margin-left: 1em" v-on:click="aniadirDepartamento" class="btn icon-btn btn-success d-inline" href="#">
            <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-dark"></span>Añadir Departamento</button></li>
    <br><br> @foreach ($grados_depar['departamentos'] as $departamento)
    <div class="container demo m-top">
        <div class="mrgn_btm_50">
            <li class="float-left ">
                <h3 class=" text-uppercase  d-inline "><strong> <td>  {{$departamento['nombre']}} </td></strong> </h3> <a id="aniadirDepartamento" class="btn icon-btn btn-primary d-inline"
                    href="#"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-dark"></span>Añadir Grado</a></li>
            <hr><br> @foreach ($grados_depar['grados'] as $grado) @if($departamento['id']==$grado['id_depar'])

            <div class="list3 text-left m-4">
                <ul class="list-unstyled ">
                    <a class="btn icon-btn btn-danger float-right " href="#"><span id="{{$grado['nombre']}}"class="glyphicon btn-glyphicon glyphicon-minus img-circle text-dark"></span>Eliminar Grado</a>
                    <br>
                    <li>{{$grado['nombre']}}</li>
                </ul>
            </div>
            @endif @endforeach @endforeach
        </div>



    </div>
</div>
<!-- panel-group -->
@endforeach

</div>
<!-- container -->
@endsection