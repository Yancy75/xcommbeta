<?php $__env->startSection("contenido"); ?>
<style>
.centrointer{
    color: white;
    padding: 20px;
  }
.centrointer > div > p {
  text-align: justify;
}
.tex{
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    text-shadow: 1px 1px 4px black;
}
.marco{
    box-shadow: 1px 1px 3px black;
    border: 1px solid white;
    border-radius: 3px;
}
.publicidad{
  margin-bottom: 2em;
}
.tam{
  height: 172px;
}
.redondo{
  border-radius: 50%;
}
.texm{
  background: rgba(0, 0, 0, 0.7);
  padding: 10px;
  border-radius: 5px;
}
.titulo1 {
    text-transform: uppercase;
    color: #125d56;
    padding: 0.3em;
    font-family: "Patua One", Arial, Tahoma, sans-serif;
    text-align: center;
}
/*interno*/
.small-box>.inner {
    padding: 5px;
}
.small-box h3 {
    font-size: 24px;
    font-weight: bold;
    margin: 0 0 5px 0;
    white-space: nowrap;
    padding: 0;
}
.small-box:hover .icon {
    font-size: 65px;
}
.small-box .icon {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: 5px;
    right: 10px;
    z-index: 0;
    font-size: 65px;
    color: rgba(0,0,0,0.15);
}
.box-body{
    background: white;
    padding: 10px;
    box-shadow: rgb(107, 104, 104) 0px 0px 6px inset;
    text-align: justify;
}

</style>
<section class="publicidad">
<div id="slide" class="pics" style="position: relative;">
            <div style="background-image: url(png/banner.jpg); background-position:center; position: absolute; top: 200px; left: 0px; display: none; z-index: 3; opacity: 1; height: 200px; width: 100%; background-position:center;">
               <div class="row centrointer">
                 <div class="col-md-4 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                   <h1 class="tex">Titulo 1</h1>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                 </div>
                 <div class="col-md-2 wow lightSpeedIn" data-wow-duration="1s" data-wow-delay="0.8s">
                     <img src="<?php echo e(asset('png/descarga.jpg')); ?>" class="img-responsive marco">
                 </div>

                 <div class="col-md-2 wow lightSpeedIn" data-wow-duration="1s" data-wow-delay="1.1s">
                     <img src="<?php echo e(asset('png/descarga2.jpg')); ?>" class="img-responsive marco">
                 </div>

                 <div class="col-md-2 wow lightSpeedIn" data-wow-duration="1s" data-wow-delay="1.4s">
                     <img src="<?php echo e(asset('png/oficina2.jpg')); ?>" class="img-responsive marco">
                 </div>

                 <div class="col-md-2 wow lightSpeedIn" data-wow-duration="1s" data-wow-delay="1.7s">
                     <img src="<?php echo e(asset('png/oficina1.jpg')); ?>" class="img-responsive marco">
                 </div>
               </div>
            </div>
            <div style="background-image: url(png/banner2.jpg); background-position:center; position: absolute; top: 0px; left: 0px; display: block; z-index: 4; height: 200px; opacity: 1; width: 100%;">
              <div class="row centrointer">
                <div class="col-md-3 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.8s">
                    <img src="<?php echo e(asset('png/descarga.jpg')); ?>" class="img-responsive marco tam">
                </div>
                <div class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
                    <img src="<?php echo e(asset('png/descarga2.jpg')); ?>" class="img-responsive marco tam">
                </div>
                <div class="col-md-3 wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.4s">
                    <img src="<?php echo e(asset('png/oficina2.jpg')); ?>" class="img-responsive marco tam">
                </div>
                <div class="col-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
                    <img src="<?php echo e(asset('png/oficina1.jpg')); ?>" class="img-responsive marco tam">
                </div>
              </div>
            </div>
            <div style="background-image: url(png/banner1.jpg); background-position:center; position: absolute; top: 200px; left: 0px; display: none; z-index: 3; height: 200px; opacity: 1; width: 100%;" >
              <div class="row centrointer">
                <div class="col-md-2">
                </div>
                <div class="texm col-md-8 wow zoomIn" data-wow-duration="1s" data-wow-delay="1.1s">
                  <h1 class="tex" style="text-align: center;">titulo 2</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                <div class="col-md-2">
                </div>
              </div>
            </div>
</div>
</section>
<section class="medio container">
  <div class="row">
  <div class="col-md-4  wow zoomIn" data-wow-duration="1s" data-wow-delay="1s">
      <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" >Tasas Públicas del Día</h3>
       <div class="bancos"></div>
  </div>
  <div class="col-md-4  wow zoomIn" data-wow-duration="1s" data-wow-delay="1s">
      <h3 class="titulo1 wow zoomIn" data-wow-duration="1s" data-wow-delay="1s" >Tasas Públicas del Día</h3>
      <ul id="tabs" class="nav nav-tabs" role="tablist">
       <li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab">All</a></li>
       <li role="presentation"><a href="#online" role="tab" data-toggle="tab">Online</a></li>
      <li role="presentation"><a href="#offline" role="tab" data-toggle="tab">Offline</a></li>
     </ul>
     <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="all">
          <div class="caja" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;">
            <ul class="list-group pep">
                 <li class="list-group-item">ulpa qui officia deserunt mollit anim id est laborum.</li>
                 <li class="list-group-item">ulpa qui officia deserunt mollit anim id est laborum.</li>
                 <li class="list-group-item">ulpa qui officia deserunt mollit anim id est laborum.</li>
                 <li class="list-group-item">ulpa qui officia deserunt mollit anim id est laborum.</li>
                 <li class="list-group-item">ulpa qui officia deserunt mollit anim id est laborum.</li>
                 <li class="list-group-item">ulpa qui officia deserunt mollit anim id est laborum.</li>
                 <li class="list-group-item">ulpa qui officia deserunt mollit anim id est laborum.</li>
                 <li class="list-group-item">ulpa qui officia deserunt mollit anim id est laborum.</li>
             </ul>
          </div></div>
        <div role="tabpanel" class="tab-pane fade" id="online">Online content</div>
        <div role="tabpanel" class="tab-pane fade" id="offline">Offline content</div>
     </div>
  </div><!-- medio -->
  <div class="col-md-4  wow zoomIn" data-wow-duration="1s" data-wow-delay="1s">
      <h3 class="titulo1" >Terminos y Condiciones</h3>
      <div class="box box-solid">
                <div class="box-body">
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                            Regla  #1
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                            Regla #2
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
                        <div class="box-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            Regla #3
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                        <div class="box-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            Regla #4
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                        <div class="box-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            Regla #5
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                        <div class="box-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            Regla #6
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                        <div class="box-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            Regla #7
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                        <div class="box-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            Regla #8
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                        <div class="box-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
        </div>
  </div><!-- final de seccion -->
</div>
</section>
<section class="conteo">
   aqui se hace conteo de transacciones
</section>
<section class="publicidad">
  <style type="text/css">
img {
display: block;
height: 300px;
margin-right: 10px;
}

.c-carousel {
width: 100%;
position: relative;
margin-top: 30px;
}
.c-carousel__arrow {
    position: absolute;
    top: 40%;
    z-index: 1;
    font-size: 42px;
    font-weight: bold;
    color: white;
    text-shadow: 1px 1px 3px black;
    cursor: grab;
}
.c-carousel__arrow--left {
left: 15px;
}
.c-carousel__arrow--right {
right: 15px;
}
.c-carousel__slides {
display: -webkit-box;
display: -ms-flexbox;
display: flex;
margin: 0;
padding: 0;
list-style: none;
will-change: transform;
}

  </style>
  <div class="c-carousel">
    <div class="c-carousel__arrow c-carousel__arrow--left"><i class="glyphicon glyphicon-menu-left"></i></div>
    <div class="c-carousel__arrow c-carousel__arrow--right"><i class="glyphicon glyphicon-menu-right"></i></div>
    <ul class="c-carousel__slides">
      <li><img src="//unsplash.it/300/450?random=1"/></li>
      <li><img src="//unsplash.it/300/450?random=2"/></li>
      <li><img src="//unsplash.it/300/450?random=3"/></li>
      <li><img src="//unsplash.it/300/450?random=4"/></li>
      <li><img src="//unsplash.it/300/450?random=5"/></li>
      <li><img src="//unsplash.it/300/450?random=6"/></li>
    </ul>
  </div>
</section>
<section class="miembro">
  miembros de o asociados
</section>
    <script>
  $(function() {
    $('#slide').cycle({
     fx: 'all',
     timeout: 9000,
     delay:   -1000
    });

   new WOW().init();

   contrustor(6,'bancos');
   temporizador(6);
   /*setTimeout(function(){temporizador(9);}, 4000);*/
  });/* final de inicio automatico */
function contrustor(num, lugar){
   var caja = ["bg-aqua", "bg-green", "bg-yellow", "bg-red"];
   var ini = "<div id='b";
   var final="<div class='inner'><h3>Banco</h3><ul style='list-style: none;'><li>precio venta: </li><li>precio de compra: </li></ul></div><div class='icon'><i class='fa fa-university'></i></div><a href='#' class='small-box-footer'>Mas informacion <i class='fa fa-arrow-circle-right'></i></a></div>";
   for(i=0; i < num; i++){ aux1=aleatorio(0,3); aux=ini+i+"' class='boni small-box bg-gray' >"+final; $("."+lugar).append(aux);}
 }
function aleatorio(min, max) { return Math.floor(Math.random() * (max - min) + min);}
function temporizador(num){for(i=0; i < num; i++){$("#b"+i).delay(300+(i*300)).fadeIn();}}
</script>
<script type="text/javascript">
"use strict";var carousel=function(e){var t={paused:!1,stopped:!1,options:{speed:3e3,acceleration:5,reverse:!1,selector:".c-carousel",slidesSelector:".c-carousel__slides",leftArrowSelector:".c-carousel__arrow--left",rightArrowSelector:".c-carousel__arrow--right"},init:function(e){var t=arguments.length<=0||void 0===e?{}:e;for(var s in t){if(!t.hasOwnProperty(s))break;this.options[s]=t[s]}var i=document.querySelector(t.selector||this.options.selector),o=this._slides=i.querySelector(this.options.slidesSelector);this._leftArrow=i.querySelector(this.options.leftArrowSelector),this._rightArrow=i.querySelector(this.options.rightArrowSelector),this.options.speed=this.options.speed*o.children.length,this.width=o.offsetWidth,o.innerHTML=o.innerHTML+o.innerHTML+o.innerHTML,this._registerEvents(),this._animate()},_registerEvents:function(){var e=this,t=this.options.speed,s=this.options.reverse;this._rightArrow.addEventListener("mouseover",function(){e.options.speed=t/e.options.acceleration,e.options.reverse=!1}),this._rightArrow.addEventListener("mouseleave",function(){e.options.speed=t,e.options.reverse=s}),this._leftArrow.addEventListener("mouseover",function(){e.options.speed=t/e.options.acceleration,e.options.reverse=!0}),this._leftArrow.addEventListener("mouseleave",function(){e.options.speed=t,e.options.reverse=s}),this._slides.addEventListener("mouseover",this.pause.bind(this)),this._slides.addEventListener("mouseleave",this.start.bind(this)),window.addEventListener("resize",function(){e.width=e._slides.offsetWidth})},pause:function(){this.paused=!0},start:function(){this.paused=!1},stop:function(){this.stopped=!0},_animate:function(){var t=this,s=this._slides,i=s.lastElementChild.getBoundingClientRect().right/3,o=0,r=0,n=0;!function e(){t.paused||(o=60*t.options.speed/1e3,r=i/o,n+=t.options.reverse?r:-r,s.style.transform="translateX("+n+"px)",t.options.reverse?n>=t.width-i&&(n=t.width-2*i):Math.abs(n)>=2*i&&(n=-i)),t.stopped||requestAnimationFrame(e)}()}};return t.init(e),t};window.onload=function(){return carousel({selector:".c-carousel"})};
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\xcommrd\resources\views/bienvenidos.blade.php ENDPATH**/ ?>