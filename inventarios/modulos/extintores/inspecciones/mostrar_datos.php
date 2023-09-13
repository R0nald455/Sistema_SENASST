<?php include '../../../../db/conexion.php';
include 'index.php';
?>

<!DOCTYPE html>
<html>

<head>
  <?php include("head.php"); ?>
</head>

<body>

  <header>
    <br>
    <center>
      <h1>Administracion de implementos SST</h1>
  </header>

  <div class="container">
    <hr>
    <div class="row">
      <div class="col-12 col-md-12">
        <ul class="list-group">
          <li class="list-group-item">
            <form method="post">
              <div class="form-row align-items-center">
                <table id="lookup" class="table table-hover">
                  <thead bgcolor="rgb(57,168,1)">
                    <tr>
                      <th>Extintor ID</th>
                      <th>Numero de Serie</th>
                      <th>Tipo de Extintor</th>
                      <th>Ubicacion</th>
                      <th>Ubicación Específica</th>
                      <th>Última Recarga</th>
                      <th>Proxima Recarga</th>
                      <th>Comentarios</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $divSeleccionado = $_POST['divSeleccionado'];
                    $sql = "SELECT ExtintorID, NumeroDeSerie, TipoDeExtintor, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios FROM extintores WHERE Ubicacion = '$divSeleccionado'";
                    $result = $conexion->query($sql);

                    if ($result->num_rows > 0) {
                      while ($fila = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $fila['ExtintorID']; ?>
                          </td>
                          <td>
                            <?php echo $fila['NumeroDeSerie']; ?>
                          </td>
                          <td>
                            <?php echo $fila['TipoDeExtintor']; ?>
                          </td>
                          <td>
                            <?php
                            switch ($fila['Ubicacion']) {

                              case 'Biblioteca':

                                echo $fila['Ubicacion'];
                                ?>
                                <iframe
                                  src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d208.29876097118972!2d-74.21726913685644!3d4.695541010889089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDQuMCJOIDc0wrAxMycwMS42Ilc!5e1!3m2!1ses-419!2sco!4v1694558172765!5m2!1ses-419!2sco"
                                  width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                  referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <?php
                                break;

                              case 'Administracion':

                                echo $fila['Ubicacion'];
                                ?>
                                <iframe
                                  src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d163.74281803261528!2d-74.21589439980467!3d4.6957436974358595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDQuNiJOIDc0wrAxMic1Ny4yIlc!5e1!3m2!1ses-419!2sco!4v1694558624024!5m2!1ses-419!2sco"
                                  width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                  referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <?php
                                break;

                              default:
                                echo $fila['Ubicacion'];
                                break;
                            }

                            ?>
                          </td>
                          <td>
                            <?php echo $fila['UbicacionEspecifica']; ?>
                          </td>
                          <td>
                            <?php echo $fila['UltimaRecarga']; ?>
                          </td>
                          <td>
                            <?php echo $fila['ProximaRecarga'];

                            // Fecha de vencimiento del objeto en la base de datos (en formato 'Y-m-d')
                            $fechaVencimiento = $fila['ProximaRecarga'];
                            // Obtener la fecha actual
                            $fechaActual = date('Y-m-d');
                            // Calcular la diferencia en segundos entre las fechas
                            $diferenciaSegundos = strtotime($fechaVencimiento) - strtotime($fechaActual);
                            // Definir la cantidad de segundos en un mes (aproximadamente)
                            $segundosEnUnMes = 30 * 24 * 60 * 60;
                            // Verificar si la diferencia es menor o igual a un mes en segundos
                            if ($diferenciaSegundos <= $segundosEnUnMes) {
                              ?> <i class="fa-solid fa-circle-exclamation fa-2xl" style="color: #ffd500;"></i>
                              <br> <br>
                              <?php
                              echo "El objeto esta a un mes de vencerse";
                            } else {
                              ?> <i class="fa-solid fa-circle-check fa-2xl" style="color: #2bf21c;"></i>
                              <br>
                              <?php
                              echo "El objeto todavia tiene mas de un mes para vencerse";
                            }

                            ?>
                          </td>
                          <td>
                            <?php echo $fila['Comentarios']; ?>
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
  include("../../../../Footer/footer.php");
  ?>
</body>

</html>