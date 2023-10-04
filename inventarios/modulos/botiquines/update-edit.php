<?php
include "../../../db/conexion.php";

if (isset($_POST['update'])) {

    $ID = intval($_POST['ID']);

    $Nombre = $conexion->real_escape_string($_POST['Nombre']);
    $Ubicacion = $conexion->real_escape_string($_POST['Ubicacion']);
    $UbicacionEspecifica = $conexion->real_escape_string($_POST['UbicacionEspecifica']);
    $FechaUltima = $conexion->real_escape_string($_POST['FechaUltima']);
    $FechaRevision = $conexion->real_escape_string($_POST['FechaRevision']);
    $Responsable = $conexion->real_escape_string($_POST['Responsable']);
    $Comentarios = $conexion->real_escape_string($_POST['Comentarios']);

    if (isset($_FILES['ImagenReferencia']['tmp_name']) && !empty($_FILES['ImagenReferencia']['tmp_name'])) {

        $NuevaImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
        $NuevaImagenContenido = addslashes(file_get_contents($NuevaImagenReferencia));

        $update = mysqli_query($conexion, "UPDATE botiquines SET ImagenReferencia='$NuevaImagenContenido', Nombre='$Nombre', Ubicacion='$Ubicacion', UbicacionEspecifica='$UbicacionEspecifica', FechaUltima='$FechaUltima', FechaRevision='$FechaRevision', Responsable='$Responsable', Comentarios='$Comentarios' WHERE ID='$ID'");
    } else {
        // No se cargó una nueva imagen, mantener la imagen actual en la base de datos
        $update = mysqli_query($conexion, "UPDATE botiquines SET Nombre='$Nombre', Ubicacion='$Ubicacion', UbicacionEspecifica='$UbicacionEspecifica', FechaUltima='$FechaUltima', FechaRevision='$FechaRevision', Responsable='$Responsable', Comentarios='$Comentarios' WHERE ID='$ID'");
    }

    if ($update) {
        session_start();
        $_SESSION['actualizar_botiquin'] = true;
        header('Location:index.php');
    } else {
        echo "<script>alert('Error, no se pudo actualizar los datos'); window.location.href = 'index.php'</script>";
    }
}
