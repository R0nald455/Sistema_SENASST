<?php
include "../../../db/conexion.php";

if(isset($_POST['update'])){

				$id				= intval($_POST['ID_Entradas']);
                $id_implementos	= intval($_POST['ID_Implementos']);
                $cantidad  		= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$descripcion  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
				
				$update = mysqli_query($conexion, "UPDATE tblentradas SET ID_Implementos='$id_implementos', cantidad='$cantidad', descripcion='$descripcion' WHERE ID_Entradas='$id'") or die(mysqli_error());
				$dato = mysqli_query($conexion, "SELECT cantidad - '$cantidad' FROM tblentradas WHERE ID_Entradas='$id'") or die(mysqli_error());
				
				if(mysqli_num_rows($dato) > 0){
					while ($row = $dato->fetch_assoc()) {

						echo $row["cantidad"].'<br>';

					}
				}

				$actualizar_cantidad = mysqli_query($conexion,
						"UPDATE tblimplementos AS ti
						JOIN tblentradas AS te
						ON ti.ID_Implementos = te.ID_Implementos
						SET ti.cantidad = ti.cantidad + '$row';") or die(mysqli_error());

				// $actualizar_cantidad = mysqli_query($conexion, 
				// "UPDATE tblimplementos AS ti
				// JOIN tblentradas AS te
				// ON ti.ID_Implementos = te.ID_Implementos
				// SET ti.cantidad = 
				// 	CASE 
				// 		WHEN te.cantidad >= 0 THEN ti.cantidad + ('$row' - te.cantidad)
				// 	END;");

				if($update && $actualizar_cantidad){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
?>