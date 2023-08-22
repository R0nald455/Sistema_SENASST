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
           	$id = intval($_GET['ID_Entradas']);
			$sql = mysqli_query($conexion, "SELECT ID_Entradas, ID_Implementos, cantidad, descripcion, fecha FROM tblentradas WHERE ID_Entradas='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
										
										<blockquote>
											Editar entradas 🖋️
										</blockquote>
										
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Identificador de la entrada: <input type="text" name="ID_Entradas" id="ID_Entradas" value="<?php echo $row['ID_Entradas']; ?>" placeholder="" class="form-control span8 tip" readonly="readonly"></label>
											</div>
										</div>

                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Identificador del implemento: <input type="text" name="ID_Implementos" id="ID_Implementos" value="<?php echo $row['ID_Implementos']; ?>" placeholder="" class="form-control span8 tip" readonly="readonly"></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Cantidad: <input name="cantidad" id="cantidad" value="<?php echo $row['cantidad']; ?>" class="form-control span8 tip" type="text"  readonly="readonly" /></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Descripcion: <input type="text" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>" placeholder="" class="form-control span8 tip" required></label>
											</div>
										</div>
                                        
                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Fecha de entrada: <input name="notelp" id="notelp" value="<?php echo $row['fecha']; ?>" class=" form-control" type="text" disabled/></label>
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
    </body>
