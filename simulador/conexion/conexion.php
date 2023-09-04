<?php
$server="localhost:3306";
$pwd="";
$usuario="root";
$basedatos="sena";

$conex = new mysqli($server, $usuario, $pwd, $basedatos);
$con = new mysqli($server, $usuario, $pwd, $basedatos);

// if ($conex) {
//     echo "Todo correcto :)";
// }else {
//     echo "Ha ocurrido un error";
// }
?>