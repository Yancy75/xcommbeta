@extends('layouts.usuario')
@extends('layouts.componente.piebase')
@section('contenido')
<style>
.medio{padding: 5em 2em; display: flex; justify-content: center;}
</style>
   <section  class="medio container">
     <div class="login-box wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.3s">
      <div class="login-logo"><b>{{ __('Login Banco') }}</b></div>
            <div class="card">
                <div class="card-body login-card-body">
                  <p class="login-box-msg">Inicia sesión Bancario</p>
                                
                        <form method="POST" action="{{ route('bancoLogin') }}">
                            @csrf
                            <div class="input-group mb-3">
                                  <select id="entidadbancarias_id" name="entidadbancarias_id" class="custom-select">
                                        <option value="na">Seleccione una entidad financiera</option>
                                        @if($info)
                                        @foreach($info as $inf)
                                            <option value="{{$inf->id}}">{{$inf->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                   {{--   <input id="entidadbancarias_id" type="hidden" class="form-control @error('entidadbancarias_id') is-invalid @enderror" name="entidadbancarias_id" value="{{ old('entidadbancarias_id', $info[0]->id) }}" required >--}}
                                    @error('entidadbancarias_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="input-group mb-3">
                                    <input id="email" type="email" placeholder="{{ __('Email...') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="text" autofocus>
                                    <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
                                    @error('email')
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
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('INICIO') }}
                                    </button>
                                </div>
                            </div>
                      </form>
                    </div>


                </div>
    </section>
@endsection
