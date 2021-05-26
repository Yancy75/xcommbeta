@extends('adm.template')

@yield("cabezera")
@section("contenido")
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        <div  class="contence" style="font-family: 'Orbitron', sans-serif;">
          <div class="title cuadro logodiv primerologo">
            <i class="fa fa-chevron-right entuno" aria-hidden="true"></i>
            <i class="fa fa-stop entdos" aria-hidden="true"></i>
            <i class="fa fa-chevron-left enttres" aria-hidden="true"></i>
          </div>
            <div class="logodiv segundologo">
              <div class="title">COMM</div>
              <div class="textob">EXchange Community</div>
            </div>
        </div>
    </div>

@endsection
