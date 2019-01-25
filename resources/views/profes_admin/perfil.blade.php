@extends('layouts.profe_admin') 
@section('content')
<div class="container ">
    <div class="row">
        <div class="col-sm-10">
            <h1>{{Auth::user()->nombre . ' ' . Auth::user()->apellidos}}</h1>
        </div>
    </div>
    <div id="datosPerfil" class="row">
        <div class="col-sm-3">
            <form method='post' action='{{url("fotoperfil")}}' enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class='form-group'>

                    <img src='{{url("./perfiles/".Auth::user()->imagen)}}' class='img-responsive' style=' height:200px; width: 200px;' />

                    <input style="color: transparent; margin-top: 3em;" type="file" name="image" />
                    <div class='text-danger'>{{$errors->first('image')}}</div>
                </div>
                <button type='submit' style="background: #b50045;" class='btn btn-primary'>Actualizar imagen de perfil</button>
            </form>
            <br>

            <div class="panel panel-default">
                <div class="panel-heading">Registrado desde <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">{{Auth::user()->created_at}}</div>
            </div>

            <ul class="list-group">
                <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i></li>
                @if(Auth::user()->rango==0)
                <li class="list-group-item text-center"><span class="pull-center"><strong>Has gozao, eres admin</strong></span> </li>
                @else @foreach ($nombreDepar as $nombre)
                <li class="list-group-item text-center"><span class="pull-center"><strong>Departamento</strong><br/>{{$nombre->nombre}}</span> </li>
                @endforeach @endif
            </ul>

        </div>

        <div class="col-sm-9">
            <div class="tab-content">
                <div class="tab-pane active">
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-11">
                            <label for="nombre"><h4>Nombre</h4></label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{Auth::user()->nombre}}" title="Introduce tu nombre.">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-11">
                            <label for="apellido"><h4>Apellidos</h4></label>
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellidos" value="{{Auth::user()->apellidos}}"
                                title="Introduce tus apellidos.">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-11">
                            <label for="email"><h4>Email</h4></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="{{Auth::user()->email}}"
                                title="Introduce tu email.">
                        </div>
                    </div>

                    <div id="app">
                        <div class="form-group">
                            <div class="col-xs-11">
                                <label for="password">
                                  <h4>Password</h4>
                                </label>
                                <input type="password" class="form-control" name="password1" id="password1" v-model="password1" v-validate="'required'" placeholder="Contraseña"
                                    title="Introduce la contraseña.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-11">
                                <label for="password2">
                                  <h4>Confirmar Contraseña</h4>
                                </label>
                                <input type="password" class="form-control" name="password2" id="password2" v-model="password2" v-validate="'required|confirmed:password'"
                                    placeholder="Repite Contraseña" title="Confirma tu contraseña por favor.">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-8">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" id="updateUser" style="background: #b50045; float:right;color:white;" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>@if(Auth::user()->rango!=0)
                                <button type="submit" class="btn btn-lg btn-success" id="deleteteUser" style="background:#D8BFD8; float:right; color:black;">
										<span class="glyphicon glyphicon-remove" ></span> Borrar Perfil
									</button> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>
<script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};

</script>
@endsection