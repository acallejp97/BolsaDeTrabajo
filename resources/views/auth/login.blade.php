@extends('layouts.app') 
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="shortcut icon" href="{{ asset('logo.png') }}">
<link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

<div class="container">
    <div class="float-xl-right ">


        <div class=" ">
            <div class="card">

                <div class="card-header "><img class="center-block" src="txurdinaga.png" style="width: 150px; height: 90px;"></div>

                <div class="card-body col-12" style="background: #b50045;">
                    <form method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color:white">{{ __('E-Mail') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required autofocus> @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color:white">{{ __('Contraseña') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" style="background: #e3e0da; color:black;" class="btn btn-primary col-8">
                                    {{ __('INICIAR') }}
                                </button> @if (Route::has('password.request'))
                                <a class="btn btn-link" style="color:white; font-size: 10px;" href="{{ route('password.request') }}">
                                        {{ __('Contraseña olvidada') }}
                                    </a> @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection