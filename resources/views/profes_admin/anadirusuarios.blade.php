@extends('layouts.profe_admin') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-header text-center">Subir un archivo</h3>
            
            @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ Session::get('success') }}</strong>
            </div>
            @endif @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
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
                {{ csrf_field() }} Choose your xls/csv File : <input type="file" name="file" class="form-control" style="padding-bottom: 2.8em;">
                <br>
                
                <input type="submit" class="btn  btn-lg" style="background: #b50045; float:right; color: white;">
            </form>
            <a class="btn btn-lg btn-success" href="{{asset('download/template.csv')}}" download="template.csv" style="background:#D8BFD8; float:right; color:black;" type="submit">
                <i class="glyphicon glyphicon-download"></i>
                Descargar Plantilla
            </a>
        </div>
        <div class="col-md-6">
            <div class="container-fluid">
                <div class="container-page">
                    <div class="col-md-6">
                        <div class="page-header">
                            <h3>Añadir manualmente</h3>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Nombre del alumno :</label>
                            <input type="text" id="nombre" class="form-control" placeholder="Nombre" title="Introduce el nombre del alumno." />
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <label>Apellido del alumno :</label>
                            <input type="text" id="apellidos" class="form-control" placeholder="Apellidos" title="Introduce los apellidos del alumno."
                            />
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Email del alumno :</label>
                            <input type="text" id="email" class="form-control" placeholder="Email" title="Introduce el email del alumno." />
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Año de finalización :</label>
                            <input type="text" id="anio_fin" class="form-control" placeholder="Año Finalizacion" title="Introduce el año de finalizacion del alumno."
                            />
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Grado</label>
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
                                Subir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection