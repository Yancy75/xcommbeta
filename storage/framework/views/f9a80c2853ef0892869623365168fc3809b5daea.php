<!DOCTYPE html>
<html class="h-100">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>XCOMM</title>
</head>
<body>
<div>
    <main>
        <p>Enviado por <?php echo e($mensaje['nombre']); ?> - <?php echo e($mensaje['email']); ?></p>
        <p>Telefono: <?php echo e($mensaje['telefono']); ?></p>
        <p><strong>Asunto:</strong> <?php echo e($mensaje['asunto']); ?></p>
        <p><strong>Mensaje:</strong></p>
        <p><?php echo e($mensaje['contenido']); ?></p>
    </main>
</div>
</body>

</html>
<?php /**PATH C:\wamp64\www\xcomm\resources\views/email/mensaje_contactanos.blade.php ENDPATH**/ ?>