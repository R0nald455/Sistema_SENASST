<?php

include_once '../db/conexion.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idImagen = $_GET['id'];
    
    $query = "SELECT imagen FROM tobservacion WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "i", $idImagen);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $imagenBinaria);
    // Extraemos los datos de la imagen
    if (mysqli_stmt_fetch($stmt)) {

        header("Content-type: image/jpeg"); 
        
        echo $imagenBinaria;
    } else {
        echo "Imagen no encontrada.";
    }
    
    mysqli_stmt_close($stmt);
}

mysqli_close($conexion);
?>
