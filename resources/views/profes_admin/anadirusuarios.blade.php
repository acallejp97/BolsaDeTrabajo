@extends('layouts.profe_admin') 
@section('content')
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

    .files input:focus {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        border: 1px solid #92b0b3;
    }

    .files {
        position: relative
    }

    .files:after {
        pointer-events: none;
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

    .color input {
        background-color: #f1f1f1;
    }

    .files:before {
        position: absolute;
        bottom: 10px;
        left: 0;
        pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: " or drag it here. ";
        display: block;
        margin: 0 auto;
        color: #2ea591;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="page-header">
      <h3>
      Subir un archivo
      </h3>
    </div>
<form action='{{url("csv")}}' method='post' enctype="multipart/form-data">
   Importar Archivo : <input type='file' name='sel_file' size='20'>
   <input type='submit' name='submit' value='submit'>
  </form>
</form>
        </div>
        <div class="col-md-6">
            <form action="Usuarios" method="Post">
                <div class="container-fluid">
                    <section class="container">
                        <div class="container-page">
                            <div class="col-md-6">
                            <div class="page-header">
      <h3>
        Añadir manualmente
      </h3>
    </div>
                                <div class="form-group col-lg-12">
                                    <label>Nombre del alumno :</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" title="Introduce el nombre del alumno.">
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

                                    <div class="col-xs-12">
                                <br>
                               
                              	<button class="btn btn-lg btn-success" style="background: #b50045; float:right;color:white;"type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Subir</button>
                                 
                            </div>

                            </div>
                        </div>
                    </section>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection





<script>
    $("#subir").click(function () {
if(($handle = fopen(public_patch() .. '/usuarios.csv','r')) !==FALSE)
{
//RECORREMOS EL ARCHIVO Y VAMOS ALMACENANDO LO LEIDO EN $DATA
while (($data = fgetcsv ($handle, 1000, ',')) !==FALSE)
{
$scifi =new User();
$scifi ->email =$data[0];
$scifi ->nombre =$data[1];
$scifi ->rango =$data[2];
$scifi ->apellidos =$data[3];
$scifi ->save();
}
fclose($handle);
}
return User::all();

    });

</script>