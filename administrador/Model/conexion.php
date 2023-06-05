<?php

$host = "localhost:3307";
$user = "root";
$contrasena = "";
$nombre_bd = "inventarios";

$conexion = mysqli_connect($host, $user, $contrasena, $nombre_bd);
if(!$conexion){
    echo "No se realizo la conexion a la bd, el error fue : ".mysqli_connect_error();

}

?>