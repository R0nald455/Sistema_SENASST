<?php
include("../../conexion.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $stm = $conexion->prepare("SELECT * FROM asignacion WHERE id_per=:id_per");
  $stm->bindParam(":id_per", $id);
  $stm->execute();
  $registros = $stm->fetchAll(PDO::FETCH_ASSOC);
}

if ($_POST) {
    // Iterar sobre los registros y actualizar las cantidades correspondientes
    foreach ($registros as $registro) {
        $dotacion = $registro['Dotacion'];
        $cantidad = $_POST[$dotacion];

        // Actualizar la cantidad
        $stm = $conexion->prepare("UPDATE asignacion SET Cantidad = :cantidad WHERE id_per = :id AND Dotacion = :dotacion");
        $stm->bindParam(":cantidad", $cantidad);
        $stm->bindParam(":id", $id);
        $stm->bindParam(":dotacion", $dotacion);
        $stm->execute();
    }

    // Eliminar registros si se hicieron clic en los botones correspondientes
    if (!empty($_POST['eliminar_id'])) {
        $eliminarIds = $_POST['eliminar_id'];

        foreach ($eliminarIds as $eliminarIndex) {
            $dotacionEliminar = $registros[$eliminarIndex]['Dotacion'];

            echo "<script>";
            echo "if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {";
            echo "  document.getElementById('eliminar_form_$eliminarIndex').submit();";
            echo "}";
            echo "</script>";

            echo "<form id='eliminar_form_$eliminarIndex' action='' method='post' style='display: none;'>";
            echo "  <input type='hidden' name='eliminar_id[]' value='$eliminarIndex'>";
            echo "</form>";
        }
    }

    header("location: index.php");
    exit;
}
?>

<?php include("../../template/header.php"); ?>

<form action="" method="post">
  <input type="hidden" class="form-control" name="txtid" value="<?php echo $id; ?>">

  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Documento</th>
        <th>Cargo</th>
        <th>Dotación</th>
        <th>Cantidad</th>
        <th>Fechas de Entregas</th>
        <!--<th></th>-->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($registros as $index => $registro) { ?>
        <tr id="fila-<?php echo $index; ?>">
          <td><?php echo $registro['id_per']; ?></td>
          <td><?php echo $registro['nom_per']; ?></td>
          <td><?php echo $registro['ape_per']; ?></td>
          <td><?php echo $registro['doc_per']; ?></td>
          <td><?php echo $registro['nom_cargo']; ?></td>
          <td><?php echo $registro['Dotacion']; ?></td>
          <td><?php echo $registro['Cantidad']; ?></td>
          <td><?php echo $registro['Fecha']; ?></td>
          <!--<td>
            <button type="submit" name="eliminar_id[]" value="<?php echo $index; ?>" class="btn btn-outline-danger btn-eliminar"><i class="far fa-trash-alt"></i></button>
          </td>-->
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <br>
  <div class="modal-footer">
    <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
    <!--<button type="submit" class="btn btn-outline-success">Actualizar</button>-->
  </div>
</form>

<?php include("../../template/footer.php"); ?>