<?php

// $server   = "localhost";
// $user     = "u632157300_SSTCBA";
// $pwd      = "SENAsst2023**";
// $db       = "u632157300_SSTCBA";


$server   = "localhost:3307";
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