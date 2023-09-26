<?php
require_once("../../../../db/conexion.php");

if (isset($_GET['action']) == 'delete') {
    $id_delete = intval($_GET['id_salidas']);
    $query = mysqli_query($conexion, "SELECT * FROM salidasbotiquin WHERE id_salidas='$id_delete'");
    if (mysqli_num_rows($query) == 0) {
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
    } else {
        $delete = mysqli_query($conexion, "DELETE FROM salidasbotiquin WHERE id_salidas='$id_delete'");
        if ($delete) {
            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, la salida ha sido eliminada correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar la salida.</div>';
        }
    }
}
