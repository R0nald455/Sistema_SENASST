<?php
include "../../../db/conexion.php";

if(isset($_POST['update'])){

				$id				= intval($_POST['ID_Salidas']);
                $id_implementos	= intval($_POST['ID_Implementos']);
                $id_empleado	= intval($_POST['ID_Empleado']);
                $cantidad  		= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$descripcion  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
				
				$update = mysqli_query($conexion, "UPDATE tblsalidas SET ID_Implementos='$id_implementos', ID_Empleado='$id_empleado', cantidad='$cantidad', descripcion='$descripcion' WHERE ID_Salidas='$id'") or die(mysqli_error());
				$sql = mysqli_query($conexion, "UPDATE tblimplementos SET cantidad = cantidad - $cantidad WHERE id_implementos = '$id_implementos'");

				
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