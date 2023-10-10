<?php

include('../../../../../db/conexion.php');

$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'cbasst1957@gmail.com';
$smtpPassword = 'ateycqubweafmdok';
$smtpPort = 587;
$smtpSecurity = 'tls';

require 'functions.php';

$elementosNecesarios = obtenerElementosNecesarios();

if ($elementosNecesarios) {
    foreach ($elementosNecesarios as $elemento) {

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
                <img style='width: 100%; height: 100%;' src='https://i.imgur.com/Sea0PWX.jpg' alt=''>
            </div>
        
            <div style='text-align: center; margin: 10px; color: rgb(57, 168, 1);' class='containerTitulo'>
                <h1>El siguiente elemento necesita ser remplazado <b style='color: #b81414;'>!URGENTEMENTE¡</b> porque se ha caducado.</h1>
            </div>
        
            <div style='width: 100%; padding: 20px;' class='containerContenido'>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >ID de elemento:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $elemento['id_elementos'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >ID del botiquin al que pertenece:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $elemento['id_botiquin'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Nombre:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $elemento['nombre'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Cantidad:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $elemento['cantidad'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Ubicacion:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $elemento['ubicacion'] . ", ". $elemento['ubicacionEspecifica'] ."</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Estado:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $elemento['estado'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Fecha de registro:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $elemento['fechaRegistro'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Fecha de vencimiento:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $elemento['fechaVencimiento'] . "</p>
                <h2 style='margin: 5px; color: rgb(57, 168, 1);' >Comentarios:</h2>
                <p  style='margin: 5px; font-size:20px;'>" . $elemento['comentarios'] . "</p>
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

        $imagenBinaria = $elemento['ImagenReferencia'];

        enviarRecordatorio($elemento['id_elementos'], $mensaje, $imagenBinaria);
        header('Location: ../index.php');

    }

} else {
    echo '<script type="text/javascript">
    alert("No se encuentran elementos caducados en este momento.");
    window.location.href="../index.php"
    </script>';
}



?>