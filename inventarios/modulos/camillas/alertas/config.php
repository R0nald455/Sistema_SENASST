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
                <img style='width: 100%; height: 100%;' src='https://i.imgur.com/VxcH9d8.jpg' alt=''>
            </div>
        
            <div style='text-align: center; margin: 10px; color: rgb(57, 168, 1);' class='containerTitulo'>
                <h1>La siguiente camilla necesita ser revisada <b style='color: #b81414;'>!URGENTEMENTE¡</b></h1>
            </div>
        
            <div style='width: 100%; padding: 20px;' class='containerContenido'>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Tipo de camilla:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $camilla['TipoCamilla'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Ubicacion:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $camilla['UbicacionActual'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Fecha de adquisicion:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $camilla['FechaAdquisicion'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Fecha en que se le hizo mantenimiento por ultima vez:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $camilla['FechaUltimoMantenimiento'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Con las siguientes observaciones:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $camilla['Observaciones'] . "</p>
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