<?php $__env->startSection("contenido"); ?>
<style>
.medio{padding: 5em 2em; display: flex; justify-content: center;}
</style>
<section  class="medio container">
   <div class="login-box wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.3s">
              <div class="login-logo"><b><?php echo e(__('Reset Password')); ?></b></div>
                <div class="card">
                   <div class="card-body login-card-body">

                <div class="register-box-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <div class="input-group mb-3">
                                <input id="email" type="email" placeholder="<?php echo e(__('E-Mail Address')); ?>" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                <div class="input-group-append">
                                   <div class="input-group-text"><span class="fa fa-envelope"></span></div>
                                 </div>
                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <?php echo e(__('Enviar contraseña Restablecer enlace')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
           </div>


</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.componente.piebase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rc3ezbst6wcw/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>