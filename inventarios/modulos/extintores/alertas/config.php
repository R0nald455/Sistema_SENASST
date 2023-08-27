<?php

include('../../../../db/conexion.php');

$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'cbasst1957@gmail.com';
$smtpPassword = 'ateycqubweafmdok';
$smtpPort = 587;
$smtpSecurity = 'tls';

require 'functions.php';

$extintoresNecesarios = obtenerExtintoresNecesarios();

foreach ($extintoresNecesarios as $extintor) {
    $mensaje = "<center style='font-size: 30px;'> El extintor con número de serie {$extintor['NumeroDeSerie']}. <br>";
    $mensaje.= "De tipo {$extintor['TipoDeExtintor']}. <br>";
    $mensaje.= "Fabricado el {$extintor['FechaDeFabricacion']} <br>";
    $mensaje.= "Comprado el {$extintor['FechaDeCompra']} <br>";
    $mensaje.= "Ubicado en el/la {$extintor['Ubicacion']}, {$extintor['UbicacionEspecifica']} <br>";
    $mensaje.= "Recargado por ultima vez el {$extintor['UltimaRecarga']} <br>";
    $mensaje.= "Con el siguiente comentario: {$extintor['Comentarios']} <br>";
    $mensaje.= "<b> ¡¡ Necesita ser recargado o revisado urgentemente. !! </b><br></center>";

}

enviarRecordatorio($extintor['ExtintorID'], 'cbasst1957@gmail.com', $mensaje);

header('Location: ../index.php');

?>
