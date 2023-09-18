<?php
include "../../../db/conexion.php";

if(isset($_POST['update'])){

				$id				= intval($_POST['ID_Implementos']);
                $nombre			= mysqli_real_escape_string($conexion,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$descripcion  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
				$categoria 		= mysqli_real_escape_string($conexion,(strip_tags($_POST['categoria'], ENT_QUOTES)));
				$cantidad  		= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$ubicacion 		= mysqli_real_escape_string($conexion,(strip_tags($_POST['ubicacion'], ENT_QUOTES)));

				if(isset($_FILES['ImagenReferencia']['tmp_name']) && !empty($_FILES['ImagenReferencia']['tmp_name'])){

					$NuevaImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
					$NuevaImagenContenido = addslashes(file_get_contents($NuevaImagenReferencia));
			
					$update = mysqli_query($conexion, "UPDATE tblimplementos SET Nombre='$nombre', ImagenReferencia='$ImagenContenido', Descripcion='$descripcion', Categoria='$categoria', Cantidad='$cantidad', Ubicacion='$ubicacion' WHERE ID_Implementos='$id'");
				} else {
					// No se cargó una nueva imagen, mantener la imagen actual en la base de datos
					$update = mysqli_query($conexion, "UPDATE tblimplementos SET Nombre='$nombre', Descripcion='$descripcion', Categoria='$categoria', Cantidad='$cantidad', Ubicacion='$ubicacion' WHERE ID_Implementos='$id'");
				}
				
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location.href = 'index.php';
					</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location.href = 'index.php'</script>";
				}
			}
?>