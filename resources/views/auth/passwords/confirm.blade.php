@extends('layouts.app')
@section('title', 'Confirmar Contraseña')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('welcome') }}">
                <b>Plan de Adquisiciones</b>
                <script type="text/javascript">
                    document.write(new Date().getFullYear());
                </script>
            </a>
        </div>
        <!-- /.login-logo -->

        <div class="card card-outline card-primary">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Confirma tu Contraseña antes de continuar</p>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password" placeholder="Contraseña">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Confirmar Contraseña</button>
                        </div>
                    </div>
                </form>

                @if (Route::has('password.request'))
                    <p class="mt-3 mb-1 text-center">
                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    </p>
                @endif
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
