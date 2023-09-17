<?php

if (isset($_GET['action']) == 'delete') {
    $id_delete = intval($_GET['ExtintorID']);
    $query = mysqli_query($conexion, "SELECT * FROM extintores WHERE ExtintorID='$id_delete'");
    if (mysqli_num_rows($query) == 0) {
    } else {
        $delete = mysqli_query($conexion, "DELETE FROM extintores WHERE ExtintorID='$id_delete'");
        if ($delete) {
            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></button>Bien hecho, los datos han sido eliminados correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></button> Error, no se pudo eliminar los datos.</div>';
        }
    }
}
?>