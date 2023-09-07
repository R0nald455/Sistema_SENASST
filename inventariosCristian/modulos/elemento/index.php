<?php
ob_start();
include("../../../db/conexionPDO.php");

function insertarAsignacion($conexion, $idPersona, $idCargo) {
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
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createE"><i class="fas fa-plus fa-shake" title="Crear Cargo"></i></button>

<button type="button" class="btn btn-outline-success btn-animate btn-green" data-toggle="modal" data-target="#guardar" title="Guardar en Almacén"><i class="fas fa-box-open"></i><span class="fas fa-arrow-down arrow-animation-down arrow-green"></span></button>

<button type="button" class="btn btn-outline-danger btn-animate" data-toggle="modal" data-target="#sacar" title="Sacar del Almacén"><i class="fas fa-box-open"></i><i class="fas fa-arrow-up arrow-animation-up"></i></button>


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
        <?php foreach($elementos as $elemento) { ?>
        <tbody>
            <tr class="">
                <td scope="row"> <?php echo $elemento['id_cargo'];?> </td>
                <td> <?php echo $elemento['nom_cargo'];?> </td>
                <td> <?php echo $elemento['Elementos'];?> </td>
                <td>
                  <a href="editE.php?id=<?php echo $elemento['id_cargo'];?>" class="btn btn-outline-warning"> <i class="far fa-edit fa-fade"></i> </a>
                  <a href="index.php?id=<?php echo $elemento['id_cargo'];?>" class="btn btn-outline-danger"><i class="far fa-trash-alt fa-fade"></i></a>
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
<style>
  .btn-animate {
    position: relative;
  }

  .arrow-animation-up,
  .arrow-animation-down {
    position: absolute;
    color: red;
    opacity: 0;
    animation-duration: 3s;
    animation-iteration-count: infinite;
  }

  .arrow-animation-up {
    top: -30px;
    left: 50%;
    transform: translateX(-50%);
    animation-name: arrowSlideDown;
  }

  .arrow-animation-down {
    bottom: -70px;
    left: 50%;
    transform: translateX(-50%);
    animation-name: arrowSlideUp;
  }

  @keyframes arrowSlideDown {
    0%, 100% {
      top: -30px;
      opacity: 1;
    }
    40% {
      top: 10%;
      opacity: 0;
    }
    60% {
      top: 30%;
      opacity: 1;
    }
  }

  @keyframes arrowSlideUp {
    0%, 100% {
      bottom: 10px;
      opacity: 1;
    }
    40% {
      bottom: 150%;
      opacity: 0;
    }
    60% {
      bottom: 60%;
      opacity: 1;
    }
  }

  .btn-outline-warning {
    border-color: orange;
  }

  .edit-button.btn-outline-warning {
        border-color: yellow;
    }

  .btn-green {
    border-color: green;
  }

  .arrow-green {
    color: green;
  }
</style>
<script>
  $(document).ready(function() {
    // Animar flechas después de un retraso
    setTimeout(function() {
      $('.arrow-animation-up, .arrow-animation-down').addClass('animate');
    }, 500);
  });
</script>
