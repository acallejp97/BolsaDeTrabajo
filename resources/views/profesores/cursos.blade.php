@extends('layouts.profesor')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container demo">

    @foreach ($grados_depar['departamentos'] as $departamento)
        <div class="mrgn_btm_50">
        <li><h3 class="text-justify text-uppercase p-4"><strong> <td>  {{$departamento['nombre']}} </td></strong> </h3></li>
        <a class="btn icon-btn btn-primary" href="#"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-primary"></span>Añadir Grado</a>
        @foreach ($grados_depar['grados'] as $grado)
            <div class="list3">
            <ul class="list-unstyled text-justify">
            @if($departamento['id']==$grado['id_depar'])
                <li>{{$grado['nombre']}}</li>
            @endif
            </ul>
            </div>
            </div>
        @endforeach
    @endforeach

    </div><!-- panel-group -->


</div><!-- container -->

@endsection
