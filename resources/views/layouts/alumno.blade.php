<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">
  
    <!-- Titulo -->
    <title>{{ config('app.name') }}</title>
  
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
  <div class="card text-center" >
    <div class="card-header" >
      
      <nav  class="navbar navbar navbar-static-top custom-navbar" role="navigation">
        <div class="container-fluid">
          <button style="background:#b50045;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>
            <span style="background:white;"class="icon-bar"></span>
            <span style="background:white;"class="icon-bar"></span>
            <span style="background:white;"class="icon-bar"></span>
            
          </button>
          <div>
              <li style="display:inline-flex; float:right; margin-right:2em;">
            
                <a href="{{ route('change_lang', ['lang' => 'es']) }}"> <img  src='republicana.png' class='img-responsive ' style='margin-right: 6px; margin-top:0.2em; height:29px; width: 30px;' /></a>
                <a href="{{ route('change_lang', ['lang' => 'en']) }}"><img src='ingles.png' class='img-responsive' style=' margin-right: 6px; height:35px; width: 30px;' /></a>
                <a href="{{ route('change_lang', ['lang' => 'eu']) }}"><img src='ikurrina.png' class='img-responsive' style=' margin-right: 6px; height:35px; width: 30px;' /></a>
                        </li>
            </div>
          
          <div class="navbar-collapse collapse" id="navbar-collapse-1">
            <!-- Non-collapsing right-side icons -->
      <ul class="nav nav-tabs card-header-tabs  nav navbar-nav">
        <li class="nav-item {{ request()->is('perfil') ? 'active' : '' }}">
          <a  style="color:#b50045;"class="nav-link" href="{{ route('perfil') }}">@lang('header.perfil')</a>
        </li>
        <li  class="nav-item {{ request()->is('home') ? 'active' : '' }}" >
          <a  style="color:#b50045;"class="nav-link" href="{{ route('home') }}">@lang('header.ofertas')</a>
        </li>
        <li class="nav-item {{ request()->is('contacto') ? 'active' : '' }}">
          <a  style="color:#b50045;"class="nav-link" href="{{ route('contacto') }}">@lang('header.contacto')</a>
        </li>
        <li class="nav-item {{ request()->is('actualizarCV') ? 'active' : '' }}">
          <a  style="color:#b50045;"class="nav-link" href="{{ route('actualizarCV') }}">@lang('header.actualizarcv')</a>
        </li>
        <li class="nav-item">
          <a style="color:#b50045;"class="nav-link" href="logout">@lang('header.cerrar')</a>
        </li>
    
      </ul>
    </div>
  </div>
  <!--/.container -->
</nav>
  </div>
  </div>
  
    @yield('content')
  <script src="{{ asset('js/app.js') }}" defer></script>
  </div>
</body>


</html>