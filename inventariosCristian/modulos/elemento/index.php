<?php
ob_start();
include("../../../db/conexionPDO.php");

function insertarAsignacion($conexion, $idPersona, $idCargo)
{
  $stm_asignacion = $conexion->prepare("INSERT INTO asignacion (id_per, id_cargo) VALUES (:id_per, :id_cargo)");
  $stm_asignacion->bindParam(":id_per", $idPersona);
  $stm_asignacion->bindParam(":id_cargo", $idCargo);
  $stm_asignacion->execute();
}

if (isset($_GET['id'])) {
  $txtid = $_GET['id'];

  $stm_asignacion = $conexion->prepare("DELETE FROM personas WHERE id_cargo_per = :txtid");
  $stm_asignacion->bindParam(":txtid", $txtid);
  $stm_asignacion->execute();

  $stm_elemento = $conexion->prepare("DELETE FROM cargo WHERE id_cargo = :txtid");
  $stm_elemento->bindParam(":txtid", $txtid);
  $stm_elemento->execute();

  header("location:index.php");
  exit();
}

$stm = $conexion->prepare("SELECT id_cargo, nom_cargo, GROUP_CONCAT(CONCAT(elemento, ': ', cantidad_ele) SEPARATOR ', ') AS Elementos FROM cargo GROUP BY id_cargo;");
$stm->execute();
$elementos = $stm->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include("../../template/header.php"); ?>


<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createE"
  title="Crear Cargo"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
    class="bi bi-plus-lg" viewBox="0 0 16 16">
    <path fill-rule="evenodd"
      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
  </svg></button>

<button type="button" class="btn btn-outline-success btn-animate btn-green" data-toggle="modal" data-target="#guardar"
  title="Guardar en Almacén"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
    class="bi bi-inbox" viewBox="0 0 16 16">
    <path
      d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
  </svg>
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
</svg>
</button>

<button type="button" class="btn btn-outline-danger btn-animate" data-toggle="modal" data-target="#sacar"
  title="Sacar del Almacén"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
    class="bi bi-inbox" viewBox="0 0 16 16">
    <path
      d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
  </svg>
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
</svg>
  </button>


<div class="table-responsive">
  <table class="table table-hover">
    <thead class="table table-dark">
      <tr>
        <th scope="col">ID del Cargo</th>
        <th scope="col">Nombre del Cargo</th>
        <th scope="col">Elementos</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <?php foreach ($elementos as $elemento) { ?>
      <tbody>
        <tr class="">
          <td scope="row">
            <?php echo $elemento['id_cargo']; ?>
          </td>
          <td>
            <?php echo $elemento['nom_cargo']; ?>
          </td>
          <td>
            <?php echo $elemento['Elementos']; ?>
          </td>
          <td>
            <a href="editE.php?id=<?php echo $elemento['id_cargo']; ?>" class="btn btn-outline-warning"
              title="Editar Registro"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path
                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd"
                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
              </svg></a>
            <a href="index.php?id=<?php echo $elemento['id_cargo']; ?>" class="btn btn-outline-danger"
              title="Eliminar Registro"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-trash" viewBox="0 0 16 16">
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

<?php include("createE.php"); ?>
<?php include("guardar.php"); ?>
<?php include("sacar.php"); ?>
<?php include("../../template/footer.php"); ?>
