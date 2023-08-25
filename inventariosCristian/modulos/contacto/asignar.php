<?php
include("../../conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stm = $conexion->prepare("SELECT * FROM personas INNER JOIN cargo ON personas.id_cargo_per = cargo.id_cargo WHERE id_per=:id_per");
    $stm->bindParam(":id_per", $id);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_ASSOC);
    $selectedCargo = $registro['id_cargo_per'];

    $stm_elementos = $conexion->prepare("SELECT elemento, cantidad_ele FROM cargo WHERE id_cargo = :id_cargo");
    $stm_elementos->bindParam(':id_cargo', $selectedCargo, PDO::PARAM_INT);
    $stm_elementos->execute();
    $elementos = $stm_elementos->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_per = $_POST['txtid'];
    $elemento_per = $_POST['elemento_per'];
    $cantidad_per = min($_POST['cantidad_per'], $elementos[0]['cantidad_ele']);
    $fecha_actual = date('Y-m-d');

    // Restar la cantidad asignada del inventario disponible en la tabla cargo
    $nueva_cantidad_disponible = 0;
    
    foreach ($elementos as $elemento) {
        if ($elemento['elemento'] === $elemento_per) {
            $nueva_cantidad_disponible = $elemento['cantidad_ele'] - $cantidad_per;
            break;
        }
    }

    $elemento_actualizar = $elemento_per; // Identificador del elemento a actualizar

    $stm_actualizar_cantidad = $conexion->prepare("UPDATE cargo SET cantidad_ele = :nueva_cantidad_disponible WHERE id_cargo = :id_cargo AND elemento = :elemento");
    $stm_actualizar_cantidad->bindParam(":nueva_cantidad_disponible", $nueva_cantidad_disponible);
    $stm_actualizar_cantidad->bindParam(":id_cargo", $selectedCargo);
    $stm_actualizar_cantidad->bindParam(":elemento", $elemento_actualizar);
    $stm_actualizar_cantidad->execute();

    // Insertar la asignación en la tabla asignacion
    $stm_insertar = $conexion->prepare("INSERT INTO asignacion (id_per, nom_per, ape_per, doc_per, nom_cargo, Dotacion, Cantidad, Fecha) VALUES (:id_per, :nom_per, :ape_per, :doc_per, :nom_cargo, :elemento, :cantidad, :fecha_actual)");
    $stm_insertar->bindParam(":id_per", $registro['id_per']);
    $stm_insertar->bindParam(":nom_per", $registro['nom_per']);
    $stm_insertar->bindParam(":ape_per", $registro['ape_per']);
    $stm_insertar->bindParam(":doc_per", $registro['doc_per']);
    $stm_insertar->bindParam(":nom_cargo", $registro['nom_cargo']);
    $stm_insertar->bindParam(":elemento", $elemento_per);
    $stm_insertar->bindParam(":cantidad", $cantidad_per);
    $stm_insertar->bindParam(":fecha_actual", $fecha_actual);
    $stm_insertar->execute();

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
                <th>Elemento para Asignar</th>
                <th>Cantidad Disponible</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $registro['id_per']; ?></td>
                <td><?php echo $registro['nom_per']; ?></td>
                <td><?php echo $registro['ape_per']; ?></td>
                <td><?php echo $registro['doc_per']; ?></td>
                <td><?php echo $registro['nom_cargo']?></td>
                <td>
                    <select class="form-select" id="elemento_per" name="elemento_per" required>
                        <option selected disabled>Elije</option>
                        <?php foreach ($elementos as $elemento) { echo '<option value="' . $elemento['elemento'] . '">' . $elemento['elemento'] . '</option>'; } ?>
                    </select>
                </td>
                <td><input id="cantidad_disponible" name="cantidad_disponible" type="text" disabled></td>
                <td><input id="cantidad_per" name="cantidad_per" type="number" min="0" pattern="^[0-9]+" max="<?php echo $elementos[0]['cantidad_ele']; ?>"></td>
            </tr>
        </tbody>
    </table>
    <br>
    <div class="modal-footer">
        <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-outline-success">Asignar</button>
    </div>
</form>

<script>
    document.getElementById('elemento_per').addEventListener('change', function() {
        var selectedElement = this.value;
        var elementData = <?php echo json_encode($elementos); ?>;
        var cantidadDisponibleInput = document.getElementById('cantidad_disponible');
        for (var i = 0; i < elementData.length; i++) {
            if (elementData[i]['elemento'] === selectedElement) {
                cantidadDisponibleInput.value = elementData[i]['cantidad_ele'];
                break;
            }
        }
    });
</script>

<?php include("../../template/footer.php"); ?>
