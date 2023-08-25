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


            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
				$id_entradas	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ID_Entradas'], ENT_QUOTES)));
                $id_implementos	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ID_Implementos'], ENT_QUOTES)));
				$cantidad	= mysqli_real_escape_string($conexion,(strip_tags($_POST['cantidad'], ENT_QUOTES)));
				$descripcion  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
                $fecha = date("Y-m-d H:i:s");
		
				$insert = mysqli_query($conexion, "INSERT INTO tblentradas(ID_Entradas, ID_Implementos, Cantidad, Descripcion, Fecha)
															VALUES('$id_entradas', '$id_implementos', '$cantidad', '$descripcion', '$fecha')") or die(mysqli_error($conexion));
				$actualizar_cantidad = mysqli_query($conexion, "UPDATE tblimplementos SET cantidad = cantidad + $cantidad WHERE ID_Implementos = $id_implementos") or die(mysqli_error($conexion)); 
				
						if($insert && $actualizar_cantidad){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, la entrada ha sido ingresada correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar la entrada.</div>';
						}
				
			}
			?>
            
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">

										<blockquote>
										Registrar entradas ✅
										</blockquote>
						
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="ID_Implementos">Implementos: </label>
												<select id="categoryName" class="categoryName form-control" name="ID_Implementos"></select>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


	<script type="text/javascript">
			$('#categoryName').select2({
			"placeholder": 'Selecciona un implemento',
			"ajax": {
				"url": 'select.php',
				"dataType": 'json',
				"delay": 250,
				processResults: function (data) {
					return {
						"results": data
					};
				},
				"cache": true
			}
		});
	</script>
		

		<?php else:?>

			<h1>No has iniciado sesion.</h1>

		<?php endif; ?>
    </body>
