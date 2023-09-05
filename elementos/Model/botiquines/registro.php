<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <?php include("head.php");
		include "../../conexion.php";?>
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
				$id_elementos	= $conexion ->real_escape_string($_POST['id_elementos']);
				$nombre	= $conexion -> real_escape_string($_POST['nombre']);
				$descripcion  	=  $conexion -> real_escape_string($_POST['descripcion']);
				$cantidad 	= $conexion -> real_escape_string($_POST['cantidad']);
				$ubicacion  = $conexion -> real_escape_string($_POST['ubicacion']);
				$ubiEspecifica = $conexion -> real_escape_string($_POST['ubiEspecifica']);
				$estado = $conexion -> real_escape_string($_POST['estado']);
				$fechaRegis = date("Y-m-d H:i:s");
				$comentarios = $conexion -> real_escape_string($_POST['comentarios']);
				$fechaInspec = $conexion -> real_escape_string($_POST['fechaInspec']);


				$stmt = $conexion->query("INSERT INTO botiquin (id_elementos, nombre, descripcion, cantidad, ubicacion, ubiEspecifica, estado, fechaRegis, 
					comentarios, fechaInspec) VALUES ('$id_elementos', '$nombre', '$descripcion', '$cantidad', '$ubicacion', '$ubiEspecifica', '$estado', '$fechaRegis', '$comentarios', '$fechaInspec')");

			//	$insert = mysqli_query($conexion, "INSERT INTO botiquin(id_elementos, nombre, descripcion, cantidad, ubicacion, ubiEspecifica, estado, fechaRegis, comentarios, fechaInspec)
			//												VALUES('$id_elementos', '$nombre', '$descripcion', '$cantidad', '$ubicacion', '$ubiEspecifica', '$estado', '$fechaRegis', '$comentarios', '$fechaInspec')") or die(mysqli_error($conexion));
						if($stmt){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}
				
			}
			?>
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">

										<blockquote>
											Registrar Elementos del Botiquin ✅
										</blockquote>
						
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="nombre">Nombre: <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del elemento." class="form-control" required></label>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="descripcion">Descripción: <input name="descripcion" id="descripcion" class=" form-control" type="text" placeholder="Ingrese un descripcion del elemento" required /></label>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="cantidad">Cantidad: <input name="cantidad" id="cantidad" class=" form-control" type="text" placeholder="Ingrese la cantidad de elementos." required /></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="ubicacion">Ubicación: 
													<select name="ubicacion" class="form-control">
														<option value="Administracion">Administración</option>
														<option value="Auditorio">Auditorio</option>
														<option value="Cafeteria">Cafeteria</option>
														<option value="Cocina">Cocina</option>
														<option value="Sistemas">Sistemas</option>
														<option value="Ganaderia">Ganaderia</option>
														<option value="Bloque A">Bloque A</option>
														<option value="Bloque B">Bloque B</option>
														<option value="Bloque C">Bloque C</option>
													</select>
												</label>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="ubiEspecifica">Ubicación Específica: <input name="ubiEspecifica" id="ubiEspecifica" class=" form-control" type="text" placeholder="Ingrese una ubicacion detallada." required /></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="comentarios">Comentarios: <input name="comentarios" id="comentarios" class=" form-control" type="text" placeholder="Ingrese un breve comentario." required /></label>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="fechaInspec">Fecha de Proxima Inspección: <input name="fechaInspec" id="fechaInspec" class=" form-control" type="date" required /></label>
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
