<?php

include("../conexion/connection.php");


$id=$_POST["id"];
$articulo = $_POST['articulo'];
$cantidad = $_POST['cantidad'];

$sql="UPDATE inventariosalon SET articulo='$articulo', cantidad='$cantidad' WHERE id='$id'";
$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: ../indexCrud.php");
}else{

}

?>