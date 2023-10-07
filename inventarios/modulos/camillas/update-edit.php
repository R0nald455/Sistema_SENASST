<?php
include "../../../db/conexion.php";

if (isset($_POST['update'])) {

    $CamillaID = intval($_POST['CamillaID']);

    $TipoCamilla = $conexion->real_escape_string($_POST['TipoCamilla']);
    $Señalizacion = $conexion->real_escape_string($_POST['Señalizacion']);
    $Acceso = $conexion->real_escape_string($_POST['Acceso']);
    $EstadoSoporte = $conexion->real_escape_string($_POST['EstadoSoporte']);
    $CorreasSeguridad = $conexion->real_escape_string($_POST['CorreasSeguridad']);
    $Inmovilizador = $conexion->real_escape_string($_POST['Inmovilizador']);
    $Limpieza = $conexion->real_escape_string($_POST['Limpieza']);
    $InstalacionPared = $conexion->real_escape_string($_POST['InstalacionPared']);
    $UbicacionActual = $conexion->real_escape_string($_POST['UbicacionActual']);
    $FechaAdquisicion = $conexion->real_escape_string($_POST['FechaAdquisicion']);
    $FechaUltimoMantenimiento = $conexion->real_escape_string($_POST['FechaUltimoMantenimiento']);
    $FechaProximoMantenimiento = $conexion->real_escape_string($_POST['FechaProximoMantenimiento']);
    $Observaciones = $conexion->real_escape_string($_POST['Observaciones']);

    if (isset($_FILES['ImagenReferencia']['tmp_name']) && !empty($_FILES['ImagenReferencia']['tmp_name'])) {

        $NuevaImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
        $NuevaImagenContenido = addslashes(file_get_contents($NuevaImagenReferencia));

        $update = mysqli_query($conexion, "UPDATE camillas SET ImagenReferencia='$NuevaImagenContenido', TipoCamilla='$TipoCamilla', Señalizacion='$Señalizacion', Acceso='$Acceso', EstadoSoporte='$EstadoSoporte', CorreasSeguridad='$CorreasSeguridad', Inmovilizador='$Inmovilizador', Limpieza='$Limpieza', InstalacionPared='$InstalacionPared', UbicacionActual='$UbicacionActual', FechaAdquisicion='$FechaAdquisicion', FechaUltimoMantenimiento='$FechaUltimoMantenimiento', FechaProximoMantenimiento = '$FechaProximoMantenimiento', Observaciones='$Observaciones' WHERE CamillaID='$CamillaID'");
    } else {
        // No se cargó una nueva imagen, mantener la imagen actual en la base de datos
        $update = mysqli_query($conexion, "UPDATE camillas SET TipoCamilla='$TipoCamilla', Señalizacion='$Señalizacion', Acceso='$Acceso', EstadoSoporte='$EstadoSoporte', CorreasSeguridad='$CorreasSeguridad', Inmovilizador='$Inmovilizador', Limpieza='$Limpieza', InstalacionPared='$InstalacionPared', UbicacionActual='$UbicacionActual', FechaAdquisicion='$FechaAdquisicion', FechaUltimoMantenimiento='$FechaUltimoMantenimiento', FechaProximoMantenimiento = '$FechaProximoMantenimiento', Observaciones='$Observaciones' WHERE CamillaID='$CamillaID'");
    }

    if ($update) {
        session_start();
        $_SESSION['actualizar_camilla'] = true;
        header('Location:index.php');
    } else {
        echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
    }
}
?>