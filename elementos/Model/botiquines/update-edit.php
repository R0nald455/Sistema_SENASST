<?php
include "../../conexion.php";

if(isset($_POST['update'])){

				$id_elementos	= intval($_POST['id_elementos']);
				$nombre = $conexion->real_escape_string($_POST['nombre']);
				$descripcion = $conexion->real_escape_string($_POST['descripcion']);
				$cantidad = $conexion->real_escape_string($_POST['cantidad']);
				$ubicacion  =$conexion->real_escape_string($_POST['ubicacion']);
				$ubiEspecifica = $conexion->real_escape_string($_POST['ubiEspecifica']);
				$estado = $conexion->real_escape_string($_POST['estado']);
				$comentarios = $conexion->real_escape_string($_POST['comentarios']);
				$fechaInspec = $conexion->real_escape_string($_POST['fechaInspec']);
				
				$update = mysqli_query($conexion, "UPDATE botiquin SET nombre='$nombre', descripcion='$descripcion', cantidad='$cantidad', ubicacion='$ubicacion', ubiEspecifica='$ubiEspecifica',
					 estado='$estado', comentarios='$comentarios', fechaInspec='$fechaInspec' WHERE id_elementos='$id_elementos'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
?>