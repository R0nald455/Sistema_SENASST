<?php 
$servidor = "localhost:3307";
$contrasena = "";
$usuario    = "root";
$nombre_bd  = "sstcba";

$con = mysqli_connect($servidor,$usuario, $contrasena, $nombre_bd) or die(mysqli_error());

// if($con){
//     echo"funciono conexión";
// } else {
//     echo"pailander conexión";
// }

?>

