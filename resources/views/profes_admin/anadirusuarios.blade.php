@extends('layouts.profe_admin') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <h3>Subir un archivo</h3>
            </div>
            <div class="container">
                <h2 class="text-center">
                    Laravel Excel/CSV Import
                </h2>
         
                @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ Session::get('success') }}</strong>
            </div>
            @endif
         
            @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ Session::get('error') }}</strong>
            </div>
            @endif
         
            @if (count($errors) > 0)
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
            {{ csrf_field() }}
            Choose your xls/csv File : <input type="file" name="file" class="form-control">
         
            <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 3%">
        </form> 
        </div>
        <div class="col-md-6">
            <form action="Usuarios" method="Post">
                <div class="container-fluid">
                    <div class="container-page">
                        <div class="col-md-6">
                            <div class="page-header">
                                <h3>Añadir manualmente</h3>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Nombre del alumno :</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" title="Introduce el nombre del alumno." />
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Apellido del alumno :</label>
                                <input type="text" name="apellido" class="form-control" placeholder="Apellidos" title="Introduce los apellidos del alumno."
                                />
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Email del alumno :</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" title="Introduce el email del alumno." />
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Año de finalización :</label>
                                <input type="text" name="aniofin" class="form-control" placeholder="Año Finalizacion" title="Introduce el año de finalizacion del alumno."
                                />
                            </div>

                            <div class="col-xs-12">
                                <br />

                                <button class="btn btn-lg btn-success" style="background: #b50045; float:right;color:white;" type="submit">
                                    <i class="glyphicon glyphicon-ok-sign"></i>
                                    Subir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection