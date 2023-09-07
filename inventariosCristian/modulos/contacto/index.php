<?php 
ob_start();

include("../../../db/conexionPDO.php");

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
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create" title="Crear Registro"><i class="fas fa-plus fa-shake"></i></button>

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
            <?php foreach($personas as $persona) { ?>
                <tr class="">
                    <td scope="row"> <?php echo $persona['id_per'];?> </td>
                    <td> <?php echo $persona['nom_per'];?> </td>
                    <td> <?php echo $persona['ape_per'];?> </td>
                    <td> <?php echo $persona['doc_per'];?> </td>
                    <td> <?php echo $persona['gen_per'];?> </td>
                    <td> <?php echo $persona['nom_cargo'];?> </td>
                    <td> <?php echo $persona['cpe_per'];?> </td>
                    <td> <?php echo $persona['cpd_per'];?> </td>
                    <td> <?php echo $persona['talla_torso_per'];?> </td>
                    <td> <?php echo $persona['talla_zapatos_per'];?> </td>
                    <td> <?php echo $persona['Fecha'];?> </td>
                    <td>
                        <a href="asignar.php?id=<?php echo $persona['id_per'];?>" class="btn btn-outline-success" title="Asignar Dotación"> <i class="fas fa-plus fa-shake"></i> </a>
                        <a href="edit.php?id=<?php echo $persona['id_per'];?>" class="btn btn-outline-warning" title="Editar Registro"><i class="fas fa-thin fa-edit fa-fade"></i> </a>
                        <a href="index.php?id=<?php echo $persona['id_per'];?>" class="btn btn-outline-danger" title="Eliminar Registro"><i class="far fa-trash-alt fa-fade"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("create.php"); ?>

<?php include("../../template/footer.php"); ?>
