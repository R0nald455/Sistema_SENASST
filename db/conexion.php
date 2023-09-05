<?php

$server="localhost:3307";
$usuario="root";
$password="";
$database="sstcba";
$conexion=new mysqli($server, $usuario, $password, $database);
if(mysqli_connect_error()){
	echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
}

?>