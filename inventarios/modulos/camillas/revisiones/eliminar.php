<?php

if (isset($_GET['action']) == 'delete') {
    $id_delete = intval($_GET['CamillaID']);
    $query = mysqli_query($conexion, "SELECT * FROM camillas WHERE CamillaID='$id_delete'");
    if (mysqli_num_rows($query) == 0) {
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
    } else {
        $delete = mysqli_query($conexion, "DELETE FROM camillas WHERE CamillaID='$id_delete'");
        if ($delete) {
            session_start();
            $_SESSION['eliminar_camilla'] = true;
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