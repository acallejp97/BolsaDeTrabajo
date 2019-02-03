<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{csrf_token()}}">

  <!-- Titulo -->
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://unpkg.com/vue@2.1.10/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
  {{--
  <script src="{{asset('js/user-function/app.js')}}"></script> --}}

  <!-- Styles -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="shortcut icon" href="{{ asset('logo.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
  {{-- <link rel="stylesheet" type="text/css" href="css/menu.css"> --}}
</head>


<body>
  <div class="card text-center">
    <div class="card-header">
        <div>
            <li style="display:inline-flex; float:right; margin-right:2em;">
          
              <a href="{{ route('change_lang', ['lang' => 'es']) }}"> <img  src='republicana.png' class='img-responsive ' style='margin-right: 6px; margin-top:0.2em; height:29px; width: 30px;' /></a>
              <a href="{{ route('change_lang', ['lang' => 'en']) }}"><img src='ingles.png' class='img-responsive' style=' margin-right: 6px; height:35px; width: 30px;' /></a>
              <a href="{{ route('change_lang', ['lang' => 'eu']) }}"><img src='ikurrina.png' class='img-responsive' style=' margin-right: 6px; height:35px; width: 30px;' /></a>
                      </li>
          </div>
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item {{ request()->is('perfil') ? 'active' : '' }}">
          <a style="color:#b50045;"class="nav-link" href="{{ route('perfil') }}">@lang('header.perfil')</a>
        </li>
        <li class="nav-item {{ request()->is('altaUsuarios') ? 'active' : '' }}">
          <a style="color:#b50045;"class="nav-link" href="{{ route('altaUsuarios') }}">@lang('header.altausuarios')</a>
        </li>
        <li class="nav-item {{ request()->is('usuarios') ? 'active' : '' }}">
          <a style="color:#b50045;"class="nav-link" href="{{ route('usuarios') }}">@lang('header.usuarios')</a>
        </li>
        <li class="nav-item {{ request()->is('empresas') ? 'active' : '' }}">
          <a style="color:#b50045;"class="nav-link" href="{{ route('empresas') }}">@lang('header.empresas')</a>
        </li>
        <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
          <a style="color:#b50045;"class="nav-link" href="{{ route('home') }}">@lang('header.ofertas')</a>
        </li>
        <li class="nav-item {{ request()->is('cursos') ? 'active' : '' }}">
          <a style="color:#b50045;"class="nav-link" href="{{ route('cursos') }}">@lang('header.cursos')</a>
        </li>
        @if ((Auth::user()->rango)==1)
        <li class="nav-item {{ request()->is('contacto') ? 'active' : '' }}">
          <a style="color:#b50045;"class="nav-link" href="{{ route('contacto') }}">@lang('header.contacto')</a>
        </li>
        @endif @if ((Auth::user()->rango)==0)
        <li class="nav-item {{ request()->is('profesores') ? 'active' : '' }}">
          <a style="color:#b50045;"class="nav-link" href="{{ route('profesores') }}">@lang('header.profesores')</a>
        </li>
        <li class="nav-item {{ request()->is('buzon') ? 'active' : '' }}">
          <a style="color:#b50045;"class="nav-link" href="{{ route('buzon') }}">@lang('header.buzon')</a>
        </li>
        @endif
        <li class="nav-item">
          <a style="color:#b50045;"class="nav-link" href="logout">@lang('header.cerrar')</a>
        </li>
       
      </ul>
    </div>
  </div>

  @yield('content')
  <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>