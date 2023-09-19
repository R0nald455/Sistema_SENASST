<?php
error_reporting(E_ALL); // Mostrar todos los errores para depuración
session_start();
$actualsesion = $_SESSION['correo'] ?? null; // Usar operador de fusión null para manejar valores nulos

if (empty($actualsesion)) {
    header('Location: includes/_sesion/login.php'); // Utiliza 'Location' en lugar de 'location'
    exit; // Agregar una llamada a exit para evitar que el script siga ejecutándose
} else {
    header('Location: views/usuarios/index.php');
    exit; // Similarmente, salir después de la redirección
}
?>
