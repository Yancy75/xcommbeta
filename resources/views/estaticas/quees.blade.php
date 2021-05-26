@extends('layouts.usuario')
@extends('layouts.componente.cabecera_inv')
@section("contenido")
<style media="screen">
.box-profile{ transition: all 2s;}
  .box-profile:hover{
    box-shadow: 0 0 6px black;
    cursor: pointer;
  }
</style>
  <div class="container">
    <section class="content-header">
        <h1 class="titulo2"><i class="fa fa-eye" aria-hidden="true"></i> Que es XCOMM </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Reglas</a></li>
        <li class="active">Xcomm</li>
      </ol>-->
    </section>
    <section class="content">

      <div class="row">

        <div class="col-md-12">
          <div class="nav-tabs-custom wow fadeInRight"  data-wow-duration="2s" data-wow-delay="0.5s">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Que es XCOMM</a></li>
              <li><a href="#timeline" data-toggle="tab">Historia</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;">
                  <div class="user-block">
                    <img class="img-bordered-sm" src="{{ asset('png/xcomm logo.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Concepto</a>
                        </span>
                    <span class="description"></span>
                  </div>
                  <!-- /.user-block -->
                  <p style="text-align: justify">
                    Por sus siglas en ingles Exchange Community. Es una pagina web que permite de manera sencilla informacion actual del mercado de divisas, facilidades para comprar o vender divisas y realizar solicitudes de compra y venta a la mejor tasa cambiaria por medio de instituciones autorizadas y regularizadas por el Banco Central de la Republica Dominicana y supervisadas por la Superintendencia de Bancos del pais.
                  </p>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Equipo de soporte</a> Email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Leer Mas</a>
                        <a class="btn btn-danger btn-xs">Borrar</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> hace  5 min</span>

                      <h3 class="timeline-header no-border"><a href="#">Carla Fernandez</a>
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> hace 27 min</span>

                      <h3 class="timeline-header"><a href="#">Javier Blanco White</a></h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">Seguir leyendo</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> hace 2 dias </span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> Cargaron fotos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    </div>
    <script>
      new WOW().init();
    </script>
@endsection
