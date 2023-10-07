<?php
require_once("../../../db/conexion.php");


if (isset($_POST['input'])) {

    $ImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
    $ImagenContenido = addslashes(file_get_contents($ImagenReferencia));

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

    $FechaRegistro = date("Y-m-d H:i:s");

    $stmt = $conexion->query("INSERT INTO camillas (ImagenReferencia, TipoCamilla, Señalizacion, Acceso, EstadoSoporte, CorreasSeguridad, Inmovilizador, Limpieza, InstalacionPared, UbicacionActual, FechaAdquisicion, FechaUltimoMantenimiento, FechaProximoMantenimiento, Observaciones, FechaRegistro) VALUES ('$ImagenContenido', '$TipoCamilla', '$Señalizacion', '$Acceso', '$EstadoSoporte', '$CorreasSeguridad', '$Inmovilizador', '$Limpieza', '$InstalacionPared', '$UbicacionActual', '$FechaAdquisicion', '$FechaUltimoMantenimiento', '$FechaProximoMantenimiento', '$Observaciones', '$FechaRegistro')");
    if ($stmt) {
        session_start();
        $_SESSION['registro_camilla'] = true;
        header('Location:index.php');
    } else {
        echo '<script>
                alert("Error al ingresar los datos.")
                window.location.href="index.php";
                </script>';
    }
}
?>