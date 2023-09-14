<?php
session_start();
error_reporting(0);
require_once ("../../../../db/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("head.php");?>
    </head>
    <body>
		<?php if(isset($_SESSION["id"]) ): ?>
		<br>

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
				$id_salidas	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ID_Salidas'], ENT_QUOTES)));
                $id_implementos	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ID_Implementos'], ENT_QUOTES)));
                $id_empleado	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ID_Empleado'], ENT_QUOTES)));
				$cantidad	= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$descripcion  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
                $fecha = date("Y-m-d H:i:s");
		
				$insert = mysqli_query($conexion, "INSERT INTO tblsalidas(ID_Salidas, ID_Implementos, ID_Empleado, Cantidad, Descripcion, Fecha)
															VALUES('$id_salidas', '$id_implementos', '$id_empleado', '$cantidad', '$descripcion', '$fecha')") or die(mysqli_error($conexion));
				$actualizar_cantidad = mysqli_query($conexion, "UPDATE tblimplementos SET cantidad = cantidad - $cantidad WHERE ID_Implementos = $id_implementos") or die(mysqli_error($conexion)); 
						
                if($insert && $actualizar_cantidad){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, la entrada ha sido ingresada correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar la entrada.</div>';
						}
				
			}
			?>
            
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">

										<blockquote>
											Registrar salida 🚩
										</blockquote>
						
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="ID_Implementos">Elementos de Proteccion Personal: <input type="text" name="ID_Implementos" id="ID_Implementos" placeholder="" class="form-control" required></label>
											</div>
										</div>

                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="ID_Empleado">Empleados: <input type="text" name="ID_Empleado" id="ID_Empleado" placeholder="" class="form-control span8 tip" required></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="cantidad">Cantidad: <input type="text" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad de implementos" class="form-control span8 tip" required></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="descripcion">Descripcion: <input name="descripcion" id="descripcion" class="form-control span8 tip" type="text" placeholder="Descripcion del estado de los implementos"  required /></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                                                <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
											</div>
										</div>
									</form>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->

        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

		<?php else:?>

		<h1>No has iniciado sesion.</h1>

		<?php endif; ?>
    </body>
