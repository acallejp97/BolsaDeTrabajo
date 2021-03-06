@extends('layouts.'.$result['rango'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h1>{{Auth::user()->nombre . ' ' . Auth::user()->apellidos}}</h1>
        </div>
    </div>
    <div id="datosPerfil" class="row">
        <div class="col-sm-3">
            <form method='post' action='{{url("fotoperfil")}}' enctype='multipart/form-data'>
                @csrf
                <div class='form-group'>

                    <img src="{{url("fotosPerfil/ " . Auth::user()->imagen)}}" class='img-responsive'
                        style=' height:200px; width: 200px;' />

                    <input style="color: transparent; margin-top: 3em;" type="file" name="image" />
                    <div class='text-danger'>{{$errors->first('image')}}</div>
                </div>
                <button type='submit' @if(Auth::user()->rango==0) style="background: #b50045;"
                    @elseif(Auth::user()->rango==1) style="background: blue;" @else style="background: green;" @endif
                    class='btn btn-primary'>@lang('header.actualizarimagen')</button>
            </form>
            <br>

            <div class="panel panel-default">
                <div class="panel-heading">@lang('header.registradodesde')<i class="fa fa-link fa-1x"></i></div>

                <?php $fecha = explode(' ', trim(Auth::user()->created_at));?>
                <div class="panel-body">{{$fecha[0]}}</div>

            </div>
            @if(Auth::user()->rango!=2)
            <ul class="list-group ">
                @if(Auth::user()->rango==0)
                <li class="list-group-item text-muted">@lang('header.actividad')</li>
                <li class="list-group-item text-center"><span class="pull-center">Admin</span></li>
                @else
                <li class="list-group-item text-muted"><strong>@lang('header.departamento')</strong></li>
                @foreach ($result['nombreDepar'] as $nombre)
                <li class="list-group-item text-center"><span class="pull-center">{{$nombre->nombre}}</span></li>
                @endforeach @endif
            </ul>
            @else
            <ul class="list-group">
                <li class="list-group-item text-muted">@lang('header.añofinalu')</li>
                <li class="list-group-item text-center"><span
                        class="pull-center"><strong>{{$result['anio_fin']->anio_fin}}</strong><br /></span> </li>
            </ul>
            @endif
        </div>
        <div class="col-sm-9">
            <div class="tab-content">
                <div class="tab-pane active">
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-11">
                            <label for="nombre">
                                <h4>@lang('header.nombre')</h4>
                            </label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                placeholder="@lang('header.metenombre')" value="{{Auth::user()->nombre}}"
                                title="Introduce tu nombre.">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-11">
                            <label for="apellido">
                                <h4>@lang('header.apellidos')</h4>
                            </label>
                            <input type="text" class="form-control" name="apellido" id="apellido"
                                placeholder="@lang('header.meteapellidos')" value="{{Auth::user()->apellidos}}"
                                title="Introduce tus apellidos.">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-11">
                            <label for="email">
                                <h4>@lang('header.email')</h4>
                            </label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="@lang('header.meteemail')" value="{{Auth::user()->email}}"
                                title="Introduce tu email.">
                        </div>
                    </div>

                    <div id="passwords">
                        <passwords></passwords>
                    </div>

                    <div class="form-group col-xs-8">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" onsubmit="return validarFormulario()"
                                    id="updateUser" @if(Auth::user()->rango==0) style="background: #b50045;
                                    float:right;color:white;" @elseif(Auth::user()->rango==1) style="background: blue;
                                    float:right;color:white;" @else style="background: green; float:right;color:white;"
                                    @endif


                                    type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                                    @lang('header.guardar')</button>@if(Auth::user()->rango!=0)
                                <button type="submit" class="btn btn-lg btn-success" onclick="validarFormulario3(this)"
                                    id="deleteUser" style="background:#D8BFD8; float:right; color:black;">
                                    <span class="glyphicon glyphicon-remove"></span> @lang('header.borrarperfil')
                                </button> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
document.getElementById('email').addEventListener('input', function() {
campo = event.target;
valido = document.getElementById('emailOK');
    
emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
if (emailRegex.test(campo.value)) {
document.getElementById('updateUser').disabled=false;

  valido.innerText = "válido";
} else {
document.getElementById('updateUser').disabled=true;

  valido.innerText = "incorrecto";
}
});

</script>
<script>
    src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js";

</script>
@endsection