<?php
// Verificar si se recibió un ID válido para eliminar
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];

    include ('../db/conexion.php');

  // Consulta para eliminar el registro con el ID proporcionado.
  $sql = "DELETE FROM publicaciones WHERE id = $id";
  if (mysqli_query($conexion, $sql)) {
    header('Location: index.php');
  } else {
    echo 'Error al eliminar el registro: ' . mysqli_error($conexion);
    header('Location: index.php');
  }

  // Cerrar la conexión.
  mysqli_close($conexion);
  
} else {
  echo 'ID inválido o no proporcionado.';
}
?>
