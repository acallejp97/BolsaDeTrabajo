@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!-->
<!------------------------------------------------------LOGUEO USUARIOS---------------------------------------------->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @if (session::get('rango') == '0' )
                            <h1>admin</h1>
                        @else if (session::get('rango') == '1' )
                            <h1>profe</h1>
                        @else
                            <h1>alumno</h1>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
