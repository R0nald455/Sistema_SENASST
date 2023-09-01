<?php
ob_start();

include("../../conexion.php");

if ($_POST) {
    $nombre = (isset($_POST['nom_per']) ? $_POST['nom_per'] : "");
    $apellido = (isset($_POST['ape_per']) ? $_POST['ape_per'] : "");
    $documento = (isset($_POST['doc_per']) ? $_POST['doc_per'] : "");
    $genero = (isset($_POST['gen_per']) ? $_POST['gen_per'] : "");
    $cargo = (isset($_POST['cargo']) ? $_POST['cargo'] : "");
    $cpe = (isset($_POST['cpe_per']) ? $_POST['cpe_per'] : "");
    $cpd = (isset($_POST['cpd_per']) ? $_POST['cpd_per'] : "");
    $talla_torso = (isset($_POST['talla_torso_per']) ? $_POST['talla_torso_per'] : "");
    $talla_zapatos = (isset($_POST['talla_zapatos_per']) ? $_POST['talla_zapatos_per'] : "");

    $fecha = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual del servidor

    $stm = $conexion->prepare("INSERT INTO personas(id_per, nom_per, ape_per, doc_per, gen_per, id_cargo_per, cpe_per, cpd_per, talla_torso_per, talla_zapatos_per, Fecha)
    VALUES (null, :nombre, :apellido, :documento, :genero, :cargo, :cpe, :cpd, :talla_torso, :talla_zapatos, :fecha)");

    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":apellido", $apellido);
    $stm->bindParam(":documento", $documento);
    $stm->bindParam(":genero", $genero);
    $stm->bindParam(":cargo", $cargo);
    $stm->bindParam(":cpe", $cpe);
    $stm->bindParam(":cpd", $cpd);
    $stm->bindParam(":talla_torso", $talla_torso);
    $stm->bindParam(":talla_zapatos", $talla_zapatos);
    $stm->bindParam(":fecha", $fecha);

    $stm->execute();

    header("location: index.php");
    exit;
}
?>

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Crear persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="create.php" method="POST">
                    <div class="form-group">
                        <label for="nom_per">Nombre:</label>
                        <input type="text" class="form-control" id="nom_per" name="nom_per" required
                            placeholder="Ingresa Nombre">
                    </div>
                    <div class="form-group">
                        <label for="ape_per">Apellido:</label>
                        <input type="text" class="form-control" id="ape_per" name="ape_per" required
                            placeholder="Ingresa Apellido">
                    </div>
                    <div class="form-group">
                        <label for="doc_per">Documento:</label>
                        <input type="text" class="form-control" id="doc_per" name="doc_per" required
                            placeholder="Ingresa Documento">
                    </div>
                    <div class="form-group">
                        <label for="gen_per">Género:</label>
                        <select class="form-select" id="gen_per" name="gen_per" required>
                            <option selected>Elije</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Transgenero">Transgenero</option>
                            <option value="No binario">No binario</option>
                            <option value="Prefiero no Decirlo">Prefiero no Decirlo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputGroupSelect01">Cargo:</label>
                        <select class="form-select" id="id_cargo_per" name="cargo" required>
                            <option selected>Elije</option>
                            <?php
                            $stm_cargos = $conexion->prepare("SELECT id_cargo, nom_cargo FROM cargo GROUP BY id_cargo, nom_cargo");
                            $stm_cargos->execute();
                            $cargos = $stm_cargos->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($cargos as $cargo) {
                                ?>
                                <option value="<?php echo $cargo['id_cargo']; ?>"><?php echo $cargo['nom_cargo']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cpe_per">Características Personales Especiales:</label>
                        <input type="text" class="form-control" id="cpe_per" name="cpe_per"
                            placeholder="Ingresa Características Personales Especiales" value="Ninguna">
                    </div>
                    <div class="form-group">
                        <label for="cpd_per">Características Personales Dorsal:</label>
                        <input type="text" class="form-control" id="cpd_per" name="cpd_per" value="Ninguna"
                            placeholder="Ingresa Características del Dorsal">
                    </div>
                    <div class="form-group">
                        <label for="talla_torso_per">Talla del Torso:</label>
                        <input type="text" class="form-control" id="talla_torso_per" name="talla_torso_per"
                            placeholder="Ingresa Talla del Torso">
                    </div>
                    <div class="form-group">
                        <label for="talla_zapatos_per">Talla de Zapatos:</label>
                        <input type="text" class="form-control" id="talla_zapatos_per" name="talla_zapatos_per"
                            placeholder="Ingresa Talla de Zapatos">
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>
