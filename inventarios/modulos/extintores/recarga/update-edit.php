<?php
include "../../../../db/conexion.php";

if (isset($_POST['update'])) {

	$ExtintorID	= intval($_POST['ExtintorID']);
	$NumeroDeSerie = $conexion->real_escape_string($_POST['NumeroDeSerie']);
	$TipoDeExtintor = $conexion->real_escape_string($_POST['TipoDeExtintor']);
	$FechaDeFabricacion = $conexion->real_escape_string($_POST['FechaDeFabricacion']);
	$FechaDeCompra  = $conexion->real_escape_string($_POST['FechaDeCompra']);
	$Ubicacion = $conexion->real_escape_string($_POST['Ubicacion']);
	$UbicacionEspecifica = $conexion->real_escape_string($_POST['UbicacionEspecifica']);
	$UltimaRecarga = $conexion->real_escape_string($_POST['UltimaRecarga']);
	$ProximaRecarga = $conexion->real_escape_string($_POST['ProximaRecarga']);
	$Comentarios = $conexion->real_escape_string($_POST['Comentarios']);

	if (isset($_FILES['ImagenReferencia']['tmp_name']) && !empty($_FILES['ImagenReferencia']['tmp_name'])) {

		$NuevaImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
		$NuevaImagenContenido = addslashes(file_get_contents($NuevaImagenReferencia));

		$update = mysqli_query($conexion, "UPDATE extintores SET NumeroDeSerie='$NumeroDeSerie', TipoDeExtintor='$TipoDeExtintor', FechaDeFabricacion='$FechaDeFabricacion', FechaDeCompra='$FechaDeCompra', Ubicacion='$Ubicacion', UbicacionEspecifica='$UbicacionEspecifica', UltimaRecarga='$UltimaRecarga', ProximaRecarga='$ProximaRecarga', Comentarios='$Comentarios', ImagenReferencia='$NuevaImagenContenido' WHERE ExtintorID='$ExtintorID'");
	} else {
		// No se cargó una nueva imagen, mantener la imagen actual en la base de datos
		$update = mysqli_query($conexion, "UPDATE extintores SET NumeroDeSerie='$NumeroDeSerie', TipoDeExtintor='$TipoDeExtintor', FechaDeFabricacion='$FechaDeFabricacion', FechaDeCompra='$FechaDeCompra', Ubicacion='$Ubicacion', UbicacionEspecifica='$UbicacionEspecifica', UltimaRecarga='$UltimaRecarga', ProximaRecarga='$ProximaRecarga', Comentarios='$Comentarios' WHERE ExtintorID='$ExtintorID'");
	}

	if ($update) {
		session_start();
		$_SESSION['actualizar_extintor'] = true;
		header('Location:index.php');
	} else {
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
	}
}
