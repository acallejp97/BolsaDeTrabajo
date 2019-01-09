@extends('layouts.profesor')

@section('content')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
.files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 50px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: " or drag it here. ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
}
    </style>
<!------ Include the above in your HEAD tag ---------->
<div>
<div class="container">
	<div class="row">
	  <div class="col-md-6">
	      <form method="post" action="#" id="#" >
           
              
              
              
              <div class="form-group files">
                <label>Upload Your File </label>
                <input type="file" class="form-control" multiple="">
              </div>
              
              </form>
</div>
</div>
</div>

	      
 <form action="DetailS" method="Post">
            <div class="container-fluid">
                <section class="container">
                    <div class="container-page">				
                        <div class="col-md-6">
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
        </div>

@endsection