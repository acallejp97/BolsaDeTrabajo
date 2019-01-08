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

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        
        <a class="nav-link active" href="VerOfertas">Alta Empresas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="ActualizarCV">Alta Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="VerPerfil">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Contacto">Empresas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Contacto">Ofertas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Contacto">Cursos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Contacto">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cerrar Sesion</a>
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