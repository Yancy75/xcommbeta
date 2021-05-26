<?php $__env->startSection("contenido"); ?>
<style>
.medio{padding: 5em 2em; display: flex; justify-content: center;}
</style>
    <section  class="medio container">
      <div class="login-box wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.3s">
       <div class="login-logo"><b><?php echo e(__('Login Xcomm')); ?></b></div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión Usuario</p>
      <form method="POST" action="<?php echo e(route('xcommlogin')); ?>">
            <?php echo csrf_field(); ?>
          <div class="input-group mb-3">
                  <input id="name" type="text" placeholder="<?php echo e(__('Usuario...')); ?>" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="text" autofocus>
                          <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-pen-square"></span></div>
                          </div>
                          <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                          <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
          </div>
          <div class="input-group mb-3">
                <input id="password" type="password"  placeholder="<?php echo e(__('Clave...')); ?>" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password">
                       <div class="input-group-append">
                          <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                          <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
          </div>
          <div class="form-group row">
              <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label for="remember"><?php echo e(__('Recuérdame')); ?></label>
                    </div>
              </div>
            <div class="col-md-4"><button type="submit" class="btn btn-primary btn-block"><?php echo e(__('INICIO')); ?></button></div>
          </div>
         <div class="form-group row mb-0">
                <?php if(Route::has('password.request')): ?>
                  <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('¿Olvidaste tu contraseña?')); ?></a>
                <?php endif; ?>
         </div>
      </form>

    </div>
  </div>
    <!-- /.login-card-body -->
  </div>
</div>

    </section >
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/xcomm/login_xcomm.blade.php ENDPATH**/ ?>