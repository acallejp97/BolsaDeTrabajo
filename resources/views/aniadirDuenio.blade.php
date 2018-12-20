@extends('layouts.app')
<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form name="añadirDuenio_f" id="añadirDuenio_f">
                        @csrf  
<!--token validacion-->
<div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" />
    </div>
    <div>
        <label for="name">Usuario:</label>
        <input type="text" id="name" />
    </div>
    <div>
        <label for="mail">E-mail:</label>
        <input type="email" id="mail" />
    </div>
    <div>
    <label for="password"> User password:</label>
  <input type="password" name="psw">
  <input type="submit" value="Enviar">

    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
data = "ADad";
$.ajax({
type: 'post',
url: '{{url("/aniadirDuenio")}}',
data: data
});


</script>
