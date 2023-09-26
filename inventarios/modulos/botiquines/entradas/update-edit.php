<?php
include "../../../../db/conexion.php";

if(isset($_POST['update'])){

				$id_entradas	= intval($_POST['id_entradas']);
                $id_elementos	= intval($_POST['id_elementos']);
                $cantidad  		= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$comentario  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['comentario'], ENT_QUOTES)));
				
				$update = mysqli_query($conexion, "UPDATE entradasBotiquin SET id_elementos='$id_elementos', cantidad='$cantidad', comentario='$comentario' WHERE id_entradas='$id_entradas'");

				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
?>