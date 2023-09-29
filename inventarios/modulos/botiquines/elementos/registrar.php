<?php
include "../../../../db/conexion.php";

if (isset($_POST['input'])) {

    $id_botiquin = $conexion->real_escape_string($_POST['id_botiquin']);

    $ImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
    $ImagenContenido = addslashes(file_get_contents($ImagenReferencia));

    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $cantidad = $conexion->real_escape_string($_POST['cantidad']);
    $ubicacion = $conexion->real_escape_string($_POST['ubicacion']);
    $ubicacionEspecifica = $conexion->real_escape_string($_POST['ubicacionEspecifica']);
    $estado = $conexion->real_escape_string($_POST['estado']);
    $fechaRegistro = $conexion->real_escape_string($_POST['fechaRegistro']);
    $fechaVencimiento = $conexion->real_escape_string($_POST['fechaVencimiento']);
    $comentarios = $conexion->real_escape_string($_POST['comentarios']);

    $stmt = $conexion->query("INSERT INTO elementosbotiquines (id_botiquin, ImagenReferencia, nombre, cantidad, ubicacion, ubicacionEspecifica, 
					estado, fechaRegistro, fechaVencimiento, comentarios) VALUES ('$id_botiquin', '$ImagenContenido', '$nombre', '$cantidad', '$ubicacion', '$ubicacionEspecifica', '$estado', '$fechaRegistro', '$fechaVencimiento', '$comentarios')");

    if ($stmt) {
        echo '
        <script>
            alert("Bien hecho, los datos han sido agregados correctamente.")
            window.location.href = "index.php";
        </script>';
    } else {
        echo '
            <script>
                alert("Error, no se pudieron ingresar los datos");
                window.location.href = "index.php";
            </script>';
    }
}