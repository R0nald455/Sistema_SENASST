<?php

include("../conexion/connection.php");


$id=$_GET["id"];

$sql="DELETE FROM inventariosalon WHERE id='$id'";
$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: ../indexCrud.php");
}else{

}

?>