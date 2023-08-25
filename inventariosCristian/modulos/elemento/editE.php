<?php
include("../../conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Visualizar Datos para Editar
    $stm = $conexion->prepare("SELECT * FROM cargo WHERE id_cargo=:id_cargo");
    $stm->bindParam(":id_cargo", $id);
    $stm->execute();
    $registros = $stm->fetchAll(PDO::FETCH_ASSOC);
}

if ($_POST) {
    // Iterar sobre los registros y actualizar las cantidades correspondientes
    foreach ($registros as $registro) {
        $elemento = $registro['elemento'];
        $cantidad = $_POST[$elemento];

        // Actualizar la cantidad
        $stm = $conexion->prepare("UPDATE cargo SET cantidad_ele = :cantidad WHERE id_cargo = :id AND elemento = :elemento");
        $stm->bindParam(":cantidad", $cantidad);
        $stm->bindParam(":id", $id);
        $stm->bindParam(":elemento", $elemento);
        $stm->execute();
    }

    // Obtener el último valor de Código Ele para el cargo actual
    $ultimoCodigoEle = $conexion->prepare("SELECT Codigo_ele FROM cargo WHERE id_cargo = :id ORDER BY Codigo_ele DESC LIMIT 1");
    $ultimoCodigoEle->bindParam(":id", $id);
    $ultimoCodigoEle->execute();
    $ultimoCodigoEle = $ultimoCodigoEle->fetchColumn();

    if (empty($ultimoCodigoEle)) {
        $nuevoCodigoEle = '001'; // Valor predeterminado si no hay registros anteriores para el cargo
    } else {
        $nuevoCodigoEleInt = intval($ultimoCodigoEle) + 1;
        $nuevoCodigoEle = str_pad((string)$nuevoCodigoEleInt, 3, '0', STR_PAD_LEFT);
    }

    // Insertar un nuevo elemento si se proporcionó uno
    if (!empty($_POST['nuevo_elemento']) && !empty($_POST['nueva_cantidad'])) {
        $nuevoElemento = $_POST['nuevo_elemento'];
        $nuevaCantidad = $_POST['nueva_cantidad'];

        // Insertar el nuevo elemento con el nuevo Código Ele
        $stm = $conexion->prepare("INSERT INTO cargo (id_cargo, nom_cargo, Codigo_ele, elemento, cantidad_ele) VALUES (:id, :cargo, :codigo_ele, :elemento, :cantidad)");
        $stm->bindParam(":id", $id);
        $stm->bindParam(":cargo", $registros[0]['nom_cargo']); // Tomar el cargo del primer registro
        $stm->bindParam(":codigo_ele", $nuevoCodigoEle); // Enlazar el nuevo código ele
        $stm->bindParam(":elemento", $nuevoElemento);
        $stm->bindParam(":cantidad", $nuevaCantidad);
        $stm->execute();
    }

    // Eliminar registros si se hicieron clic en los botones correspondientes
    if (!empty($_POST['eliminar_id'])) {
        $eliminarIds = $_POST['eliminar_id'];

        foreach ($eliminarIds as $eliminarId) {
            // Eliminar el registro
            $stm = $conexion->prepare("DELETE FROM cargo WHERE id_cargo = :id AND elemento = :elemento");
            $stm->bindParam(":id", $id);
            $stm->bindParam(":elemento", $eliminarId);
            $stm->execute();
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
                <th>Cargo</th>
                <th>Codigo Elemento</th>
                <th>Elemento</th>
                <th>Cantidad</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $index => $registro) { ?>
                <tr id="fila-<?php echo $index; ?>">
                    <td><?php echo $registro['nom_cargo']; ?></td>
                    <td><?php echo $registro['Codigo_ele']; ?></td>
                    <td><?php echo $registro['elemento']; ?></td>
                    <td>
                        <input type="number" class="form-control" min="0" pattern="^[0-9]+" name="<?php echo $registro['elemento']; ?>" value="<?php echo $registro['cantidad_ele']; ?>">
                    </td>
                    <td>
                        <button type="submit" name="eliminar_id[]" value="<?php echo $registro['elemento']; ?>" class="btn btn-outline-danger btn-eliminar"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="text" class="form-control" name="nuevo_elemento" placeholder="Nuevo elemento">
                </td>
                <td>
                    <input type="number" class="form-control" name="nueva_cantidad" placeholder="Cantidad" min="0" pattern="^[0-9]+">
                </td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <br>
    <div class="modal-footer">
        <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
        <button type="submit" class="btn btn-outline-success">Actualizar</button>
    </div>
</form>

<?php include("../../template/footer.php"); ?>
