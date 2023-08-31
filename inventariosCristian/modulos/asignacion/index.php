<?php
include("../../conexion.php");

$stm_asignacion = $conexion->prepare("SELECT id_per, nom_per, ape_per, doc_per, nom_cargo, GROUP_CONCAT(CONCAT(Dotacion, ': ', Cantidad) SEPARATOR ' | ') AS Dotaciones_Cantidades, MAX(Fecha) AS Ultima_Fecha FROM asignacion GROUP BY id_per, nom_per, ape_per, doc_per, nom_cargo");
$stm_asignacion->execute();
$registros_asignacion = $stm_asignacion->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $txtid = $_GET['id'];

  $stm_asignacion = $conexion->prepare("DELETE FROM asignacion WHERE id_per = :id_per");
  $stm_asignacion->bindParam(":id_per", $txtid);
  $stm_asignacion->execute();

  header("location: index.php");
  exit;
}
?>

<?php include("../../template/header.php"); ?>

<div class="consultas">
<!-- Código para las consultas -->
</div>

<div class="table responsive">
  <h2>Tabla de Asignaciones</h2>
  <table class="table table-hover">
    <thead class="table table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Documento</th>
        <th scope="col">Cargo</th>
        <th scope="col">Dotación y Cantidad Entregadas</th>
        <th scope="col">Fecha Ultima Asignación</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($registros_asignacion as $registro) { ?>
        <tr class="">
          <td scope="row"><?php echo $registro['id_per']; ?></td>
          <td><?php echo $registro['nom_per']; ?></td>
          <td><?php echo $registro['ape_per']; ?></td>
          <td><?php echo $registro['doc_per']; ?></td>
          <td><?php echo $registro['nom_cargo']; ?></td>
          <td><?php echo $registro['Dotaciones_Cantidades']; ?></td>
          <td><?php echo $registro['Ultima_Fecha']; ?></td>
          <td>
            <a href="editA.php?id=<?php echo $registro['id_per'];?>" class="btn btn-outline-warning" title="Visualizar Registro"><i class="fas fa-eye"></i></a>
            <!--<a href="index.php?id=<?php echo $registro['id_per'];?>" class="btn btn-outline-danger" title="Eliminar Registro"><i class="far fa-trash-alt fa-fade"></i></a>-->
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php include("../../template/footer.php"); ?>