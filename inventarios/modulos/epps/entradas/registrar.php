<?php

if (isset($_POST['input'])) {
    $id_entradas = mysqli_real_escape_string($conexion, (strip_tags($_POST['ID_Entradas'], ENT_QUOTES)));
    $id_implementos = mysqli_real_escape_string($conexion, (strip_tags($_POST['producto_id'], ENT_QUOTES)));
    $cantidad = mysqli_real_escape_string($conexion, (strip_tags($_POST['cantidad'], ENT_QUOTES)));
    $descripcion = mysqli_real_escape_string($conexion, (strip_tags($_POST['descripcion'], ENT_QUOTES)));
    $fecha = date("Y-m-d H:i:s");

    $insert = mysqli_query($conexion, "INSERT INTO tblentradas(ID_Entradas, ID_Implementos, Cantidad, Descripcion, Fecha)
															VALUES('$id_entradas', '$id_implementos', '$cantidad', '$descripcion', '$fecha')") or die(mysqli_error($conexion));
    $actualizar_cantidad = mysqli_query($conexion, "UPDATE tblimplementos SET cantidad = cantidad + $cantidad WHERE ID_Implementos = $id_implementos") or die(mysqli_error($conexion));

    if ($insert && $actualizar_cantidad) {
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, la entrada ha sido ingresada correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar la entrada.</div>';
    }

}
?>