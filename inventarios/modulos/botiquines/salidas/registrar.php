<?php
require_once("../../../../db/conexion.php");

if (isset($_POST['input'])) {

    $id_elementos    = mysqli_real_escape_string($conexion, (strip_tags($_POST['producto_id'], ENT_QUOTES)));
    $cantidad    = mysqli_real_escape_string($conexion, (strip_tags($_POST['cantidad'], ENT_QUOTES)));
    $comentario    = mysqli_real_escape_string($conexion, (strip_tags($_POST['comentario'], ENT_QUOTES)));
    $fechaSale = date("Y-m-d H:i:s");

    $insert = mysqli_query($conexion, "INSERT INTO salidasbotiquin(id_elementos, cantidad, comentario, fechaSale)
															VALUES('$id_elementos', '$cantidad', '$comentario', '$fechaSale')") or die(mysqli_error($conexion));
    $actualizar_cantidad = mysqli_query($conexion, "UPDATE elementosbotiquines SET cantidad = cantidad - $cantidad WHERE id_elementos = $id_elementos") or die(mysqli_error($conexion));

    if ($insert && $actualizar_cantidad) {
        session_start();
        $_SESSION['registro_salida'] = true;
        header('Location:index.php');
    } else {
        echo '
            <script>
                alert("Error, no se pudieron ingresar los datos");
                window.location.href = "index.php";
            </script>';
    }
}
