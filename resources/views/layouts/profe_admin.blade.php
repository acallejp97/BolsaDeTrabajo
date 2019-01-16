<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Titulo -->
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://unpkg.com/vue@2.1.10/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
  <script src="{{asset('js/user-function/app.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>

  <!-- Styles -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>


<body>
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link" href="perfil">Ver Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="anadirEmpresas">Alta Empresas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="anadirUsuarios">Alta Usuarios</a>
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
        <li class="nav-item">
          <a class="nav-link" href="cursos">Cursos</a>
        </li>
        @if ((Auth::user()->rango)==1)
        <li class="nav-item">
          <a class="nav-link" href="Contacto">Contacto</a>
        </li>
        @endif @if ((Auth::user()->rango)==0)
        <li class="nav-item">
          <a class="nav-link " href="anadirProfesores">Alta Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="buzon">Buzon</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="logout">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
    @yield('content')
  </div>
</body>

</html>