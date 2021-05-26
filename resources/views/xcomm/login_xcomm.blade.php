@extends('layouts.usuario')
@extends('layouts.componente.piebase')
@section("contenido")
<style>
.medio{padding: 5em 2em; display: flex; justify-content: center;}
</style>
    <section  class="medio container">
      <div class="login-box wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.3s">
       <div class="login-logo"><b>{{ __('Login Xcomm') }}</b></div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión Usuario</p>
      <form method="POST" action="{{ route('xcommlogin') }}">
            @csrf
          <div class="input-group mb-3">
                  <input id="name" type="text" placeholder="{{ __('Usuario...') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="text" autofocus>
                          <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-pen-square"></span></div>
                          </div>
                          @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                          @enderror
          </div>
          <div class="input-group mb-3">
                <input id="password" type="password"  placeholder="{{ __('Clave...') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                       <div class="input-group-append">
                          <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                        @error('password')
                          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
          </div>
          <div class="form-group row">
              <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">{{ __('Recuérdame') }}</label>
                    </div>
              </div>
            <div class="col-md-4"><button type="submit" class="btn btn-primary btn-block">{{ __('INICIO') }}</button></div>
          </div>
         <div class="form-group row mb-0">
                @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('¿Olvidaste tu contraseña?') }}</a>
                @endif
         </div>
      </form>

    </div>
  </div>
    <!-- /.login-card-body -->
  </div>
</div>

    </section >
@endsection
