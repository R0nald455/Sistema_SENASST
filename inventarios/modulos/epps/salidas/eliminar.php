<?php
if (isset($_GET['action']) == 'delete') {
    $id_delete = intval($_GET['ID_Salidas']);
    $query = mysqli_query($conexion, "SELECT * FROM tblsalidas WHERE ID_Salidas='$id_delete'");
    if (mysqli_num_rows($query) == 0) {
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
    } else {
        $delete = mysqli_query($conexion, "DELETE FROM tblsalidas WHERE ID_Salidas='$id_delete'");
        if ($delete) {
            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, la salida ha sido eliminada correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar la salida.</div>';
        }
    }
}
?>