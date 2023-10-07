<?php
include "../../../../db/conexion.php";


if (isset($_GET['action']) == 'delete') {
    $id_delete = intval($_GET['id_entradas']);
    $query = mysqli_query($conexion, "SELECT * FROM entradasbotiquin WHERE id_entradas='$id_delete'");
    if (mysqli_num_rows($query) == 0) {
    } else {
        $delete = mysqli_query($conexion, "DELETE FROM entradasbotiquin WHERE id_entradas='$id_delete'");
        if ($delete) {
            session_start();
            $_SESSION['eliminar_entrada'] = true;
            header('Location:index.php');
        } else {
            echo '
            <script>
                alert("Error, no se pudieron eliminar los datos");
                window.location.href = "index.php";
            </script>';
        }
    }
}