<style>
html{
    background-image: url('png/fondo.jpg');
    background-size: cover;
    background-attachment: fixed;
  }
  .main-header{
     margin-left: 0px !important; background: white !important;
     padding: 0px 10px; box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.4);
  }
  .teclaa{
    min-width: 150px;
    padding: 10px;
    border-radius: 3px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
    cursor: pointer;
    transition: 0.4s  ease;
  }
  .teclaa:hover{
    -webkit-box-shadow: 0 0 4px rgba(0,0,0,.4) inset;
    -moz-box-shadow: 0 0 4px rgba(0,0,0,.4) inset;
    box-shadow: 0 0 4px rgba(0,0,0,.4) inset;
  }
  .teclaa > a {
    color:black;
  }
  .activo{
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.1), 30% , #ffffff);
    text-shadow: 0px 0px 4px white;
    -webkit-box-shadow: 4px 0px 2px rgba(0,0,0,.4) inset;
    -moz-box-shadow: 4px 0px 2px rgba(0,0,0,.4) inset;
    box-shadow: 4px 0px 2px rgba(0,0,0,.4) inset;
  }
.navbar-static-top{
   margin-left: 0px;
   padding-bottom: 0px;
   padding-top: 0px;
   box-shadow: 1px 1px 5px black;
   background-image: linear-gradient(to right, #f6f4f7, #fff);
  }
  .navbar-brand{padding: 0px !important;}
  .navbar-light{ background: white !important; }
  .nav-item { margin-left: 5px !important; }
  .caja{ max-width: 600px;}
   body{background: rgba(244, 246, 249, 0.7); min-height: 100% !important;}
  .medio{padding-left: 2em; padding-right: 2em; padding-bottom: 3.6em;}
  .main-footer {margin-left: 0px !important; box-shadow: 0px -1px 10px rgba(0, 0, 0, 0.5);}
  .dr{padding-right: 5px;}
.simbo{
  color: #019935;
    padding-left: 3px;
    font-size: 1.5em;
}
.wrap {
  width: 90%;
  max-width:1000px;
  margin: auto;
}
.relog{
  width: 40%;
  margin: 2em;
}
.relog p {
  display: inline-block;
  line-height: 1em;
}
</style>
  <?php echo $__env->make('layouts.componente.minicabe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header class="main-header">
<nav class="navbar navbar-expand-md navbar-light bg-light">
 <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
   <div class="logo">
      <span class="logo-lg">
        <img src="<?php echo e(asset('png/no fondo.png')); ?>" class="img-responsive" style="width: 350px">
      </span>
   </div>
 </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menup" aria-controls="menup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div>
        <form class="form-inline">
            <div class="form-group mb-2">
                <label for="dolar_transaction_total" >Dolar <i class="fas fa-dollar-sign simbo"></i></label>
                <input type="text" class="form-control paco" id="dolar_transaction_total" disabled/>
            </div>
            <div class="form-group mb-2">
                <label for="euro_transaction_total" >Euro <i class="fas fa-euro-sign simbo"></i></label>
                <input type="text" class="form-control paco" id="euro_transaction_total" disabled/>
            </div>
        </form>
    </div>
<div class="collapse navbar-collapse" id="menup">
  <ul class="navbar-nav ml-auto">
     <li class="nav-item"><a href="<?php echo e(url('login_xcomm')); ?>"><div class="teclaa <?php echo e(Route::currentRouteName() == 'login_xcomm' ? 'activo' : ''); ?>"><i class="fas fa-user dr"></i> Login</div></a></li>
      <li class="nav-item"><a href="<?php echo e(url('register_cliente')); ?>"><div  class="teclaa <?php echo e(Route::currentRouteName() == 'registerCliente' ? 'activo' : ''); ?>"><i class="fas fa-user-plus dr" aria-hidden="true"></i> Register</div></a></li>
      <li class="nav-item"><a href="<?php echo e(url('login_cliente')); ?>"><div  class="teclaa <?php echo e(Route::currentRouteName() == 'loginCliente' ? 'activo' : ''); ?>"><i class="fas fa-user-cog dr" aria-hidden="true"></i> Login Cliente</div></a></li>
     <li class="nav-item"><a href="<?php echo e(url('login_banco')); ?>"><div  class="teclaa <?php echo e(Route::currentRouteName() == 'loginBanco' ? 'activo' : ''); ?>"><i class="fas fa-house-user dr" aria-hidden="true"></i> Login Banco</div></a></li>
  </ul>
</div>
</nav>
</header>
<?php /**PATH C:\laragon\www\xcomm\resources\views/layouts/componente/cabecera_usu.blade.php ENDPATH**/ ?>