<?php
session_start();
error_reporting(0);
require_once ("../../../db/conexion.php");
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
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">

										<blockquote>
											Registrar Elementos de Proteccion Personal ✅
										</blockquote>
						
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="nombre">Nombre: <input type="text" name="nombre" id="nombre" placeholder="Nombre del implemento" class="form-control" required></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="descripcion">Descripcion: <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del implemento" class="form-control" required></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="categoria">Categoria: <input name="categoria" id="categoria" class="form-control" type="text" placeholder="Ingrese a que categoria pertenece el producto"  required /></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="cantidad">Cantidad: <input name="cantidad" id="cantidad" class=" form-control" type="text" placeholder="Ingrese la cantidad" required /></label>
											</div>
										</div>

                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="ubicacion">Ubicacion: <input name="ubicacion" id="ubicacion" class=" form-control" type="text" placeholder="Ingrese la ubicacion" required /></label>
											</div>
										</div>

										<div class="control-group buttons-container">
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
