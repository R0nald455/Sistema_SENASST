<?php
include '../../../db/conexion.php';

if (isset($_POST['input'])) {

    $ImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
    $ImagenContenido = addslashes(file_get_contents($ImagenReferencia));
    
    $nombre = mysqli_real_escape_string($conexion, (strip_tags($_POST['nombre'], ENT_QUOTES)));
    $descripcion = mysqli_real_escape_string($conexion, (strip_tags($_POST['descripcion'], ENT_QUOTES)));
    $categoria = mysqli_real_escape_string($conexion, (strip_tags($_POST['categoria'], ENT_QUOTES)));
    $cantidad = mysqli_real_escape_string($conexion, (strip_tags($_POST['cantidad'], ENT_QUOTES)));
    $ubicacion = mysqli_real_escape_string($conexion, (strip_tags($_POST['ubicacion'], ENT_QUOTES)));
    $fecha = date("Y-m-d H:i:s");

    $insert = mysqli_query($conexion, "INSERT INTO tblimplementos(ImagenReferencia, Nombre, Descripcion, Categoria, Cantidad, Ubicacion, Fecha)
															VALUES('$ImagenContenido', '$nombre', '$descripcion', '$categoria', '$cantidad', '$ubicacion', '$fecha')") or die(mysqli_error($conexion));
    if ($insert) {
        echo '<script>
        alert("Bien hecho, los datos han sido agregados correctamente.")
        window.location.href = "index.php";
    </script>';
    } else {
        echo '<script>
        alert("Error, no se pudieron ingresar los datos");
        window.location.href = "index.php";
    </script>';
    }

}
?>