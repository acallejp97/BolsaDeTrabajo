<!DOCTYPE html>
<html lang="es-ES" >

<head>
    <meta charset="utf-8">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/vue@2.1.10/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
    {{--<script src="{{asset('js/user-function/app.js')}}"></script> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{ asset('logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    {{--<link rel="stylesheet" type="text/css" href="css/menu.css"> --}}
</head>

<body id="mail">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <h1>Curriculum de {{$nombre}}</h1>
            </div>
            <div class="col-sm-3">
                <br>
                <ul class="list-group">
                    <li class="list-group-item text-muted">IDIOMAS<i class="fa fa-dashboard fa-1x"></i></li>

                    <textarea rows="5" style="margin-bottom:10px;">{{$idiomas}}</textarea>
                </ul>
            </div>

            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <hr>
                        <div class="form-group">
                            <div class="col-xs-4">
                                <label>
                                    <h4>Nombre</h4>
                                </label>
                                <label>{{$nombre}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4">
                                <label>
                                    <h4>Apellido</h4>
                                </label>
                                <label>{{$apellidos}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4">
                                <label>
                                    <h4>Telefono</h4>
                                </label>
                                <label>{{$telefono}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label>
                                    <h4>Dirección</h4>
                                </label>
                                <label>{{$direccion}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label>
                                    <h4>Email</h4>
                                </label>
                                <label>{{$email}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel-body">
                                <label>
                                    <h4>Formación Académica</h4>
                                </label>
                                <textarea rows="5">{{$competencias}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel-body">
                                <label>
                                    <h4>Experiencia</h4>
                                </label>
                                <textarea rows="5">{{$experiencia}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel-body">
                                <label>
                                    <h4>Otros datos</h4>
                                </label>
                                <textarea rows="5">{{$otros_datos}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>