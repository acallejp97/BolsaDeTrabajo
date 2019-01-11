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



    @foreach ($grados_depar['departamentos'] as $departamento)
    
    <div class="container demo m-top">
        <div class="mrgn_btm_50">
            <li class="float-left "><h3 class=" text-uppercase  d-inline "><strong> <td>  {{$departamento['nombre']}} </td></strong> </h3> <a class="btn icon-btn btn-primary d-inline" href="#"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-dark"></span>Añadir Grado</a></li>
            <hr><br>
        @foreach ($grados_depar['grados'] as $grado)
        
        @if($departamento['id']==$grado['id_depar'])
        <div class="list3 text-left m-4">
            <ul class="list-unstyled ">
                    <a class="btn icon-btn btn-danger float-right " href="#"><span class="glyphicon btn-glyphicon glyphicon-minus img-circle text-dark"></span>Eliminar Grado</a>
                <br>
                <li >{{$grado['nombre']}}</li>
           
            </ul>
            </div>
            @endif
            @endforeach
            </div>
      
    

    </div><!-- panel-group -->
    @endforeach

</div><!-- container -->

@endsection
