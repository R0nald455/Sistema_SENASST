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
$mensaje = "<h1>Alerta incidente reportado en ".$ubicacionreal."</h1>";
$body ="<br>Mensaje: " . $mensaje;
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