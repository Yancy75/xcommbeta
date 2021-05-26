@extends('layouts.usuario')
@extends('layouts.componente.piebase')
@section('contenido')
    <style>
        .medio{padding: 5em 2em; display: flex; justify-content: center;}
    </style>
    <section  class="medio container">
        <div class="login-box wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.3s">
            <div class="login-logo"><b>{{ __('Registro de Cliente') }}</b></div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Registro de Cliente </p>
                    <form method="POST" action="{{ route('registrandoCliente') }}">
                        @csrf
                        <div class="input-group mb-3">

                            <input id="nombre" type="text" placeholder="{{ __('Nombre...') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="text" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">

                            <input id="cedula" type="number" placeholder="{{ __('Cedula...') }}" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="text" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-address-card"></span></div>
                            </div>
                            @error('cedula')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input id="email" type="email" placeholder="{{ __('Email...') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="text" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input id="phone" type="number" placeholder="{{ __('Celular...') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="text" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-mobile"></span></div>
                            </div>
                            @error('phone')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input id="password" type="password"  placeholder="{{ __('Clave...') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="input-group mb-3">
                            <input id="password2" type="password"  placeholder="{{ __('Re-Clave...') }}" class="form-control @error('password2') is-invalid @enderror" name="password2" required autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                            @error('password2')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="form-group row">
{{--                            <div class="col-8">--}}
{{--                                <div class="icheck-primary">--}}
{{--                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                    <label for="remember">--}}
{{--                                        {{ __('Recuérdame') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
{{--                        <div class="form-group row mb-0">--}}
{{--                            @if (Route::has('password.request'))--}}
{{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                    {{ __('¿Olvidaste tu contraseña?') }}--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
