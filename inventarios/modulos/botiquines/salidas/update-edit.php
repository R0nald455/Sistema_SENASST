<?php
include "../../../../db/conexion.php";

if (isset($_POST['update'])) {

	$id_salidas = intval($_POST['id_salidas']);
	$id_elementos = intval($_POST['id_elementos']);
	$cantidad = mysqli_real_escape_string($conexion, (strip_tags($_POST['cantidad'], ENT_QUOTES)));
	$comentario = mysqli_real_escape_string($conexion, (strip_tags($_POST['comentario'], ENT_QUOTES)));
	$fechaSale = mysqli_real_escape_string($conexion, (strip_tags($_POST['fechaSale'], ENT_QUOTES)));

	$update = mysqli_query($conexion, "UPDATE salidasbotiquin SET id_elementos='$id_elementos', cantidad='$cantidad', comentario='$comentario', fechaSale = '$fechaSale' WHERE id_salidas='$id_salidas'");

	if ($update) {
		session_start();
		$_SESSION['actualizar_salida'] = true;
		header('Location:index.php');
	} else {
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
	}
}