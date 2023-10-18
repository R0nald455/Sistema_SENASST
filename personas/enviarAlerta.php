<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';
require '../phpmailer/Exception.php';
require '../db/conexion.php';

$ubicacion=$_POST['contexto'];
$otro=$_POST['otroRiesgoInput'];

if($ubicacion=="otro"){
    $ubicacionreal=$otro;
}else{
    $ubicacionreal=$ubicacion;
}

$email = "cbasst1957@gmail.com";
$asunto = "Alerta incidente reportado en ".$ubicacionreal;
$mensaje = "Alerta incidente reportado en ".$ubicacionreal;
$body = "

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
        <img style='width: 100%; height: 100%;' src='https://i.imgur.com/77Vr36q.jpg' alt=''>
    </div>

    <div style='text-align: center; margin: 10px; color: rgb(57, 168, 1);' class='containerTitulo'>
        <h1>INCIDENTE REPORTADO</h1>
    </div>

    <div style='width: 100%; padding: 20px;' class='containerContenido'>
        <h1  style='margin: 5px; font-size:20px;'>" . $mensaje . "</h1>
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
$select_products = mysqli_query($conexion, "SELECT * FROM `products`");



$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cbasst1957@gmail.com';                     //SMTP username
    $mail->Password   = 'ateycqubweafmdok';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, "INCIDENTE!!!!");

    if(mysqli_num_rows($select_products) > 0){
        while($fetch_product = mysqli_fetch_assoc($select_products)){
            $mail->addAddress($fetch_product['contact']);
        }
    }
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $body;
    
    $mail->send();
    echo json_encode('alerto');
} catch (Exception $e) {
    echo json_encode('error');
    exit();
}
?>