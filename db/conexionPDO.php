<?php
$server   = "localhost";
$user     = "root";
$pwd      = "";
$db       = "sstcba";

try {
    $conexion = new PDO("mysql:host=$server;dbname=$db", $user, $pwd);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}

?>