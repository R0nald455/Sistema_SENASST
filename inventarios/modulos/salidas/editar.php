<?php
session_start();
error_reporting(0);
require_once ("../../../db/conexion.php");
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
           	$id = intval($_GET['ID_Salidas']);
			$sql = mysqli_query($conexion, "SELECT ID_Salidas, ID_Implementos, ID_Empleado, cantidad, descripcion, fecha FROM tblsalidas WHERE ID_Salidas='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
										<blockquote>
											Editar salidas 🖋️
										</blockquote>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Identificador de la salida: <input type="text" name="ID_Salidas" id="ID_Salidas" value="<?php echo $row['ID_Salidas']; ?>" placeholder="" class="form-control" readonly="readonly"></label>
											</div>
										</div>

                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Identificador del implemento: <input type="text" name="ID_Implementos" id="ID_Implementos" value="<?php echo $row['ID_Implementos']; ?>" placeholder="" class="form-control" readonly="readonly"></label>
											</div>
										</div>

                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Identificador del empleado: <input type="text" name="ID_Empleado" id="ID_Empleado" value="<?php echo $row['ID_Empleado']; ?>" placeholder="" class="form-control span8 tip"></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Cantidad: <input name="cantidad" id="cantidad" value="<?php echo $row['cantidad']; ?>" class="form-control span8 tip" type="text"  readonly="readonly"/></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Descripcion: <input type="text" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>" placeholder="" class="form-control span8 tip" required></label>
											</div>
										</div>
                                        
                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Fecha de salida: <input name="notelp" id="notelp" value="<?php echo $row['fecha']; ?>" class=" form-control span8 tip" type="text" disabled  /></label>
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
