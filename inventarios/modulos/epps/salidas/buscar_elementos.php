<?php
// Conexión a la base de datos
include '../../../../db/conexion.php';

$query = $_GET["q"];

// Consulta SQL para buscar productos que coincidan con la entrada del usuario
$sql = "SELECT ID_Implementos, nombre FROM tblimplementos WHERE nombre LIKE '%$query%' LIMIT 10";
$resultado = $conexion->query($sql);

$productos = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }
}

echo json_encode($productos);

$conexion->close();