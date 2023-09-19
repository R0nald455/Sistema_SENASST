<?php
ob_start();

include("../../db/conexion.php");

$stm = $conexion->prepare("SELECT id_cargo, nom_cargo FROM cargo");
$stm->execute();
$cargos = $stm->fetchAll(PDO::FETCH_ASSOC);

$stm = $conexion->prepare("SELECT DISTINCT personas.id_per, personas.nom_per, personas.ape_per, personas.doc_per, personas.gen_per, personas.id_cargo_per, cargo.nom_cargo, personas.cpe_per, personas.cpd_per, personas.talla_torso_per, personas.talla_zapatos_per, personas.Fecha FROM personas INNER JOIN cargo ON personas.id_cargo_per = cargo.id_cargo");

$stm->execute();
$personas = $stm->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");

    $stm_asignacion = $conexion->prepare("DELETE FROM asignacion WHERE id_per = :id_per");
    $stm_asignacion->bindParam(":id_per", $txtid);
    $stm_asignacion->execute();

    $stm = $conexion->prepare("DELETE FROM personas WHERE id_per = :id_per");
    $stm->bindParam(":id_per", $txtid);
    $stm->execute();

    header("location: index.php");
    exit;
}

// Evitar duplicación de registros
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_per = $_POST['nom_per'];
    $ape_per = $_POST['ape_per'];
    $doc_per = $_POST['doc_per'];
    $gen_per = $_POST['gen_per'];
    $id_cargo_per = $_POST['id_cargo_per'];
    $cpe_per = $_POST['cpe_per'];
    $cpd_per = $_POST['cpd_per'];
    $talla_torso_per = $_POST['talla_torso_per'];
    $talla_zapatos_per = $_POST['talla_zapatos_per'];
    $Fecha = $_POST['Fecha'];

    // Verificar si el registro ya existe
    $stm_check = $conexion->prepare("SELECT id_per FROM personas WHERE doc_per = :doc_per");
    $stm_check->bindParam(":doc_per", $doc_per);
    $stm_check->execute();
    $existingPerson = $stm_check->fetch(PDO::FETCH_ASSOC);

    if (!$existingPerson) {
        // El registro no existe, realizar la inserción
        $stm_insert = $conexion->prepare("INSERT INTO personas (nom_per, ape_per, doc_per, gen_per, id_cargo_per, cpe_per, cpd_per, talla_torso_per, talla_zapatos_per) VALUES (:nom_per, :ape_per, :doc_per, :gen_per, :id_cargo_per, :cpe_per, :cpd_per, :talla_torso_per, :talla_zapatos_per)");
        $stm_insert->bindParam(":nom_per", $nom_per);
        $stm_insert->bindParam(":ape_per", $ape_per);
        $stm_insert->bindParam(":doc_per", $doc_per);
        $stm_insert->bindParam(":gen_per", $gen_per);
        $stm_insert->bindParam(":id_cargo_per", $id_cargo_per);
        $stm_insert->bindParam(":cpe_per", $cpe_per);
        $stm_insert->bindParam(":cpd_per", $cpd_per);
        $stm_insert->bindParam(":talla_torso_per", $talla_torso_per);
        $stm_insert->bindParam(":talla_zapatos_per", $talla_zapatos_per);
        $stm_insert->execute();
    }
}

?>

<?php include("../../template/header.php"); ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create"
    title="Crear Registro"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
    </svg></button>

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Documento</th>
                <th scope="col">Genero</th>
                <th scope="col">Cargo</th>
                <th scope="col">Caracteristicas Personales Especiales</th>
                <th scope="col">Caracteristicas Personales Dorsal</th>
                <th scope="col">Talla Torso</th>
                <th scope="col">Talla Zapatos</th>
                <th scope="col">Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $persona) { ?>
                <tr class="">
                    <td scope="row">
                        <?php echo $persona['id_per']; ?>
                    </td>
                    <td>
                        <?php echo $persona['nom_per']; ?>
                    </td>
                    <td>
                        <?php echo $persona['ape_per']; ?>
                    </td>
                    <td>
                        <?php echo $persona['doc_per']; ?>
                    </td>
                    <td>
                        <?php echo $persona['gen_per']; ?>
                    </td>
                    <td>
                        <?php echo $persona['nom_cargo']; ?>
                    </td>
                    <td>
                        <?php echo $persona['cpe_per']; ?>
                    </td>
                    <td>
                        <?php echo $persona['cpd_per']; ?>
                    </td>
                    <td>
                        <?php echo $persona['talla_torso_per']; ?>
                    </td>
                    <td>
                        <?php echo $persona['talla_zapatos_per']; ?>
                    </td>
                    <td>
                        <?php echo $persona['Fecha']; ?>
                    </td>
                    <td>
                        <a href="asignar.php?id=<?php echo $persona['id_per']; ?>" class="btn btn-outline-success"
                            title="Asignar Dotación"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                            </svg></a>
                        <a href="edit.php?id=<?php echo $persona['id_per']; ?>" class="btn btn-outline-warning"
                            title="Editar Registro"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></a>
                        <a href="index.php?id=<?php echo $persona['id_per']; ?>" class="btn btn-outline-danger"
                            title="Eliminar Registro"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                            </svg></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("create.php"); ?>

<?php include("../../template/footer.php"); ?>