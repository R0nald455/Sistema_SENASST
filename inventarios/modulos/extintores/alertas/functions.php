<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Enviar recordatorio por correo electrónico
function enviarRecordatorio($extintorID, $correo, $mensaje) {
    global $smtpHost, $smtpUsername, $smtpPassword, $smtpPort, $smtpSecurity;

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;                                      //Enable verbose debug output
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->Port = $smtpPort;
        $mail->SMTPSecure = $smtpSecurity;

        $mail->setFrom($smtpUsername, 'Sistema de Recordatorios');
        $mail->addAddress($correo);

        $mail->isHTML(true);
        $mail->Subject = 'Recordatorio de Recarga/Mantenimiento de Extintor';
        $mail->Body = $mensaje;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Obtener extintores que necesitan recarga/mantenimiento
function obtenerExtintoresNecesarios() {
    global $conexion;
    date_default_timezone_set('America/Bogota');
    $hoy = date('Y-m-d');
    $sql = "SELECT * FROM extintores WHERE ProximaRecarga <= '$hoy'";
    $result = $conexion->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
