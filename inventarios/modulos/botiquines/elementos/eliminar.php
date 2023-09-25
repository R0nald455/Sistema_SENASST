<?php
include "../../../../db/conexion.php";

if (isset($_GET['action']) == 'delete') {
    $id_delete = intval($_GET['id_elementos']);
    $query = mysqli_query($conexion, "SELECT * FROM elementosbotiquines WHERE id_elementos='$id_delete'");
    if (mysqli_num_rows($query) == 0) {
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
    } else {
        $delete = mysqli_query($conexion, "DELETE FROM elementosbotiquines WHERE id_elementos='$id_delete'");
        if ($delete) {
            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
        }
    }
}
