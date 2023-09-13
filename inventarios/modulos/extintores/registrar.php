<?php
require_once("../../../db/conexion.php");


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

    // $insert = mysqli_query($conexion, "INSERT INTO extintores( NumeroDeSerie, TipoDeExtintor, FechaDeFabricacion, FechaDeCompra, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios, ImagenReferencia, FechaDeRegistro)
    // 											VALUES('$NumeroDeSerie', '$TipoDeExtintor', '$FechaDeFabricacion', '$FechaDeCompra', '$Ubicacion', '$UbicacionEspecifica', '$UltimaRecarga', '$ProximaRecarga', '$Comentarios', '$ImagenReferencia', '$FechaDeRegistro')") or die(mysqli_error($conexion));
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
?>