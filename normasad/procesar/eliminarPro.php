<?php
include '../../db/conexion.php';
error_reporting(0);
if (isset($_POST['btn_eliminar'])) {
    $id = $_POST['id'];
    $tablaName = $_POST['miCombo'];

    $query = "DELETE FROM $tablaName where id=$id";

    $resultado = mysqli_query($conexion, $query); // Ejecuta la consulta SQL

    if ($resultado) {
        echo "<center><h1>Registro eliminado correctamente</h1></center>";
        // Redirige al usuario a otro archivo después de 2 segundos
        header("refresh:2;url=../eliminar.php");
        exit(); // Asegura que no se ejecuten más instrucciones
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
}
?>