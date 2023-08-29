<?php include '../db/conexion.php';
      include './index.php';
?>

<!DOCTYPE html>
<html>
<head>
    <?php include("head.php");?>
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
              <div class="col-auto">
              <table class="table table-striped table-dark " id= "table_id">
            <thead>
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

              $conexion = mysqli_connect("localhost","root","","sstcba");
              $sql = "SELECT ExtintorID, NumeroDeSerie, TipoDeExtintor, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios FROM extintores WHERE Ubicacion = '$divSeleccionado'";
              $result = $conexion->query($sql);

              if($result -> num_rows >0){
                while($fila = mysqli_fetch_array($result)){
              ?>
              <tr>
                <td><?php echo $fila['ExtintorID']; ?>  </td>
                <td><?php echo $fila['NumeroDeSerie']; ?>  </td>
                <td><?php echo $fila['TipoDeExtintor']; ?>  </td>
                <td><?php echo $fila['Ubicacion']; ?></td>
                <td><?php echo $fila['UbicacionEspecifica']; ?></td>
                <td><?php echo $fila['UltimaRecarga']; ?>   </td>
                <td><?php echo $fila['ProximaRecarga']; 
                
                // Fecha de vencimiento del objeto en la base de datos (en formato 'Y-m-d')
                $fechaVencimiento = $fila['ProximaRecarga'];
                // Obtener la fecha actual
                $fechaActual = date('Y-m-d');
                // Calcular la diferencia en segundos entre las fechas
                $diferenciaSegundos = strtotime($fechaVencimiento) - strtotime($fechaActual);
                // Definir la cantidad de segundos en un mes (aproximadamente)
                $segundosEnUnMes = 30 * 24 * 60 * 60;
                // Verificar si la diferencia es menor o igual a un mes en segundos
                if($diferenciaSegundos <= $segundosEnUnMes){
                  echo "El objeto esta un mes de vencerse";
                }else{
                  echo "El objeto todavia tiene mas de un mes para vencerse";
                }
                
                ?>     </td>
                <td><?php echo $fila['Comentarios']; ?>     </td>

              </tr>
              <?php
              }
              }else{
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
include("../Footer/footer.php");
?>
    </body>
</html>