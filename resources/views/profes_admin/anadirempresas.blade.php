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
        <div class="col-md-4">
            <form action="Usuarios" method="Post">
                <div class="container-fluid">
                    <section class="container">
                        <div class="container-page">
                            <div class="col-md-11">
                                <h3>
                                    <font size="10%">Añadir Manualmente</font>
                                </h3>
                                <div class="form-group col-lg-12">
                                    <label>Nombre de la empresa:</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" title="Introduce el nombre de la empresa.">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Dirección de la empresa:</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="Dirección" title="Introduce la dirección de la empresa.">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>E-mail de la empresa:</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" title="Introduce el email de la empresa.">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>URL de la empresa:</label>
                                    <input type="text" name="url" class="form-control" placeholder="URL" title="Introduce la página web de la empresa.">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Teléfono de la empresa:</label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono" title="Introduce el teléfono de la empresa.">
                                </div>

                                <div class="form-group col-md-12">
                                    <center><button id="anadirEmpresa" type="submit" class="btn btn-primary">Añadir</button></center>
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