<?php

if (isset($_POST['input'])) {
    $id_implementos = mysqli_real_escape_string($conexion, (strip_tags($_POST['producto_id'], ENT_QUOTES)));
    $id_empleado = mysqli_real_escape_string($conexion, (strip_tags($_POST['empleado_id'], ENT_QUOTES)));
    $cantidad = mysqli_real_escape_string($conexion, (strip_tags($_POST['cantidad'], ENT_QUOTES)));
    $descripcion = mysqli_real_escape_string($conexion, (strip_tags($_POST['descripcion'], ENT_QUOTES)));
    $fecha = date("Y-m-d H:i:s");

    $insert = mysqli_query($conexion, "INSERT INTO tblentradas(ID_Implementos, ID_Empleado, Cantidad, Descripcion, Fecha)
															VALUES('$id_implementos', '$id_empleado', '$cantidad', '$descripcion', '$fecha')") or die(mysqli_error($conexion));
    $actualizar_cantidad = mysqli_query($conexion, "UPDATE tblimplementos SET cantidad = cantidad + $cantidad WHERE ID_Implementos = $id_implementos") or die(mysqli_error($conexion));

    if ($insert && $actualizar_cantidad) {
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