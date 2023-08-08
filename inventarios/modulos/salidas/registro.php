<?php include "../../../db/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("head.php");?>
    </head>
    <body>
    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Administrador de salidas</a>
                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
                $id_implementos	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ID_Implementos'], ENT_QUOTES)));
                $id_empleado	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ID_Empleado'], ENT_QUOTES)));
				$cantidad	= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$descripcion  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
                $fecha = date("Y-m-d H:i:s");
		
				$insert = mysqli_query($conexion, "INSERT INTO tblsalidas(ID_Salidas, ID_Implementos, ID_Empleado, Cantidad, Descripcion, Fecha)
															VALUES(NULL, '$id_implementos', '$id_empleado', '$cantidad', '$descripcion', '$fecha')") or die(mysqli_error());
				$actualizar_cantidad = mysqli_query($conexion, "UPDATE tblimplementos SET cantidad = cantidad - $cantidad WHERE ID_Implementos = $id_implementos") or die(mysqli_error()); 
						
                if($insert && $actualizar_cantidad){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, la entrada ha sido ingresada correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar la entrada.</div>';
						}
				
			}
			?>
            
            <blockquote>
            Agregar salida
            </blockquote>
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">
										<div class="control-group">
											<label class="control-label" for="ID_Implementos">Implementos: </label>
											<div class="controls">
												<input type="text" name="ID_Implementos" id="ID_Implementos" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

                                        <div class="control-group">
											<label class="control-label" for="ID_Empleado">Empleados: </label>
											<div class="controls">
												<input type="text" name="ID_Empleado" id="ID_Empleado" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="cantidad">Cantidad: </label>
											<div class="controls">
												<input type="text" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad de implementos" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="descripcion">Descripcion: </label>
											<div class="controls">
												<input name="descripcion" id="descripcion" class="form-control span8 tip" type="text" placeholder="Descripcion del estado de los implementos"  required />
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
    </body>
