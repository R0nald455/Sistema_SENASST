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
				$ExtintorID	= mysqli_real_escape_string($conexion,(strip_tags($_POST['ExtintorID'], ENT_QUOTES)));
				$NumeroDeSerie	= mysqli_real_escape_string($conexion,(strip_tags($_POST['NumeroDeSerie'], ENT_QUOTES)));
				$TipoDeExtintor  	= mysqli_real_escape_string($conexion,(strip_tags($_POST['TipoDeExtintor'], ENT_QUOTES)));
				$FechaDeFabricacion = mysqli_real_escape_string($conexion,(strip_tags($_POST['FechaDeFabricacion'], ENT_QUOTES)));
				$FechaDeCompra  = mysqli_real_escape_string($conexion,(strip_tags($_POST['FechaDeCompra'], ENT_QUOTES)));
				$Ubicacion = mysqli_real_escape_string($conexion,(strip_tags($_POST['Ubicacion'], ENT_QUOTES)));
				$UbicacionEspecifica = mysqli_real_escape_string($conexion,(strip_tags($_POST['UbicacionEspecifica'], ENT_QUOTES)));
				$UltimaRecarga = mysqli_real_escape_string($conexion,(strip_tags($_POST['UltimaRecarga'], ENT_QUOTES)));
				$ProximaRecarga = mysqli_real_escape_string($conexion,(strip_tags($_POST['ProximaRecarga'], ENT_QUOTES)));
				$Comentarios = mysqli_real_escape_string($conexion,(strip_tags($_POST['Comentarios'], ENT_QUOTES)));
                $FechaDeRegistro = date("Y-m-d H:i:s");
		
				$insert = mysqli_query($conexion, "INSERT INTO extintores(ExtintorID, NumeroDeSerie, TipoDeExtintor, FechaDeFabricacion, FechaDeCompra, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios, FechaDeRegistro)
															VALUES('$ExtintorID','$NumeroDeSerie', '$TipoDeExtintor', '$FechaDeFabricacion', '$FechaDeCompra', '$Ubicacion', '$UbicacionEspecifica', '$UltimaRecarga', '$ProximaRecarga', '$Comentarios', '$FechaDeRegistro')") or die(mysqli_error($conexion));
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}
				
			}
			?>
                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">

										<blockquote>
											Registrar extintores 🧯
										</blockquote>
						
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="NumeroDeSerie">Numero de serie: <input type="text" name="NumeroDeSerie" id="NumeroDeSerie" placeholder="Ingrese el numero de serie." class="form-control" required></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="TipoDeExtintor">Tipo de extintor: 
													<select name="TipoDeExtintor" class="form-control">
														<option value="Agua">Extintor de agua</option>
														<option value="Agua pulverizada">Extintor de agua pulverizada</option>
														<option value="Espuma">Extintor de espuma</option>
														<option value="Polvo químico seco">Extintor de polvo químico seco</option>
														<option value="Dioxido de carbono (CO2)">Extintor de dioxido de carbono (CO2)</option>
														<option value="Polvo químico especializado (por ejemplo, para metales)">Extintor de polvo químico especializado</option>
														<option value="Halón">Extintor de halón</option>
														<option value="Aerosol de extinción">Extintor de aerosol de extinción</option>
														<option value="Acetato potásico">Extintor de acetato potásico</option>
													</select>
												</label>
											</div>
										</div>

										<div class="row">
												<div class="controls form-group col-md-6">
													<label class="control-label" for="FechaDeFabricacion">Fecha de fabricacion: <input name="FechaDeFabricacion" id="FechaDeFabricacion" class="form-control" type="date" required /></label>
												</div>

												<div class="controls form-group col-md-6">
													<label class="control-label" for="FechaDeCompra">Fecha de compra: <input name="FechaDeCompra" id="FechaDeCompra" class="form-control" type="date" required /></label>
												</div>
										</div>

                                        <div class="control-group">
											<div class="controls">
												<label class="control-label" for="Ubicacion">Ubicacion: <input name="Ubicacion" id="Ubicacion" class="form-control" type="text" placeholder="Ingrese la ubicacion." required /></label>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="UbicacionEspecifica">Ubicacion especifica: <input name="UbicacionEspecifica" id="UbicacionEspecifica" class="form-control" type="text" placeholder="Ingrese la ubicacion especifica." required /></label>
											</div>
										</div>

										<div class="row">
												<div class="controls form-group col-md-6">
													<label class="control-label" for="UltimaRecarga">Ultima recarga: <input name="UltimaRecarga" id="UltimaRecarga" class="form-control" type="date" required /></label>
												</div>

												<div class="controls form-group col-md-6">
													<label class="control-label" for="ProximaRecarga">Proxima recarga: <input name="ProximaRecarga" id="ProximaRecarga" class="form-control" type="date" required /></label>
												</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="Comentarios">Comentarios: <input name="Comentarios" id="Comentarios" class=" form-control" type="text" placeholder="Ingrese un comentario en base al extintor." required /></label>
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