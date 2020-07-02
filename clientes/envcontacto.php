<?php
    $destinatario = 'david.alavarez@alumnos.udg.mx';

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $header = "Enviado desde PhoneLand";
    $mensajeCompleto = $mensaje . "\nAtentamente:" . $nombre;

    mail($destinatario, $asunto, $mensajeCompleto, $header);
    echo "<script>alert('Envio exitoso')</script>";
    echo "<script> serTimeout(\"location.href='contancto.php'\",1000)</script>";

    ?>