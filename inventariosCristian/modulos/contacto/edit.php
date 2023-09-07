<?php
include("../../../db/conexionPDO.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener el registro de la base de datos
    $stm = $conexion->prepare("SELECT * FROM personas WHERE id_per=:id_per");
    $stm->bindParam(":id_per", $id);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_ASSOC);

    // Obtener los cargos distintos
    $cargos_stm = $conexion->prepare("SELECT DISTINCT id_cargo, nom_cargo FROM cargo");
    $cargos_stm->execute();
    $cargos = $cargos_stm->fetchAll(PDO::FETCH_ASSOC);
}

if ($_POST) {
    $cargo = $_POST['id_cargo_per'];
    $cpe = $_POST['cpe_per'];
    $cpd = $_POST['cpd_per'];
    $talla_torso = $_POST['talla_torso_per'];
    $talla_zapatos = $_POST['talla_zapatos_per'];

    // Actualizar los datos en la base de datos
    $stm = $conexion->prepare("UPDATE personas SET id_cargo_per = :cargo, cpe_per = :cpe, cpd_per = :cpd, talla_torso_per = :talla_torso, talla_zapatos_per = :talla_zapatos WHERE id_per = :id");
    $stm->bindParam(":cargo", $cargo);
    $stm->bindParam(":cpe", $cpe);
    $stm->bindParam(":cpd", $cpd);
    $stm->bindParam(":talla_torso", $talla_torso);
    $stm->bindParam(":talla_zapatos", $talla_zapatos);
    $stm->bindParam(":id", $id);
    $stm->execute();

    // Redireccionar a la página de edición
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
                <th>Género</th>
                <th>Cargo</th>
                <th>Caracteristicas Personales Especiales</th>
                <th>Caracteristicas Personales Dorsal</th>
                <th>Talla Torso</th>
                <th>Talla Zapatos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $registro['id_per']; ?></td>
                <td><?php echo $registro['nom_per']; ?></td>
                <td><?php echo $registro['ape_per']; ?></td>
                <td><?php echo $registro['doc_per']; ?></td>
                <td><?php echo $registro['gen_per']; ?></td>
                <td>
                    <select class="form-control" name="id_cargo_per">
                        <?php foreach ($cargos as $cargo) { ?>
                            <option value="<?php echo $cargo['id_cargo']; ?>" <?php if ($registro['id_cargo_per'] == $cargo['id_cargo']) echo "selected"; ?>>
                                <?php echo $cargo['nom_cargo']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
                <td><input type="text" class="form-control" name="cpe_per" value="<?php echo $registro['cpe_per']; ?>"></td>
                <td><input type="text" class="form-control" name="cpd_per" value="<?php echo $registro['cpd_per']; ?>"></td>
                <td><input type="text" class="form-control" name="talla_torso_per" value="<?php echo $registro['talla_torso_per']; ?>"></td>
                <td><input type="text" class="form-control" name="talla_zapatos_per" value="<?php echo $registro['talla_zapatos_per']; ?>"></td>
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
