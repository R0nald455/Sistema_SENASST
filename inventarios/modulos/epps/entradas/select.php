<?php
include('../../../../db/conexion.php');

$searchTerm = $_GET['q'];

// Utilizar una consulta preparada para seguridad
$sql = "SELECT * FROM TblImplementos WHERE Nombre LIKE ? ORDER BY Nombre ASC LIMIT 0, 10";
$stmt = $conexion->prepare($sql);
$searchPattern = "%$searchTerm%";
$stmt->bind_param("s", $searchPattern);
$stmt->execute();
$result = $stmt->get_result();

$json = [];

while($row = $result->fetch_assoc()){
    $json[] = ['id' => $row['ID_Implementos'], 'text' => $row['Nombre']];
}

echo json_encode($json);

$stmt->close();
$conexion->close();
?>