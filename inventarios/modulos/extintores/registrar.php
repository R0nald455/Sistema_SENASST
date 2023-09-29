<?php
include "../../../db/conexion.php";

if (isset($_POST['input'])) {

    $NumeroDeSerie = $conexion->real_escape_string($_POST['NumeroDeSerie']);
    $TipoDeExtintor = $conexion->real_escape_string($_POST['TipoDeExtintor']);
    $FechaDeFabricacion = $conexion->real_escape_string($_POST['FechaDeFabricacion']);
    $FechaDeCompra = $conexion->real_escape_string($_POST['FechaDeCompra']);
    $Ubicacion = $conexion->real_escape_string($_POST['Ubicacion']);
    $UbicacionEspecifica = $conexion->real_escape_string($_POST['UbicacionEspecifica']);
    $UltimaRecarga = $conexion->real_escape_string($_POST['UltimaRecarga']);
    $ProximaRecarga = $conexion->real_escape_string($_POST['ProximaRecarga']);
    $Comentarios = $conexion->real_escape_string($_POST['Comentarios']);

    $ImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
    $ImagenContenido = addslashes(file_get_contents($ImagenReferencia));

    $FechaDeRegistro = date("Y-m-d H:i:s");

    $stmt = $conexion->query("INSERT INTO extintores (NumeroDeSerie, TipoDeExtintor, FechaDeFabricacion, FechaDeCompra, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios, ImagenReferencia, FechaDeRegistro) VALUES ('$NumeroDeSerie', '$TipoDeExtintor', '$FechaDeFabricacion', '$FechaDeCompra', '$Ubicacion', '$UbicacionEspecifica', '$UltimaRecarga', '$ProximaRecarga', '$Comentarios', '$ImagenContenido', '$FechaDeRegistro')");

    if ($stmt) {
        session_start();
        $_SESSION['registro_extintor'] = true;
        header('Location:index.php');

    } else {
        echo '
        <script>
            alert("Error, no se pudieron ingresar los datos");
            window.location.href = "index.php";
        </script>';
    }


}
?>