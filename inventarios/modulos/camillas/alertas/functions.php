<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../../phpmailer/PHPMailer.php';
require '../../../../phpmailer/SMTP.php';
require '../../../../phpmailer/Exception.php';

// Enviar recordatorio por correo electrónico
function enviarRecordatorio($camillaID, $mensaje, $imagenBinaria) {
    global $smtpHost, $smtpUsername, $smtpPassword, $smtpPort, $smtpSecurity;

    $mail = new PHPMailer(true);

    require '../../../../db/conexion.php';

    $correos = mysqli_query($conexion, "SELECT correo FROM user WHERE rol = 1 or rol = 4");

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

        if(mysqli_num_rows($correos) > 0){
            while($listaCorreos = mysqli_fetch_assoc($correos)){
                $mail->addAddress($listaCorreos['correo']);
            }
        }

        $mail->isHTML(true);
        $mail->Subject = 'Recordatorio Revision/Mantenimiento de Camillas';
        $mail->Body = $mensaje;

        $mail->CharSet='UTF-8';

        $mail->addStringAttachment($imagenBinaria, 'camilla.jpg');

        $mail->send();
        
        session_start();
        $_SESSION['email_sent'] = true;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";   
    }
}

// Obtener camillas que necesitan mantenimiento
function obtenerCamillasNecesarias() {
    global $conexion;
    date_default_timezone_set('America/Bogota');
    $hoy = date('Y-m-d');
    $sql = "SELECT * FROM camillas WHERE FechaProximoMantenimiento <= '$hoy'";
    $result = $conexion->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

?>
