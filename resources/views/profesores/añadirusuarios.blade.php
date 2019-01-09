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
                                <input type="text" name="cname" class="form-control" placeholder="Enter Course Name" required="Plz Enter">
                            </div>
                            
                            <div class="form-group col-lg-12">
                                <label>Apellido del alumno :</label>
                                <input type="text" name="intro" class="form-control" placeholder="Enter Course Introduction" required="Plz Enter">
                            </div>
                            
                            <div class="form-group col-lg-12">
                                <label>Email del alumno :</label>
                                <input type="text" name="heading1" class="form-control" placeholder="Enter First Heading" required="Plz Enter">
                            </div>
                            
                            <div class="form-group col-lg-12">
                                <label>Año de finalización :</label>
                                <input type="text" name="heading2" class="form-control" placeholder="Enter secound Heading" required="Plz Enter">
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