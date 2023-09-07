<?php 
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
<h1>Administración de elementos del botiquin</h1>
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
                <th >Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Ubicación Específica</th>
                <th>Fecha de Registro</th>
                <th>Estado</th>
                <th>Comentarios</th>
                <th>Fecha de Inspección</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $divSeleccionado = $_POST['divSeleccionado'];
              include '../../conexion.php';
              $sql = "SELECT nombre, descripcion, cantidad, ubiEspecifica, estado, fechaRegis, comentarios, fechaInspec FROM botiquin WHERE ubicacion = '$divSeleccionado'";
              $result = $conexion->query($sql);

              if($result -> num_rows >0){
                while($fila = mysqli_fetch_array($result)){
              ?>
              <tr>
                <td><?php echo $fila['nombre']; ?>  </td>
                <td><?php echo $fila['descripcion']; ?>  </td>
                <td><?php echo $fila['cantidad']; ?></td>
                <td><?php echo $fila['ubiEspecifica']; ?></td>
                <td><?php echo $fila['fechaRegis']; ?>   </td>
                <td><?php 
                // Fecha de vencimiento del objeto en la base de datos (en formato 'Y-m-d')
                $fechaVencimiento = $fila['fechaInspec'];
                // Obtener la fecha actual
                $fechaActual = date('Y-m-d');
                // Convierte las fechas a timestamps
                $timestamp_variable = strtotime($fechaVencimiento);
                $timestamp_actual = strtotime($fechaActual);
                // Calcula la diferencia en segundos
                $diferencia_segundos = $timestamp_variable - $timestamp_actual;
                // Calcula la diferencia en días
                $diferencia_dias = $diferencia_segundos / (60 * 60 * 24);

                if($diferencia_dias > 30){
                  ?> <i class="fa-solid fa-circle-check fa-2xl" style="color: #2bf21c;"></i>
                  <br> <?php
                  echo "La inspección todavia tiene mas de un mes para vencerse";
                }elseif($diferencia_dias >=0){
                  ?> <i class="fa-solid fa-circle-exclamation fa-2xl" style="color: #ffd500;"></i> 
                  <br> <br><?php
                  echo "La inspección esta un mes de vencerse"; 
                }else{
                  ?> <i class="fa-solid fa-circle-xmark fa-2xl" style="color: #f50000;"></i>
                  <br> <?php
                  print "La fecha de inspeccion ya se vencio y no se llevo a cabo";
                }
                
                ?>     </td>
                <td><?php echo $fila['comentarios']; ?>     </td>
                <td><?php echo $fila['fechaInspec']; ?>     </td>


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
include '../../../Footer/footer.php';
?>
    </body>
</html>