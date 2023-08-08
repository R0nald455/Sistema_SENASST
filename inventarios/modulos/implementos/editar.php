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
           	$id = intval($_GET['ID_Implementos']);
			$sql = mysqli_query($conexion, "SELECT ID_Implementos, nombre, descripcion, categoria, cantidad, ubicacion, fecha FROM tblimplementos WHERE ID_Implementos='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
            
            <blockquote>
            Actualizar datos del cliente
            </blockquote>

                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">ID_Implementos: </label>
											<div class="controls">
												<input type="text" name="ID_Implementos" id="ID_Implementos" value="<?php echo $row['ID_Implementos']; ?>" placeholder="" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nombre: </label>
											<div class="controls">
												<input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre'];?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Descripcion: </label>
											<div class="controls">
												<input type="text" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Categoria: </label>
											<div class="controls">
												<input name="categoria" id="categoria" value="<?php echo $row['categoria']; ?>" class="form-control span8 tip" type="text"  required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Cantidad: </label>
											<div class="controls">
												<input name="cantidad" id="cantidad" value="<?php echo $row['cantidad']; ?>" class="form-control span8 tip" type="text"  required />
											</div>
										</div>

                                        <div class="control-group">
											<label class="control-label" for="basicinput">Ubicacion: </label>
											<div class="controls">
												<input name="ubicacion" id="ubicacion" value="<?php echo $row['ubicacion']; ?>" class="form-control span8 tip" type="text"  required />
											</div>
										</div>
                                        
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Fecha de registro: </label>
											<div class="controls">
												<input name="notelp" id="notelp" value="<?php echo $row['fecha']; ?>" class=" form-control span8 tip" type="text" disabled  />
											</div>
										</div>

										<div class="control-group">
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
    </body>
