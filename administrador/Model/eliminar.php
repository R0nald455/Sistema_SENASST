<?php

require_once ("../../db/conexion.php");

$id = $_GET['id'];
$consulta = "DELETE FROM user WHERE id = $id";
mysqli_query($conexion, $consulta);
header('Location: ../View/user.php');

?>