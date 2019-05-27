@extends('layouts.alumno')
@section('content')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../node_modules/jspdf/dist/jspdf.min.js"></script>
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
                <button type='submit' style="background: green; color:white;"
                    class='btn btn-primary'>@lang('header.actualizarimagen')</button>
            </form>

            <br>
            <ul class="list-group">
                <li class="list-group-item text-muted">@lang('header.idiomas')<i class="fa fa-dashboard fa-1x"></i></li>

                <textarea id="idiomas" class="form-control counted" placeholder="@lang('header.meteidiomas')" rows="5"
                    style="margin-bottom:10px;">{{$curriculum['idiomas']}}</textarea>
            </ul>
        </div>

        <div class="col-sm-9">
            <div class="tab-content">
                <div class="tab-pane active">
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label>
                                <h4>@lang('header.nombre')</h4>
                            </label>
                            <input id="nombre" value="{{$curriculum['nombre']}}" class="form-control"
                                placeholder="@lang('header.metenombre')" title="Introduce tu nombre.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label>
                                <h4>@lang('header.apellidos')</h4>
                            </label>
                            <input id="apellido" class="form-control" value="{{$curriculum['apellidos']}}"
                                placeholder="@lang('header.meteapeliidos')" title="Introduce tus apellidos.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label>
                                <h4>@lang('header.telefono')</h4>
                            </label>
                            <input id="telefono" value="{{$curriculum['telefono']}}" class="form-control"
                                placeholder="@lang('header.metelefono')" title="Introduce tu telefono.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label>
                                <h4>@lang('header.direccion')</h4>
                            </label>
                            <input id="direccion" value="{{$curriculum['direccion']}}" class="form-control"
                                placeholder="@lang('header.metedireccion')" title="Introduce tu dirección.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label>
                                <h4>@lang('header.email')</h4>
                            </label>
                            <input id="email" value="{{$curriculum['email']}}" class="form-control mb-1"
                                placeholder="@lang('header.meteemail')" title="Introduce tu correo electrónico.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="panel-body">
                            <label>
                                <h4>@lang('header.formacion')</h4>
                            </label>
                            <textarea id="formacion" class="form-control mb-1"
                                placeholder="@lang('header.meteformacion')"
                                rows="5">{{$curriculum['competencias']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="panel-body">
                            <label>
                                <h4>@lang('header.experiencia')</h4>
                            </label>
                            <textarea id="experiencia" class="form-control mb-1"
                                placeholder="@lang('header.meteexperiencia')"
                                rows="5">{{$curriculum['experiencia']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="panel-body">
                            <label>
                                <h4>@lang('header.otrosdatos')</h4>
                            </label>
                            <textarea id="otros" class="form-control mb-1" placeholder="@lang('header.meteotrosdatos')"
                                rows="5">{{$curriculum['otros_datos']}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" id="updateCV"
                                    style="background: green; float:right;color:white;">
                                    <i class="glyphicon glyphicon-ok-sign"></i>
                                    @lang('header.guardar')
                                </button>
                                <button class="btn btn-lg btn-success"
                                    style="background: #33ffad; float:right;color:white;" onclick="showpdf()">
                                    <i class="glyphicon glyphicon-ok-sign"></i>
                                    Ver
                                </button>
                            </div>
                        </div>
                        <br />
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var doc = new jsPDF();
            var elementHandler = {
                "#ignorePDF": function(element, renderer) {
                    return true;
                }
            };
            var source = window.document.getElementsByTagName("body")[0];
            doc.fromHTML(source, 15, 15, {
                width: 180,
                elementHandlers: elementHandler
            });
            
            doc.output("dataurlnewwindow");
    </script>
    @endsection