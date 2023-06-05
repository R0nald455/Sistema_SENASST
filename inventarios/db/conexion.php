<?php

$Server="localhost:3307";
$Usuario="root";
$Password="";
$Database="inventarios";
$conex=new mysqli($Server, $Usuario, $Password, $Database);

$tablaImplementos = "TblImplementos";
$tablaEntradas = "TblEntradas";
$tablaSalidas = "TblSalidas";


if ($conex){
    echo "Conexion exitosa <br>";
} else {
    echo "No se ha podido conectar <br>";
}


?>