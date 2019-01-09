@extends('layouts.profesor')

@section('content')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <form action="DetailS" method="Post">
            <div class="container-fluid">
                <section class="container">
                    <div class="container-page">				
                        <div class="col-md-12">
                            <h3><font size="10%">Añadir Manualmente</font></h3>

                            <div class="form-group col-lg-12">
                                <label>Nombre del alumno :</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" title="Introduce el nombre del alumno."  >
                            </div>
                            
                            <div class="form-group col-lg-12">
                                <label>Apellido del alumno :</label>
                                <input type="text" name="apellido" class="form-control" placeholder="Apellidos" title="Introduce los apellidos del alumno.">
                            </div>
                            
                            <div class="form-group col-lg-12">
                                <label>Email del alumno :</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" title="Introduce el email del alumno.">
                            </div>
                            
                            <div class="form-group col-lg-12">
                                <label>Año de finalización :</label>
                                <input type="text" name="aniofin" class="form-control" placeholder="Año Finalizacion" title="Introduce el año de finalizacion del alumno.">
                            </div>
                            
            	

                     <!--       <div class="form-group col-lg-12">
                                <label>File Upload :</label>
                                <input type="file" name="file" value="Submit Image" required="Plz Insert Image">
                            </div>			
                     -->
                            
                        <div class="form-group col-md-12">
                            <center><button type="submit" class="btn btn-primary">Submit</button></center>
                        </div>
                            
                        </div>

                        
                    </div>
                </section>
            </div>
        </form>

@endsection