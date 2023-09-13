<?php
session_start();
error_reporting(0);
require_once("../../../db/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
</head>

<body>

	<?php if (isset($_SESSION["id"])): ?>

						<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="labelRegistroModal"
							aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="labelRegistroModal">Registrar extintores 🧯</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form enctype="multipart/form-data" name="form1" id="form1"
											class="form-horizontal row-fluid" action="registrar.php" method="POST">

											<div class="control-group">
												<div class="controls">
													<label class="control-label" for="NumeroDeSerie">Numero de serie: <input
															type="text" name="NumeroDeSerie" id="NumeroDeSerie"
															placeholder="Ingrese el numero de serie." class="form-control"
															required></label>
												</div>
											</div>

											<div class="control-group">
												<div class="controls">
													<label class="control-label" for="TipoDeExtintor">Tipo de extintor:
														<select name="TipoDeExtintor" class="form-control">
															<option value="Extintor de agua">Extintor de agua</option>
															<option value="Extintor de agua pulverizada">Extintor de agua
																pulverizada
															</option>
															<option value="Extintor de espuma">Extintor de espuma</option>
															<option value="Extintor de polvo químico seco">Extintor de polvo
																químico seco
															</option>
															<option value="Extintor de dioxido de carbono (CO2)">Extintor de
																dioxido de
																carbono (CO2)</option>
															<option
																value="Extintor de polvo químico especializado (por ejemplo, para metales)">
																Extintor de polvo químico especializado</option>
															<option value="Extintor de halón">Extintor de halón</option>
															<option value="Extintor de aerosol de extinción">Extintor de
																aerosol de
																extinción</option>
															<option value="Extintor de acetato potásico">Extintor de acetato
																potásico
															</option>
														</select>
													</label>
												</div>
											</div>

											<div class="row">
												<div class="controls form-group col-md-6">
													<label class="control-label" for="FechaDeFabricacion">Fecha de
														fabricacion: <input name="FechaDeFabricacion"
															id="FechaDeFabricacion" class="form-control" type="date"
															required /></label>
												</div>

												<div class="controls form-group col-md-6">
													<label class="control-label" for="FechaDeCompra">Fecha de compra: <input
															name="FechaDeCompra" id="FechaDeCompra" class="form-control"
															type="date" required /></label>
												</div>
											</div>

											<div class="control-group">
												<div class="controls">
													<label class="control-label" for="Ubicacion">Ubicacion: <input
															name="Ubicacion" id="Ubicacion" class="form-control" type="text"
															placeholder="Ingrese la ubicacion." required /></label>
												</div>
											</div>

											<div class="control-group">
												<div class="controls">
													<label class="control-label" for="UbicacionEspecifica">Ubicacion
														especifica: <input name="UbicacionEspecifica"
															id="UbicacionEspecifica" class="form-control" type="text"
															placeholder="Ingrese la ubicacion especifica."
															required /></label>
												</div>
											</div>

											<div class="row">
												<div class="controls form-group col-md-6">
													<label class="control-label" for="UltimaRecarga">Ultima recarga: <input
															name="UltimaRecarga" id="UltimaRecarga" class="form-control"
															type="date" required /></label>
												</div>

												<div class="controls form-group col-md-6">
													<label class="control-label" for="ProximaRecarga">Proxima recarga:
														<input name="ProximaRecarga" id="ProximaRecarga"
															class="form-control" type="date" required /></label>
												</div>
											</div>

											<div class="control-group">
												<div class="controls">
													<label class="control-label" for="Comentarios">Comentarios: <input
															name="Comentarios" id="Comentarios" class=" form-control"
															type="text"
															placeholder="Ingrese un comentario en base al extintor."
															required /></label>
												</div>
											</div>


											<div class="control-group">
												<div class="controls">
													<label class="control-label" for="ImagenReferencia">Imagen de
														referencia: </label>
													<input name="ImagenReferencia" id="ImagenReferencia"
														class="form-control" type="file" accept="image/*" multiple />
												</div>
											</div>

											<div class="control-group buttons-container">
												<div class="controls">
													<input type="submit" name="input" id="input" value="Registrar"
														class="btn btn-sm btn-primary"></input>
													<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

		<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<?php else: ?>

		<h1>No has iniciado sesion.</h1>

	<?php endif; ?>
</body>