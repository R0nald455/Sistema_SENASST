<?php 
include("../../conexion.php");

$stm = $conexion->prepare("SELECT p.id_per, p.doc_per, c.nom_cargo, c.elemento as dotacion, a.fecha
    FROM personas p
    JOIN cargo c ON p.id_cargo_per = c.id_cargo
    JOIN asignacion a ON p.id_per = a.id_per");

$stm->execute();

$asignaciones = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../../template/header.php"); ?>

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID de la Persona</th>
                <th scope="col">Documento</th>
                <th scope="col">Nombre del Cargo</th>
                <th scope="col">Dotación del Cargo</th>
                <th scope="col">Fecha de Adquisición de la Dotación</th>
            </tr>
        </thead>
        
        <tbody>
        <?php foreach($asignaciones as $asignacion) { ?>
            <tr class="">
                <td scope="row"><?php echo $asignacion['id_per'];?></td>
                <td><?php echo $asignacion['doc_per'];?></td>
                <td><?php echo $asignacion['nom_cargo'];?></td>
                <td><?php echo $asignacion['dotacion'];?></td>
                <td><?php echo $asignacion['fecha'];?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php include("createA.php"); ?>

<?php include("../../template/footer.php"); ?>
