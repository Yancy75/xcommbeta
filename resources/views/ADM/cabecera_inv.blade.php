@section('cabezera')
<style>
ul .menu{
  text-transform: uppercase;
  box-shadow: -1px 1px 4px black;}
.skin-blue .main-header .navbar {
    background-image: linear-gradient(to right, #5656ea , #636b6f); }
.logo-lg{
   font-family: 'Orbitron', sans-serif;
    text-shadow: 1px 2px #080808;}
.skin-blue .main-header .logo {
    background-color: #5757e8;  }
</style>
<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>X</b>COMM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>XCOMM</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-group"></i> Quienes Somos <i class="fa fa-sort-desc"></i>
              <span class="label label-success"></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <!-- Task item -->
                    <a href="#">
                      <h3> Que es XCOMM </h3>

                    </a>
                  </li>
                  <!-- end task item -->
                  <li>
                    <!-- Task item -->
                    <a href="#">
                      <h3>Porque Xcomm</h3>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li>
                    <!-- Task item -->
                    <a href="#">
                      <h3>
                        Como Funciona
                      </h3>
                    </a>
                  </li>
                  <!-- end task item -->
                  </ul>
              </li>
          </ul>

          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope"></i> Contatos
              <span class="label label-warning"></span>
            </a>

          </li>
          <!-- Tasks: style can be found in dropdown.less -->


            @if (Route::has('login'))
              @auth
          <li class="tasks-menu">
            <a href="{{ url('/home') }}" class="dropdown-toggle">Home
            </a>
          </li>
            @else
          <li class="tasks-menu">
            <a href="{{ route('login') }}" class="dropdown-toggle">Login
            </a>
          </li>
              @if (Route::has('register'))
          <li class="tasks-menu">
            <a href="{{ route('register') }}" class="dropdown-toggle">Register
            </a>
          </li>
               @endif
            @endauth
          @endif
          <!-- fin de botones de login -->
        </ul>
      </div>
    </nav>
  </header>

@endsection
