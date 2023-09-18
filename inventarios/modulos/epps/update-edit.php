<?php
include "../../../db/conexion.php";

if(isset($_POST['update'])){

				$id				= intval($_POST['ID_Implementos']);
                $nombre			= mysqli_real_escape_string($conexion,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$descripcion  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
				$categoria 		= mysqli_real_escape_string($conexion,(strip_tags($_POST['categoria'], ENT_QUOTES)));
				$cantidad  		= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$ubicacion 		= mysqli_real_escape_string($conexion,(strip_tags($_POST['ubicacion'], ENT_QUOTES)));
				
				$update = mysqli_query($conexion, "UPDATE tblimplementos SET nombre='$nombre', descripcion='$descripcion', categoria='$categoria', cantidad='$cantidad', ubicacion='$ubicacion' WHERE ID_Implementos='$id'");
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
?>