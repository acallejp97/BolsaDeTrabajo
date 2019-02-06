@extends('layouts.profe_admin') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-header text-center">@lang('header.subirarchivo')</h3>
            
            @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">@lang('header.cerrar')</span>
                </button>
                <strong>{{ Session::get('success') }}</strong>
            </div>
            @endif @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">@lang('header.cerrar')</span>
                </button>
                <strong>{{ Session::get('error') }}</strong>
            </div>
            @endif @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <div>
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
            @endif
            
            <form action="{{ route('subiendoCSV') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} @lang('header.elige') : <input type="file" name="file" class="form-control" style="padding-bottom: 2.8em;">
                <br>
                
                <input type="submit" class="btn  btn-lg" style="background: #b50045; float:right; color: white;">
            </form>
            <a class="btn btn-lg btn-success" href="{{asset('download/template.csv')}}" download="template.csv" style="background:#D8BFD8; float:right; color:black;" type="submit">
                <i class="glyphicon glyphicon-download"></i>
                @lang('header.plantilla')
            </a>
        </div>
        <div class="col-md-6">
            <div class="container-fluid">
                <div class="container-page">
                    <div class="col-md-9">
                        <div class="page-header">
                            <h3>@lang('header.añadirmanual')</h3>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>@lang('header.nombrealu') :</label>
                            <input type="text" id="nombre" class="form-control" placeholder="@lang('header.metenombre')" title="Introduce el nombre del alumno." />
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <label>@lang('header.apellidoalu') :</label>
                            <input type="text" id="apellidos" class="form-control" placeholder="@lang('header.meteapellidos')" title="Introduce los apellidos del alumno."
                            />
                        </div>

                        <div class="form-group col-lg-12">
                            <label>@lang('header.emailalu') :</label>
                            <input type="text" id="email" class="form-control" placeholder="@lang('header.meteemail')" title="Introduce el email del alumno." />
                        </div>

                        <div class="form-group col-lg-12">
                            <label>@lang('header.añofinalu') :</label>
                            <input type="text" id="anio_fin" class="form-control" placeholder="@lang('header.meteaño')" title="Introduce el año de finalizacion del alumno."
                            />
                        </div>

                        <div class="form-group col-lg-12">
                            <label>@lang('header.grado')</label>
                            <select class="form-control" id="id_grado">
                                @foreach($grados as $grado)
                                <option id="grado{{$grado->id}}" value="{{$grado->id}}">{{$grado->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <br />

                            <button class="btn btn-lg btn-success" id="insertUser" style="background: #b50045; float:right;color:white;" type="submit">
                                <i class="glyphicon glyphicon-ok-sign"></i>
                                @lang('header.subir')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection