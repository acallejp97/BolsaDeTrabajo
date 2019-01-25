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
  {{-- <link rel="stylesheet" type="text/css" href="css/menu.css"> --}}
</head>

<body>
  <div class="card text-center" >
    <div class="card-header" >
      <ul class="nav nav-tabs card-header-tabs">
        <li  class="nav-item {{ request()->is('home') ? 'active' : '' }}" >
          <a  style="color:#b50045;"class="nav-link" href="{{ route('home') }}">Ofertas</a>
        </li>
        <li class="nav-item {{ request()->is('actualizarCV') ? 'active' : '' }}">
          <a  style="color:#b50045;"class="nav-link" href="{{ route('actualizarCV') }}">Actualizar CV</a>
        </li>
        <li class="nav-item {{ request()->is('perfil') ? 'active' : '' }}">
          <a  style="color:#b50045;"class="nav-link" href="{{ route('perfil') }}">Ver Perfil</a>
        </li>
        <li class="nav-item {{ request()->is('contacto') ? 'active' : '' }}">
          <a  style="color:#b50045;"class="nav-link" href="{{ route('contacto') }}">Contacto</a>
        </li>
        <li class="nav-item">
          <a style="color:#b50045;"class="nav-link" href="logout">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
    @yield('content')
  <script src="{{ asset('js/app.js') }}" defer></script>
  </div>
</body>


</html>