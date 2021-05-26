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
        <p>Enviado por {{ $mensaje['nombre'] }} - {{ $mensaje['email'] }}</p>
        <p>Telefono: {{ $mensaje['telefono'] }}</p>
        <p><strong>Asunto:</strong> {{ $mensaje['asunto'] }}</p>
        <p><strong>Mensaje:</strong></p>
        <p>{{ $mensaje['contenido'] }}</p>
    </main>
</div>
</body>

</html>
