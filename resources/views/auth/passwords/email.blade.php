@extends('layouts.app')
@extends('layouts.componente.piebase')
@section("contenido")
<style>
.medio{padding: 5em 2em; display: flex; justify-content: center;}
</style>
<section  class="medio container">
   <div class="login-box wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.3s">
              <div class="login-logo"><b>{{ __('Reset Password') }}</b></div>
                <div class="card">
                   <div class="card-body login-card-body">

                <div class="register-box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="input-group mb-3">
                                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="input-group-append">
                                   <div class="input-group-text"><span class="fa fa-envelope"></span></div>
                                 </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Enviar contraseña Restablecer enlace') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
           </div>


</div>
</section>
@endsection
