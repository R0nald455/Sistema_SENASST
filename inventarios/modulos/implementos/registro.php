<?php include "../../../db/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <?php include("head.php");?>
    </head>
    <body>
	<br>
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
				$id_implementos	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ID_Implementos'], ENT_QUOTES)));
				$nombre	= mysqli_real_escape_string($conexion,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$descripcion  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
				$categoria 	= mysqli_real_escape_string($conexion,(strip_tags($_POST['categoria'], ENT_QUOTES)));
				$cantidad  = mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$ubicacion = mysqli_real_escape_string($conexion,(strip_tags($_POST['ubicacion'], ENT_QUOTES)));
                $fecha = date("Y-m-d H:i:s");
		
				$insert = mysqli_query($conexion, "INSERT INTO tblimplementos(ID_Implementos, Nombre, Descripcion, Categoria, Cantidad, Ubicacion, Fecha)
															VALUES('$id_implementos','$nombre', '$descripcion', '$categoria', '$cantidad', '$ubicacion', '$fecha')") or die(mysqli_error($conexion));
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}
				
			}
			?>
            
            <blockquote>
            Agregar cliente
            </blockquote>
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">
										
										<div class="control-group">
											<label class="control-label" for="nombre">ID del implemento:</label>
											<div class="controls">
												<input type="text" name="ID_Implementos" id="id_implementos" placeholder="Ingrese el ID del implemento" class="form-control span8 tip" required>
											</div>
										</div>
						
										<div class="control-group">
											<label class="control-label" for="nombre">Nombre:</label>
											<div class="controls">
												<input type="text" name="nombre" id="nombre" placeholder="Nombre del implemento" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="descripcion">Descripcion</label>
											<div class="controls">
												<input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del implemento" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="categoria">Categoria: </label>
											<div class="controls">
												<input name="categoria" id="categoria" class="form-control span8 tip" type="text" placeholder="Ingrese a que categoria pertenece el producto"  required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="cantidad">Cantidad: </label>
											<div class="controls">
												<input name="cantidad" id="cantidad" class=" form-control span8 tip" type="text" placeholder="Ingrese la cantidad" required />
											</div>
										</div>

                                        <div class="control-group">
											<label class="control-label" for="ubicacion">Ubicacion: </label>
											<div class="controls">
												<input name="ubicacion" id="ubicacion" class=" form-control span8 tip" type="text" placeholder="Ingrese la ubicacion" required />
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