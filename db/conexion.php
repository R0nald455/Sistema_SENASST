<?php
// $server="localhost";
// $usuario="u632157300_SSTCBA";
// $password="SENAsst2023**";
// $database="u632157300_SSTCBA";

// $conexion=new mysqli($server, $usuario, $password, $database);
// if(mysqli_connect_error()){
// 	echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
// } 

$servidor= "localhost:3307";
$usuario= "root";
$password = "";
$nombreBD= "sstcba";
$conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($conexion->connect_error) {
    die("la conexión ha fallado: " . $conexion->connect_error);
}
if (!$conexion->set_charset("utf8")) {
    printf("Error al cargar el conjunto de caracteres utf8: %s\n", $conexion->error);
    exit();
} else {
    printf("", $conexion->character_set_name());
}
?>
