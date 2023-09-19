<?php

// Conexión a la base de datos
include '../../../../db/conexion.php';

$query = $_GET["q"];

// Consulta SQL para buscar productos que coincidan con la entrada del usuario
$sql = "SELECT id, nombre FROM user WHERE nombre LIKE '%$query%' LIMIT 10";
$resultado = $conexion->query($sql);

$empleados = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $empleados[] = $fila;
    }
}

echo json_encode($empleados);

$conexion->close();