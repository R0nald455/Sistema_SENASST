<?php
include '../../db/conexion.php';
error_reporting(0);
if (isset($_POST['btn_editar'])) {
    $id = $_POST['id'];
    $tablaName = $_POST['miCombo'];
    $num_resol = $_POST['num_resol'];
    $concepto = $_POST['concepto'];
    $descripcion = $_POST['descripcion'];

    // Quita los corchetes y escapa las variables
    $num_resol = mysqli_real_escape_string($conexion, $num_resol);
    $concepto = mysqli_real_escape_string($conexion, $concepto);
    $descripcion = mysqli_real_escape_string($conexion, $descripcion);

    $query = "UPDATE $tablaName SET `num_resol`='$num_resol', `concepto`='$concepto', `descripcion`='$descripcion' WHERE id=$id";

    $resultado = mysqli_query($conexion, $query); // Ejecuta la consulta SQL


    if ($resultado) {
        echo "<center><h1>Registro editado correctamente</h1></center>";
        // Redirige al usuario a otro archivo después de 2 segundos
        header("refresh:2;url=../editar.php");
        exit(); // Asegura que no se ejecuten más instrucciones
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
}
?>