<?php

include('../../../../db/conexion.php');

$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'cbasst1957@gmail.com';
$smtpPassword = 'ateycqubweafmdok';
$smtpPort = 587;
$smtpSecurity = 'tls';

require 'functions.php';

$camillasNecesarias = obtenerCamillasNecesarias();

if ($camillasNecesarias) {
    foreach ($camillasNecesarias as $camilla) {
        $mensaje = "<center style='font-size: 30px;'> La camilla de tipo {$camilla['TipoCamilla']}. <br>";
        $mensaje .= "Ubicado en {$camilla['UbicacionActual']}. <br>";
        $mensaje .= "Adquirido el {$camilla['FechaAdquisicion']} <br>";
        $mensaje .= "Revisado por ultima vez el {$camilla['FechaUltimoMantenimiento']} <br>";
        $mensaje .= "Con las siguientes observaciones: {$camilla['Observaciones']}<br>";
        $mensaje .= "<b> ¡¡ Necesita ser revisado urgentemente. !! </b><br>";
        $mensaje .= "<img src='cid:imagen' />";

        $imagenBinaria = $camilla['ImagenReferencia'];

        enviarRecordatorio($camilla['camillaID'], 'cbasst1957@gmail.com', $mensaje, $imagenBinaria);
        header('Location: ../index.php');

    }

} else {
    echo '<script type="text/javascript">
    alert("No se encuentran camillas con revisiones pendientes.");
    window.location.href="../index.php"
    </script>';
}



?>