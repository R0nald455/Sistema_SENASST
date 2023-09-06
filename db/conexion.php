<?php

$server="localhost";
$usuario="u632157300_SSTCBA";
$password="";
$database="u632157300_SSTCBA";
$conexion=new mysqli($server, $usuario, $password, $database);
if(mysqli_connect_error()){
	echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
}

?>