@extends('layouts.alumno') 
@section('content')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h1>@lang('header.curriculumde') {{$curriculum['nombre']}}</h1>
        </div>
        <div class="col-sm-3">
            <form method='post' action='{{url("fotocv")}}' enctype='multipart/form-data'>
                @csrf
                <div class='form-group'>
                    <img src="{{url("fotosPerfil/" .$curriculum['imagen'])}}" class='img-responsive'
                        style=' height:200px; width: 200px;' />
                    <input style="color: transparent; margin-top: 3em;" type="file" name="image" />
                    <div class='text-danger'>{{$errors->first('image')}}</div>
                </div>
                <button type='submit' style="background: #b50045; color:white;" class='btn btn-primary'>@lang('header.actualizarimagen')</button>
            </form>

            <br>
            <ul class="list-group">
                <li class="list-group-item text-muted">@lang('header.idiomas')<i class="fa fa-dashboard fa-1x"></i></li>

                <textarea id="idiomas" class="form-control counted" placeholder="idiomas" rows="5" style="margin-bottom:10px;">{{$curriculum['idiomas']}}</textarea>
            </ul>
        </div>

        <div class="col-sm-9">
            <div class="tab-content">
                <div class="tab-pane active">
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label><h4>@lang('header.nombre')</h4></label>
                            <input id="nombre" value="{{$curriculum['nombre']}}" class="form-control" placeholder="Nombre" title="Introduce tu nombre.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label><h4>@lang('header.apellidos')</h4></label>
                            <input id="apellido" class="form-control" value="{{$curriculum['apellidos']}}" placeholder="Apellidos" title="Introduce tus apellidos.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label><h4>@lang('header.telefono')</h4></label>
                            <input id="telefono" value="{{$curriculum['telefono']}}" class="form-control" placeholder="Introduce Teléfono" title="Introduce tu telefono.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label><h4>@lang('header.direccion')</h4></label>
                            <input id="direccion" value="{{$curriculum['direccion']}}" class="form-control" placeholder="Introduce dirección" title="Introduce tu dirección.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label><h4>@lang('header.email')</h4></label>
                            <input id="email" value="{{$curriculum['email']}}" class="form-control mb-1" placeholder="email@dominio.com" title="Introduce tu correo electrónico.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="panel-body">
                            <label><h4>@lang('header.formacion')</h4></label>
                            <textarea id="formacion" class="form-control mb-1" placeholder="Formación academica" rows="5">{{$curriculum['competencias']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="panel-body">
                            <label><h4>@lang('header.experiencia')</h4></label>
                            <textarea id="experiencia" class="form-control mb-1" placeholder="Experiencia Laboral" rows="5">{{$curriculum['experiencia']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="panel-body">
                            <label><h4>@lang('header.otrosdatos')</h4></label>
                            <textarea id="otros" class="form-control mb-1" placeholder="Otros datos" rows="5">{{$curriculum['otros_datos']}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" id="updateCV" style="background: #b50045; float:right;color:white;">
                                    <i class="glyphicon glyphicon-ok-sign"></i>
                                    @lang('header.guardar')
                                </button>
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection