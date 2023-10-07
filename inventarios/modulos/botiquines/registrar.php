<?php
include "../../../db/conexion.php";

if (isset($_POST['input'])) {

    $ImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
    $ImagenContenido = addslashes(file_get_contents($ImagenReferencia));

    $Nombre = $conexion->real_escape_string($_POST['Nombre']);
    $Ubicacion = $conexion->real_escape_string($_POST['Ubicacion']);
    $UbicacionEspecifica = $conexion->real_escape_string($_POST['UbicacionEspecifica']);
    $FechaUltima = $conexion->real_escape_string($_POST['FechaUltima']);
    $FechaRevision = $conexion->real_escape_string($_POST['FechaRevision']);
    $Responsable = $conexion->real_escape_string($_POST['Responsable']);
    $Comentarios = $conexion->real_escape_string($_POST['Comentarios']);


    $stmt = $conexion->query("INSERT INTO botiquines (ImagenReferencia, Nombre, Ubicacion, UbicacionEspecifica, FechaUltima, FechaRevision, Responsable, Comentarios) VALUES ('$ImagenContenido', '$Nombre', '$Ubicacion', '$UbicacionEspecifica', '$FechaUltima', '$FechaRevision', '$Responsable', '$Comentarios')");

    if ($stmt) {
        session_start();
        $_SESSION['registro_botiquin'] = true;
        header('Location:index.php');
    } else {
        echo '
        <script>
            alert("Error, no se pudieron ingresar los datos");
            window.location.href = "index.php";
        </script>';
    }


}
