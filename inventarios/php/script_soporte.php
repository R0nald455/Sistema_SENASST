<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; // Asegúrate de incluir la ruta correcta al archivo autoload.php de PHPMailer

// Obtén los datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Configuración de SMTP y datos del correo electrónico
$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'cbasst1957@gmail.com';
$smtpPassword = 'S1stemaSSTcba1957%';
$smtpPort = 587;

$mail = new PHPMailer(true);
try {
    // Configurar el servidor SMTP
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->Port = $smtpPort;

    // Configurar el remitente y destinatario
    $mail->setFrom($email, $name);
    $mail->addAddress('noreply@example.com'); // Reemplaza con tu dirección de correo de soporte

    // Configurar el contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Formulario de Ayuda y Soporte';
    $mail->Body = 'Nombre: ' . $name . '<br><br>' . 'Correo electrónico: ' . $email . '<br><br>' . 'Mensaje: ' . $message;

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado exitosamente';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
