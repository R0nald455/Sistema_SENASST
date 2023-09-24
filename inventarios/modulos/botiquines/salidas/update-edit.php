<?php
include "../../../db/conexion.php";

if(isset($_POST['update'])){

				$id_salidas		= intval($_POST['id_salidas']);
                $id_elementos	= intval($_POST['id_elementos']);
                $cantidad  		= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$comentario  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['comentario'], ENT_QUOTES)));
				
				$update = mysqli_query($conexion, "UPDATE salidasBotiquin SET id_elementos='$id_elementos', cantidad='$cantidad', comentario='$comentario' WHERE id_salidas='$id_salidas'") or die(mysqli_error());
				$sql = mysqli_query($conexion, "UPDATE botiquin SET cantidad = cantidad - $cantidad WHERE id_elementos = '$id_elementos'");

				
				// if(mysqli_num_rows($dato) > 0){
				// 	while ($row = $dato->fetch_assoc()) {

				// 		echo $row["cantidad"].'<br>';

				// 	}
				// }

				// $actualizar_cantidad = mysqli_query($conexion,
				// 		"UPDATE tblimplementos AS ti
				// 		JOIN tblentradas AS te
				// 		ON ti.ID_Implementos = te.ID_Implementos
				// 		SET ti.cantidad = ti.cantidad + '$row';") or die(mysqli_error());

				// $actualizar_cantidad = mysqli_query($conexion, 
				// "UPDATE tblimplementos AS ti
				// JOIN tblentradas AS te
				// ON ti.ID_Implementos = te.ID_Implementos
				// SET ti.cantidad = 
				// 	CASE 
				// 		WHEN te.cantidad >= 0 THEN ti.cantidad + ('$row' - te.cantidad)
				// 	END;");

				if($update && $sql){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
?>