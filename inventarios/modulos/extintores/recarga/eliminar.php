<?php
include('../../../../db/conexion.php');

if (isset($_GET['action']) == 'delete') {

    $id_delete = intval($_GET['ExtintorID']);

    $query = mysqli_query($conexion, "SELECT * FROM extintores WHERE ExtintorID='$id_delete'");
    if (mysqli_num_rows($query) == 0) {
    } else {
        $delete = mysqli_query($conexion, "DELETE FROM extintores WHERE ExtintorID='$id_delete'");
        if ($delete) {
            session_start();
            $_SESSION['eliminar_extintor'] = true;
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
?>