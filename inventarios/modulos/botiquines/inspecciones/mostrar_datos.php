<?php
session_start();
error_reporting(0);
include 'index.php';
?>

<!DOCTYPE html>
<html>

<head>
  <?php include("head.php"); ?>
</head>

<body>

<?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4): ?>

  <header>
    <br>
    <center>
      <h1>Administración de elementos del botiquin</h1>
  </header>

  <div class="container">
    <hr>
    <div class="row">
      <div class="col-12 col-md-12">
        <ul class="list-group">
          <li class="list-group-item">
            <form method="post">
              <div class="form-row align-items-center table-responsive">
                <table id="lookup" class="table table-hover">
                  <thead bgcolor="rgb(57,168,1)">
                    <tr>
                      <th>ID de los elementos</th>
                      <th>ID del botiquin al que pertenece</th>
                      <th>Imagen de referencia</th>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Ubicacion</th>
                      <th>Ubicacion especifica</th>
                      <th>Estado</th>
                      <th>Fecha de registro</th>
                      <th>Vencimiento</th>
                      <th>Comentarios</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $divSeleccionado = $_POST['divSeleccionado'];
                    include '../../../../db/conexion.php';
                    $sql = "SELECT * FROM elementosbotiquines WHERE ubicacion = '$divSeleccionado'";
                    $result = $conexion->query($sql);

                    if ($result->num_rows > 0) {
                      while ($fila = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                          <td>
                            <?php echo $fila['id_elementos']; ?>
                          </td>
                          <td>
                            <?php echo $fila['id_botiquin']; ?>
                          </td>
                          <td>
                            <?php echo '<img src="data:imag/png;base64,' . base64_encode($fila['ImagenReferencia']) . '" alt="Imagen" style="width: 150px; height:150px;" >'; ?>
                          </td>
                          <td>
                            <?php echo $fila['nombre']; ?>
                          </td>
                          <td>
                            <?php echo $fila['cantidad']; ?>
                          </td>
                          <td>
                            <?php echo $fila['ubicacion']; ?>
                          </td>
                          <td>
                            <?php echo $fila['ubicacionEspecifica']; ?>
                          </td>
                          <td>
                            <?php echo $fila['estado']; ?>
                          </td>
                          <td>
                            <?php echo $fila['fechaRegistro']; ?>
                          </td>
                          <td>
                            <?php
                            // Fecha de vencimiento del objeto en la base de datos (en formato 'Y-m-d')
                            $fechaVencimiento = $fila['fechaVencimiento'];
                            // Obtener la fecha actual
                            $fechaActual = date('Y-m-d');
                            // Convierte las fechas a timestamps
                            $timestamp_variable = strtotime($fechaVencimiento);
                            $timestamp_actual = strtotime($fechaActual);
                            // Calcula la diferencia en segundos
                            $diferencia_segundos = $timestamp_variable - $timestamp_actual;
                            // Calcula la diferencia en días
                            $diferencia_dias = $diferencia_segundos / (60 * 60 * 24);

                            if ($diferencia_dias > 31) {
                            ?> <i class="fa-solid fa-circle-check fa-2xl" style="color: #2bf21c;"></i>
                              <br>
                            <?php
                              echo "El elemento todavia tiene mas de un mes para vencerse";
                            } elseif ($diferencia_dias >= 1) {
                            ?> <i class="fa-solid fa-circle-exclamation fa-2xl" style="color: #ffd500;"></i>
                              <br> <br>
                            <?php
                              echo "El elemento esta a menos de un mes de vencerse";
                            } else {
                            ?> <i class="fa-solid fa-circle-xmark fa-2xl" style="color: #f50000;"></i>
                              <br>
                            <?php
                              print "El elemento ya se vencio y no se ha llevado a cabo un remplazo";
                            }

                            ?>
                          </td>
                          <td>
                            <?php echo $fila['comentarios']; ?>
                          </td>
                        </tr>
                      <?php
                      }
                    } else {
                      ?>
                      <tr class="text-cente">
                        <td colspan="16">No existen registros</td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="col-auto">

              </div>
      </div>
      </form>
      </li>
      </ul>

    </div>
  </div>
  </div>
  <?php
  include '../../../../Footer/footer.php';
  ?>

<?php else: ?>

<script>
    alert("No has iniciado sesión, por favor inicia a continuación.");
    window.location.href = "../../../../php/login.php";
</script>

<?php endif; ?>

</body>

</html>