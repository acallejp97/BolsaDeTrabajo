<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  <!-- Styles -->
  <link rel="shortcut icon" href="{{ asset('logo.png') }}">

  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="home">Ofertas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="actualizarCV">Actualizar CV</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="perfil">Ver Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
    @yield('content')
    <script src="{{asset('js/updateUser.js')}}"></script>
  </div>
</body>


</html>