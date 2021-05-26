@extends('layouts.usuario')
@extends('layouts.componente.cabecera_inv')
@section("contenido")
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

.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{
  font-size: 18px;
  border: 1px solid #5757e8;
  text-align: center;
  color: #626a74;
  margin-bottom: 30px;
  box-shadow: 1px 1px 3px black;
}
.filter-button:hover
{
  font-size: 18px;
  border: 1px solid #636b70;
  border-radius: 5px;
  text-align: center;
  color: #ffffff;
  background-color: #5757df;
  box-shadow: 0px 0px black;
  text-shadow: 1px 1px 2px black;
}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}
.img-responsive{
  border-radius: 5px;
    box-shadow: 0px 0px 3px black;
    cursor: pointer;
}
.titulo2{
  font-weight: 900;
  color: white;
  text-shadow: 0 0 2px black, 1px 1px 4px #000000;
  background: linear-gradient(45deg, #585757 10%, transparent);
  padding: 0.3em;
  border-radius: 4px 0px 0px 4px;
}
</style>
<div class="container">
  <section class="content-header">
    <h1 class="titulo2" ><i class="fa fa-user-circle" aria-hidden="true"></i> Personal XCOMM </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="#">Personal</a></li>
    <li class="active">Xcomm</li>
  </ol>
  </section>
    <div class="row">
    <div align="center">
        <button class="btn btn-default filter-button" data-filter="all">Todos</button>
        <button class="btn btn-default filter-button" data-filter="diseno">Diseñadores</button>
        <button class="btn btn-default filter-button" data-filter="contador">Contadores</button>
        <button class="btn btn-default filter-button" data-filter="ingeniero">Ingenieros</button>
        <button class="btn btn-default filter-button" data-filter="administrador">Administradores</button>
    </div>
    <br/>
        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter diseno">
            <img src="{{ asset('png/descarga.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter contador">
            <img src="{{ asset('png/descarga2.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter diseno">
            <img src="{{ asset('png/modelo.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter administrador">
            <img src="{{ asset('png/modelo2.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter ingeniero">
            <img src="{{ asset('png/modelo3.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter administrador">
            <img src="{{ asset('png/modelo4.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter ingeniero">
            <img src="{{ asset('png/oficina1.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter administrador">
            <img src="{{ asset('png/oficina2.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter administrador">
            <img src="{{ asset('png/oficina3.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter diseno">
            <img src="{{ asset('png/oficina4.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter ingeniero">
            <img src="{{ asset('png/oficina5.jpg') }}" class="img-responsive">
        </div>

        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter contador">
            <img src="{{ asset('png/descarga.jpg') }}" class="img-responsive">
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        if(value == "all"){$('.filter').show('1000');
        }else{ $(".filter").not('.'+value).hide('3000');
               $('.filter').filter('.'+value).show('3000');}
    });
    if ($(".filter-button").removeClass("active")) {
           $(this).removeClass("active");}
     $(this).addClass("active");
});
</script>
@endsection
