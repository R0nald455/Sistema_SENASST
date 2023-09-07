<?php
include("../../../db/conexionPDO.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomCargo = $_POST['nom_cargo'];
    $elemento = $_POST['elemento'];
    $cantidadEle = $_POST['cantidad_ele'];

    try {
        $consultaUltimoID = "SELECT MAX(id_cargo) AS ultimo_id FROM cargo";
        $resultadoUltimoID = $conexion->query($consultaUltimoID);
        $ultimoID = $resultadoUltimoID->fetchColumn();
        $nuevoIDCargo = $ultimoID + 1;

        $consultaUltimoCodigo = "SELECT MAX(Codigo_ele) AS max_codigo FROM cargo WHERE id_cargo = ?";
        $resultadoUltimoCodigo = $conexion->prepare($consultaUltimoCodigo);
        $resultadoUltimoCodigo->execute([$nuevoIDCargo]);
        $ultimoCodigo = $resultadoUltimoCodigo->fetchColumn();

        $nuevoCodigo = str_pad($ultimoCodigo + 1, 3, '0', STR_PAD_LEFT);

        $sql = "INSERT INTO cargo (id_cargo, nom_cargo, Codigo_ele, elemento, cantidad_ele)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conexion->prepare($sql);
        $stmt->execute([$nuevoIDCargo, $nomCargo, $nuevoCodigo, $elemento, $cantidadEle]);

        header("location: editE.php?id=$nuevoIDCargo");
        exit;
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }

    $conexion = null;
}
?>

<!-- Modal Create Elementos -->
<div class="modal fade" id="createE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Elemento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <label for="nom_cargo">Nombre Cargo</label>
          <input type="text" name="nom_cargo" class="form-control" id="nom_cargo" placeholder="Nombre Del Cargo" required>

          <label for="elemento">Elemento</label>
          <input type="text" name="elemento" class="form-control" id="elemento" placeholder="Elemento nuevo" required>

          <label for="cantidad_ele">Cantidad</label>
          <input type="number" name="cantidad_ele" class="form-control" id="cantidad_ele" placeholder="Cantidad Del Elemento" required>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
