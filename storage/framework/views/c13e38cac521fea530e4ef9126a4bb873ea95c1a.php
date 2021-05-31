<?php $__env->startSection('pie'); ?>
<footer class="main-footer fixed-bottom">
    <strong>Copyright © 2019 <a href="#">NetMoon</a>.</strong>All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2
    </div>
  </footer>

<script>
jQuery(function() {
    new WOW().init();
    mostrarTotalTransaccionesDolarYEuro();
  });/* final de inicio automatico */
  function mostrarTotalTransaccionesDolarYEuro(){
      $.ajax({url: "<?php echo e(route('monstrarTransaccionesDolarEuro')); ?>", type: 'GET', data: { data : 'data'}, dataType: 'JSON',
      success: function (d) { $("#dolar_transaction_total").val(d["dolar"]); $("#euro_transaction_total").val(d["euro"]); }, error: function(){}});
  }
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\laragon\www\xcommbeta\resources\views/layouts/componente/piebase.blade.php ENDPATH**/ ?>