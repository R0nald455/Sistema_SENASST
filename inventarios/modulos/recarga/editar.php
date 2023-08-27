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
           	$ExtintorID = intval($_GET['ExtintorID']);
			$sql = mysqli_query($conexion, "SELECT ExtintorID, NumeroDeSerie, TipoDeExtintor, FechaDeFabricacion, FechaDeCompra, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios, FechaDeRegistro FROM extintores WHERE ExtintorID='$ExtintorID'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>

                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >

										<blockquote>
											Editar extintor 🖋️
										</blockquote>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="basicinput">Identificador del extintor: <input type="text" name="ExtintorID" id="ExtintorID" value="<?php echo $row['ExtintorID']; ?>" placeholder="" class="form-control" readonly="readonly"></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="NumeroDeSerie">Numero de serie: <input type="text" name="NumeroDeSerie" id="NumeroDeSerie" value="<?php echo $row['NumeroDeSerie']; ?>" placeholder="Ingrese el numero de serie." class="form-control" required></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="TipoDeExtintor">Tipo de extintor: 
													<select name="TipoDeExtintor" class="form-control" value="<?php echo $row['TipoDeExtintor']; ?>">
														<option value="Agua">Extintor de agua</option>
														<option value="Espuma">Extintor de espuma</option>
														<option value="Polvo químico seco">Extintor de polvo químico seco</option>
														<option value="Dioxido de carbono (CO2)">Extintor de dioxido de carbono (CO2)</option>
														<option value="Polvo químico especializado (por ejemplo, para metales)">Extintor de polvo químico especializado</option>
														<option value="Halón">Extintor de halón</option>
														<option value="Aerosol de extinción">Extintor de aerosol de extinción</option>
													</select>
												</label>
											</div>
										</div>

										<div class="row">
												<div class="controls form-group col-md-6">
													<label class="control-label" for="FechaDeFabricacion">Fecha de fabricacion: <input name="FechaDeFabricacion" id="FechaDeFabricacion" class="form-control" type="date" value="<?php echo $row['FechaDeFabricacion']; ?>" required /></label>
												</div>

												<div class="controls form-group col-md-6">
													<label class="control-label" for="FechaDeCompra">Fecha de compra: <input name="FechaDeCompra" id="FechaDeCompra" class="form-control" type="date" value="<?php echo $row['FechaDeCompra']; ?>" required /></label>
												</div>
										</div>

                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="Ubicacion">Ubicacion: <input name="Ubicacion" id="Ubicacion" class="form-control" type="text" value="<?php echo $row['Ubicacion']; ?>" placeholder="Ingrese la ubicacion." required /></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="UbicacionEspecifica">Ubicacion especifica: <input name="UbicacionEspecifica" id="UbicacionEspecifica" class="form-control" type="text" value="<?php echo $row['UbicacionEspecifica']; ?>" placeholder="Ingrese la ubicacion especifica." required /></label>
											</div>
										</div>

										<div class="row">
												<div class="controls form-group col-md-6">
													<label class="control-label" for="UltimaRecarga">Ultima recarga: <input name="UltimaRecarga" id="UltimaRecarga" class="form-control" type="date" value="<?php echo $row['UltimaRecarga']; ?>" required /></label>
												</div>

												<div class="controls form-group col-md-6">
													<label class="control-label" for="ProximaRecarga">Proxima recarga: <input name="ProximaRecarga" id="ProximaRecarga" class="form-control" type="date" value="<?php echo $row['ProximaRecarga']; ?>" required /></label>
												</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="Comentarios">Comentarios: <input name="Comentarios" id="Comentarios" class=" form-control" type="text" value="<?php echo $row['Comentarios']; ?>" placeholder="Ingrese un comentario en base al extintor." required /></label>
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
