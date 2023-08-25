<?php
include "../../../db/conexion.php";

if(isset($_POST['update'])){

				$ExtintorID	= intval($_POST['ExtintorID']);
				$NumeroDeSerie	= mysqli_real_escape_string($conexion,(strip_tags($_POST['NumeroDeSerie'], ENT_QUOTES)));
				$TipoDeExtintor  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['TipoDeExtintor'], ENT_QUOTES)));
				$FechaDeFabricacion = mysqli_real_escape_string($conexion,(strip_tags($_POST['FechaDeFabricacion'], ENT_QUOTES)));
				$FechaDeCompra  = mysqli_real_escape_string($conexion,(strip_tags($_POST['FechaDeCompra'], ENT_QUOTES)));
				$Ubicacion = mysqli_real_escape_string($conexion,(strip_tags($_POST['Ubicacion'], ENT_QUOTES)));
				$UbicacionEspecifica = mysqli_real_escape_string($conexion,(strip_tags($_POST['UbicacionEspecifica'], ENT_QUOTES)));
				$UltimaRecarga = mysqli_real_escape_string($conexion,(strip_tags($_POST['UltimaRecarga'], ENT_QUOTES)));
				$ProximaRecarga = mysqli_real_escape_string($conexion,(strip_tags($_POST['ProximaRecarga'], ENT_QUOTES)));
				$Comentarios = mysqli_real_escape_string($conexion,(strip_tags($_POST['Comentarios'], ENT_QUOTES)));
				
				$update = mysqli_query($conexion, "UPDATE extintores SET NumeroDeSerie='$NumeroDeSerie', TipoDeExtintor='$TipoDeExtintor', FechaDeFabricacion='$FechaDeFabricacion', FechaDeCompra='$FechaDeCompra', Ubicacion='$Ubicacion', UbicacionEspecifica='$UbicacionEspecifica', UltimaRecarga='$UltimaRecarga', ProximaRecarga='$ProximaRecarga', Comentarios='$Comentarios' WHERE ExtintorID='$ExtintorID'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
?>