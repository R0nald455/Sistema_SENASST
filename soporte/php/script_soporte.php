<?php

if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: ../../../../index.php" );
}

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

if( empty(trim($nombre)) ) $nombre = 'anonimo';
if( empty(trim($apellido)) ) $apellido = '';

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre $apellido / $email</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $nombre $apellido <$email> \r\n";
$headers.= "To: <cbasst1957@gmail.com> \r\n";

$rta = mail('cbasst1957@gmail.com', "Mensaje web: $asunto", $body, $headers );

$mailer = new PHPMailer();
$mailer-> setFrom($email, "$nombre $apellido");
$mailer-> addAddress('cbasst1957@gmail.com', 'CBA');
$mailer->Subject = "Mensaje web: $asunto";
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);
$mailer->CharSet = 'UTF-8';

$rta=$mailer-> send( );

header("Location: ../gracias.php" );
