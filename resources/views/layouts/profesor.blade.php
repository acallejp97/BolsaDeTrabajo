<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}">
<link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
      <li class="nav-item">
        <a class="nav-link" href="perfil">Ver Perfil</a>
      </li>
        <a class="nav-link active" href="anadirEmpresas">Alta Empresas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="anadirUsuarios">Alta user</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usuarios">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="empresas">Empresas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="home">Ofertas</a>
      </li>
      <li class="nav-item"></li>
        <a class="nav-link" href="cursos">Cursos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout">Cerrar Sesion</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    @yield('content')
  </div>
</div>
</nav>
<main class="py-4">
</main>
</div>
</body>
</html>
<script>
      
      switch(routes: ) {
  case x:
    // code block
    break;
  case y:
    // code block
    break;
  default:
    // code block
} 
        
        </script>