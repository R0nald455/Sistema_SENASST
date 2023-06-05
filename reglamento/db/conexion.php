<?php
$servidor= "localhost:3307";
$usuario= "root";
$password = "";
$nombreBD= "inventarios";
$conex = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($conex->connect_error) {
    die("la conexión ha fallado: " . $conex->connect_error);
}
?>