<?php

include( '../db/conexion.php');


// Consulta para obtener los datos de la tabla "usuarios".
$sql = 'SELECT id, titulo FROM publicaciones';
$resultado = mysqli_query($conexion, $sql);
$x=1;
// Mostrar los datos en la tabla.
while ($fila = mysqli_fetch_assoc($resultado)) {
  echo '<tr>';
  echo '<td>' .$x. '</td>';
  echo '<td>' . $fila['titulo'] . '</td>';
  echo '<td> <a href="eliminar_datos.php?id=' . $fila['id'] . '"><button class="botonEliminar">Eliminar</button></a></td>';
  echo '</tr>';
  $x++;
}

// Liberar el resultado y cerrar la conexión.
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
