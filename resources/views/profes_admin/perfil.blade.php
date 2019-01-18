@extends('layouts.profe_admin') 
@section('content')

<div class="container ">
    <div class="row">
        <div class="col-sm-10">
            <h1>{{Auth::user()->nombre . ' ' . Auth::user()->apellidos}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <div class="text-center">
                {{-- <img src="{{Auth::user()->imagen}}" class="avatar img-circle img-thumbnail" alt="avatar"> --}}
                <input type="file" class="text-center center-block file-upload" accept="image/*">
            </div>
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
        <div id="botones" class="col-sm-9">
            <div class="tab-content">
                <div class="tab-pane active">
                    <hr>
                    <div class="form-group">

                        <div class="col-xs-11">
                            <label for="nombre"><h4>Nombre</h4></label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" v-model="nombre" value="{{Auth::user()->nombre}}"
                                title="Introduce tu nombre.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-11">
                            <label for="apellido"><h4>Apellidos</h4></label>
                            <input type="text" class="form-control" name="apellido" value="{{Auth::user()->apellidos}}" id="apellido" placeholder="Apellidos"
                                v-model="apellido" title="Introduce tus apellidos.">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-11">
                            <label for="email"><h4>Email</h4></label>
                            <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" id="email" placeholder="you@email.com"
                                v-model="email" title="Introduce tu email.">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-11">
                            <label for="password"><h4>Password</h4></label>
                            <input type="password" class="form-control" value="{{Auth::user()->password}}" name="password" id="password" placeholder="Contraseña"
                                v-model="password1" title="Introduce la contraseña.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-11">
                            <label for="password2"><h4>Confirmar Contraseña</h4></label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Repite Contraseña" v-model="password2"
                                title="Confirma tu contraseña por favor.">
                        </div>
                    </div>
                    <div class="form-group col-xs-8">
                        <div class="col-xs-8">
                            <br>
                            <button v-on:click="updateTable" class="btn btn-lg btn-success">
                                    <i class="glyphicon glyphicon-ok-sign"></i>
                                    Guardar</button>

                            <button v-on:click="deleteUser" class="btn btn-lg btn-danger">
                                    <i class="glyphicon glyphicon-remove"></i>
                                    Borrar Perfil</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection