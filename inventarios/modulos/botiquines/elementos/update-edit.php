<?php
include "../../../../db/conexion.php";

if (isset($_POST['update'])) {

	$id_elementos = intval($_POST['id_elementos']);

	$id_botiquin = $conexion->real_escape_string($_POST['id_botiquin']);
	$nombre = $conexion->real_escape_string($_POST['nombre']);
	$cantidad = $conexion->real_escape_string($_POST['cantidad']);
	$ubicacion = $conexion->real_escape_string($_POST['ubicacion']);
	$ubicacionEspecifica = $conexion->real_escape_string($_POST['ubicacionEspecifica']);
	$estado = $conexion->real_escape_string($_POST['estado']);
	$fechaRegistro = $conexion->real_escape_string($_POST['fechaRegistro']);
	$fechaVencimiento = $conexion->real_escape_string($_POST['fechaVencimiento']);
	$comentarios = $conexion->real_escape_string($_POST['comentarios']);

	if (isset($_FILES['ImagenReferencia']['tmp_name']) && !empty($_FILES['ImagenReferencia']['tmp_name'])) {

		$NuevaImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
		$NuevaImagenContenido = addslashes(file_get_contents($NuevaImagenReferencia));

		$update = mysqli_query($conexion, "UPDATE elementosbotiquines SET  id_botiquin ='$id_botiquin', ImagenReferencia='$NuevaImagenContenido', nombre ='$nombre', cantidad ='$cantidad', ubicacion ='$ubicacion', ubicacionEspecifica ='$ubicacionEspecifica', estado ='$estado', fechaRegistro ='$fechaRegistro', fechaVencimiento ='$fechaVencimiento', comentarios ='$comentarios' WHERE id_elementos='$id_elementos'");
	} else {
		// No se cargó una nueva imagen, mantener la imagen actual en la base de datos
		$update = mysqli_query($conexion, "UPDATE elementosbotiquines SET  id_botiquin ='$id_botiquin',  nombre ='$nombre', cantidad ='$cantidad', ubicacion ='$ubicacion', ubicacionEspecifica ='$ubicacionEspecifica', estado ='$estado', fechaRegistro ='$fechaRegistro', fechaVencimiento ='$fechaVencimiento', comentarios ='$comentarios' WHERE id_elementos='$id_elementos'");
	}

	if ($update) {
		echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
	} else {
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
	}
}
