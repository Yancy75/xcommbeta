@extends('layouts.usuario')
@extends('layouts.componente.cabecera_inv')
@section("contenido")
<!--  <link href="{{ asset('css/especial.css') }}" rel="stylesheet">
<div class="contaespe" style="position:relative;">
   	<div id="home" class="content">
 			<h2>Pasos a seguir</h2>
			<ul>
				<li><p>Ejemplos por lista</p></li>
				<li><p>Se pueden modicar por paneles para ejemplos</p></li>
				<li><p>Cada panel es independiente</p></li>
			</ul>
 		</div>
 		<div id="portfolio" class="panel">
 			<div class="content">
 				<h2>Detalles</h2>
 				<p>Muestras de Fotos variable:</p>
 				<ul id="works">
 					<li><a href="{{ asset('png/descarga.jpg') }}"><img src="{{ asset('png/descarga.jpg') }}" width="250"></a></li>
 					<li><a href="{{ asset('png/descarga2.jpg') }}"><img src="{{ asset('png/descarga2.jpg') }}" width="250"></a></li>
 					<li><a href="{{ asset('png/modelo2.jpg') }}"><img src="{{ asset('png/modelo2.jpg') }}" width="250"></a></li>
 				</ul>
 				<p class="footnote">Modicados por Netmoon <a href="#">Solutions</a>.</p>
 			</div>
 		</div>
 		<div id="about" class="panel">
 			<div class="content">
 				<h2>Consejos Utiles</h2>
				<div class="row">
					<div class="col-md-4">
 				     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			    </div>
					<div class="col-md-4">
 				   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
 			     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				 </div>
				 <div class="col-md-4">
 				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</div>
			 </div>
 			</div>
 		</div>
 		<div id="contact" class="panel">
 			<div class="content">
 				<h2>Recomendacions</h2>
 				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
 				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
 				</div>
 		</div>
 		<div  class="cabezan">
 			<h1>Como funciona XCOMM</h1>
 			<ul id="navigation">
 				<li><a id="link-home" href="#home">Pasos a seguir</a></li>
 				<li><a id="link-portfolio" href="#portfolio">Detalles</a></li>
 				<li><a id="link-about" href="#about">Consejos utiles</a></li>
 				<li><a id="link-contact" href="#contact">Recomendaciones</a></li>
 			</ul>
 		</div>
  </div>-->
  <style>
  .box.box-primary {
      padding: 10px 10px 5px 10px;
  }
  .content-header{
    padding-bottom: 2em;
  }
  .caja{
    text-align: justify;
  }
  .username{
    font-size: 16px;
      font-weight: 600;
      text-transform: uppercase;
      text-shadow: 0px 0px 5px white;
  }
  .pep{
      background: white;
      padding: 10px;
      box-shadow: 0 0 6px #6b6868 inset;
  }
  .list-group-item{
    cursor: pointer;
     transition:all .2s;
  }
  .list-group-item:hover{
    font-size: 1.2em;
    font-weight: 900;
    background-image: linear-gradient(90deg,#585757, #ecf0f5);
    color: white;
    text-shadow: 0 0 3px black;
  }
  </style>
  <div class="container">
    <section class="content-header">
        <h1 class="titulo2"><i class="fa fa-cog" aria-hidden="true"></i> Como funciona XCOMM </h1>
    </section>
    <section>
  <div class="row pep">
  <div class="col-md-3">
  <ul class="nav nav-pills nav-stacked">
    <li class="active"><a data-toggle="pill" href="#home">Pasos a seguir</a></li>
    <li><a data-toggle="pill" href="#menu1">Detalles</a></li>
    <li><a data-toggle="pill" href="#menu2">Concejos utiles</a></li>
    <li><a data-toggle="pill" href="#menu3">Recomendaciones</a></li>
  </ul>
</div>
<div class="col-md-9">
  <div class="tab-content" style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;">
    <div id="home" class="tab-pane fade in active">
      <h3>Pasos a seguir</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Detalles</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Concejos utiles</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Recomendaciones</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>
</div>

     </div>
   </section>
@endsection
