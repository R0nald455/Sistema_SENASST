<?php
include "../../../../db/conexion.php";


if (isset($_GET['action']) == 'delete') {
    $id_delete = intval($_GET['id_entradas']);
    $query = mysqli_query($conexion, "SELECT * FROM entradasbotiquin WHERE id_entradas='$id_delete'");
    if (mysqli_num_rows($query) == 0) {
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
    } else {
        $delete = mysqli_query($conexion, "DELETE FROM entradasbotiquin WHERE id_entradas='$id_delete'");
        if ($delete) {
            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, la entrada ha sido eliminada correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar la entrada.</div>';
        }
    }
}