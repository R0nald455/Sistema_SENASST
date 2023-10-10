<?php

include('../../../../db/conexion.php');

$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'cbasst1957@gmail.com';
$smtpPassword = 'ateycqubweafmdok';
$smtpPort = 587;
$smtpSecurity = 'tls';

require 'functions.php';



$extintoresNecesarios = obtenerExtintoresNecesarios();

if ($extintoresNecesarios) {
    foreach ($extintoresNecesarios as $extintor) {

        $mensaje = "

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
</head>

<body>

<div style='width: 100%; height: auto; display: flex; flex-direction: column; align-items: center;' class='correo'>
<div style='height: auto;' class='containerCorreo'>
    <header style='width: 100%; height: auto; background-color: rgb(57, 168, 1); display: flex;'>
        <div style='width: 50px; margin-left: 10px;' class='imgContainerCorreo'>
            <a href='https://cbaproy20.com/SenaSST/'><img style='width: 50px; margin-top: 10px;' id='logoCorreo' src='https://i.imgur.com/foNHcE4.png' alt=''></a>
        </div>
    </header>

    <div style='width: 100%; height: 400px;' class='imgContainerBienvenida'>
        <img style='width: 100%; height: 100%;' src='https://i.imgur.com/Nr55LIC.jpg' alt=''>
    </div>

    <div style='text-align: center; margin: 10px; color: rgb(57, 168, 1);' class='containerTitulo'>
        <h1>El siguiente extintor necesita ser recargado <b style='color: #b81414;'>!URGENTEMENTE¡</b></h1>
    </div>

    <div style='width: 100%; padding: 20px;' class='containerContenido'>
        <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Numero de serie:</h2>
        <p  style='margin: 5px; font-size:20px;'>" . $extintor['NumeroDeSerie'] . "</p>
        <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Tipo de extintor:</h2>
        <p  style='margin: 5px; font-size:20px;'>" . $extintor['TipoDeExtintor'] . "</p>
        <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Fecha de fabricacion:</h2>
        <p  style='margin: 5px; font-size:20px;'>" . $extintor['FechaDeFabricacion'] . "</p>
        <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Fecha de compra:</h2>
        <p  style='margin: 5px; font-size:20px;'>" . $extintor['FechaDeCompra'] . "</p>
        <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Ubicacion:</h2>
        <p  style='margin: 5px; font-size:20px;'>" . $extintor['Ubicacion'] . ", " . $extintor['UbicacionEspecifica'] . "</p>
        <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Ultima recarga:</h2>
        <p  style='margin: 5px; font-size:20px;'>" . $extintor['UltimaRecarga'] . "</p>
        <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Mensaje:</h2>
        <p  style='margin: 5px; font-size:20px;'>" . $extintor['Comentarios'] . "</p>
    </div>

    <footer style='background-color: rgb(57, 168, 1); padding: 10px; color: #ffffff; text-align: center; font-size: 10px;'>
        <p> ©Servicio Nacional de Aprendizaje SENA - Centro de Biotecnologia Agropecuaria - Regional
            Cundinamarca
            Dirección: Km 7 Via Bogota-Mosquera Cundinamarca - Telefono: (1) 5462323 Ext. 17967
            Conmutador Nacional (57 1) 5461500
            Atención telefónica: lunes a viernes 7:30 a.m. a 4:30 P.M
            Atención al ciudadano: Bogotá (57 1) 5925555 - Línea gratuita y resto del país 018000 910270
            Atención al empresario: Bogotá (57 1) 4049494 - Línea gratuita y resto del país 018000 910682</p>

    </footer>

</div>
</div>

</html>
";

        $mensaje .= "<img src='cid:imagen' />";

        $imagenBinaria = $extintor['ImagenReferencia'];

        enviarRecordatorio($extintor['ExtintorID'], $mensaje, $imagenBinaria);
        header('Location: ../index.php');

    }
} else {
    echo '<script type="text/javascript">
    alert("No se encuentran extintores con revisiones pendientes.");
    window.location.href="../index.php"
    </script>';
}





?>