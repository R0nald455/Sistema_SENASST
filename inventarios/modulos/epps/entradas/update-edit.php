<?php
include "../../../../db/conexion.php";

if(isset($_POST['update'])){

				$id				= intval($_POST['ID_Entradas']);
                $id_implementos	= intval($_POST['ID_Implementos']);
				$id_empleado	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ID_Empleado'], ENT_QUOTES)));
                $cantidad  		= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$descripcion  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
				
				$update = mysqli_query($conexion, "UPDATE tblentradas SET ID_Implementos='$id_implementos', ID_Empleado='$id_empleado', cantidad='$cantidad', descripcion='$descripcion' WHERE ID_Entradas='$id'");
				$sql = mysqli_query($conexion, "UPDATE tblimplementos SET cantidad = cantidad + $cantidad WHERE id_implementos = '$id_implementos'");

				if($update && $sql){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
?>