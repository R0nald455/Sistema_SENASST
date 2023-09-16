<?php
session_start();
error_reporting(0);
include "../../conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
           	$id = intval($_GET['id_elementos']);
			$sql = mysqli_query($conexion, "SELECT id_elementos, nombre, descripcion, cantidad, ubicacion, ubiEspecifica, estado, fechaRegis, comentarios, fechaInspec FROM botiquin WHERE id_elementos='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>

                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >

										<blockquote>
											Editar Elementos de Proteccion Personal 🖋️
										</blockquote>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Id de los Elementos: <input type="text" name="id_elementos" id="id_elementos" value="<?php echo $row['id_elementos']; ?>" placeholder="" class="form-control" readonly="readonly"></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre'];?>" placeholder="" class="form-control" required></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Descripcion: <input type="text" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>" placeholder="" class="form-control" required></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Cantidad: <input name="cantidad" id="cantidad" value="<?php echo $row['cantidad']; ?>" class="form-control" type="text"  required /></label>
											</div>
										</div>

                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Ubicacion: <input name="ubicacion" id="ubicacion" value="<?php echo $row['ubicacion']; ?>" class="form-control" type="text"  required /></label>
											</div>
										</div>
                                        
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Ubicacion específica: <input name="ubiEspecifica" id="ubiEspecifica" value="<?php echo $row['ubiEspecifica']; ?>" class="form-control" type="text"  required /></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Comentarios: <input name="comentarios" id="comentarios" value="<?php echo $row['comentarios']; ?>" class="form-control" type="text"  required /></label>
											</div>
										</div>
                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Fecha de Inspección: <input name="fechaInspec" id="fechaInspec" value="<?php echo $row['fechaInspec']; ?>" class=" form-control" type="date" required  /></label>
											</div>
										</div>

										<div class="control-group buttons-container">
											<div class="controls">
												<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
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
