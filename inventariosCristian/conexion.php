<?php 
$servidor = "localhost:3306";
$db = "sstcba";
$username = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $username, $password);
} catch (Exception $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>