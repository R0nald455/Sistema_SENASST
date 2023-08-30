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

				$NumeroDeSerie = $conexion->real_escape_string($_POST['NumeroDeSerie']);
				$TipoDeExtintor = $conexion->real_escape_string($_POST['TipoDeExtintor']);
				$FechaDeFabricacion = $conexion->real_escape_string($_POST['FechaDeFabricacion']);
				$FechaDeCompra  =$conexion->real_escape_string($_POST['FechaDeCompra']);
				$Ubicacion = $conexion->real_escape_string($_POST['Ubicacion']);
				$UbicacionEspecifica = $conexion->real_escape_string($_POST['UbicacionEspecifica']);
				$UltimaRecarga = $conexion->real_escape_string($_POST['UltimaRecarga']);
				$ProximaRecarga = $conexion->real_escape_string($_POST['ProximaRecarga']);
				$Comentarios = $conexion->real_escape_string($_POST['Comentarios']);

				$ImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
				$ImagenContenido = addslashes(file_get_contents($ImagenReferencia));

                $FechaDeRegistro = date("Y-m-d H:i:s");

				$stmt = $conexion->query("INSERT INTO extintores (NumeroDeSerie, TipoDeExtintor, FechaDeFabricacion, FechaDeCompra, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios, ImagenReferencia, FechaDeRegistro) VALUES ('$NumeroDeSerie', '$TipoDeExtintor', '$FechaDeFabricacion', '$FechaDeCompra', '$Ubicacion', '$UbicacionEspecifica', '$UltimaRecarga', '$ProximaRecarga', '$Comentarios', '$ImagenContenido', '$FechaDeRegistro')");
		
				// $insert = mysqli_query($conexion, "INSERT INTO extintores( NumeroDeSerie, TipoDeExtintor, FechaDeFabricacion, FechaDeCompra, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios, ImagenReferencia, FechaDeRegistro)
				// 											VALUES('$NumeroDeSerie', '$TipoDeExtintor', '$FechaDeFabricacion', '$FechaDeCompra', '$Ubicacion', '$UbicacionEspecifica', '$UltimaRecarga', '$ProximaRecarga', '$Comentarios', '$ImagenReferencia', '$FechaDeRegistro')") or die(mysqli_error($conexion));
						if($stmt){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}
			
				
			}
			?>
                        <form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST">

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
														<option value="Extintor de agua">Extintor de agua</option>
														<option value="Extintor de agua pulverizada">Extintor de agua pulverizada</option>
														<option value="Extintor de espuma">Extintor de espuma</option>
														<option value="Extintor de polvo químico seco">Extintor de polvo químico seco</option>
														<option value="Extintor de dioxido de carbono (CO2)">Extintor de dioxido de carbono (CO2)</option>
														<option value="Extintor de polvo químico especializado (por ejemplo, para metales)">Extintor de polvo químico especializado</option>
														<option value="Extintor de halón">Extintor de halón</option>
														<option value="Extintor de aerosol de extinción">Extintor de aerosol de extinción</option>
														<option value="Extintor de acetato potásico">Extintor de acetato potásico</option>
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

										
										<div class="control-group">
											<div class="controls">
												<label class="control-label" for="ImagenReferencia">Imagen de referencia: </label>
												<input name="ImagenReferencia" id="ImagenReferencia" class="form-control" type="file" accept="image/*" multiple />
											</div>
										</div>

										<div class="control-group buttons-container">
											<div class="controls">
												<input type="submit" name="input" id="input" value="Upload Image/Data" class="btn btn-sm btn-primary"></input>
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
