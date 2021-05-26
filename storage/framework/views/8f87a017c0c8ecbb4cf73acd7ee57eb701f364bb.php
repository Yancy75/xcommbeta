<?php echo $__env->yieldContent("cabezera"); ?>
<?php $__env->startSection("contenido"); ?>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adm.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\xcomm\resources\views/bienvenido.blade.php ENDPATH**/ ?>