<?php

include( '../db/conexion.php');


// Consulta para obtener los datos de la tabla "usuarios".
$sql = 'SELECT * FROM tobservacion';
$resultado = mysqli_query($conexion, $sql);
$x=1;
// Mostrar los datos en la tabla.
while ($fila = mysqli_fetch_assoc($resultado)) {
  echo '<tr>';
  echo '<td>' .$x. '</td>';
  echo '<td>' . $fila['fecha'] . '</td>';
  echo '<td>' . $fila['lugar'] . '</td>';
  echo '<td>' . $fila['estado'] . '</td>';
  echo '<td>' . $fila['tipo'] . '</td>';
  echo '<td> <a href="actualizar.php?id=' . $fila['id'] . '"><button class="botonEliminar">Actualizar</button></a></td>';
  echo '</tr>';
  $x++;
}


// Liberar el resultado y cerrar la conexión.
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
