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
    $mensaje = "El extintor con número de serie {$extintor['NumeroDeSerie']} necesita recarga o mantenimiento.";
}

enviarRecordatorio($extintor['ExtintorID'], 'cbasst1957@gmail.com', $mensaje);

header('Location: ../index.php');

?>
