<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php");
	include "../../../../db/conexion.php"; ?>
</head>

<body>

	<?php if (isset($_SESSION["id"])) : ?>

		<br>
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="content">
						<form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid" action="registrar.php" method="POST">

							<blockquote>
								Registrar Elementos del Botiquin ✅
							</blockquote>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="id_botiquin">ID del Botiquin: <input type="text" name="id_botiquin" id="id_botiquin" placeholder="Ingrese el ID del respectivo botiquin al que pertenece." class="form-control" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="ImagenReferencia">Imagen de referencia: </label>
									<input name="ImagenReferencia" id="ImagenReferencia" class="form-control" type="file" accept="image/*" multiple />
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="nombre">Nombre y tipo: <input name="nombre" id="nombre" class="form-control" type="text" placeholder="Ingrese el nombre del elemento." required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="cantidad">Cantidad: <input name="cantidad" id="cantidad" class="form-control" type="text" placeholder="Ingrese la cantidad de elementos." required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="ubicacion">Ubicación:
										<select name="ubicacion" class="form-control">
											<option value="Administracion">Administracion</option>
											<option value="Auditorio">Auditorio
											</option>
											<option value="Bloque A">Bloque A</option>
											<option value="Bloque B">Bloque B
											</option>
											<option value="Bloque C">Bloque C</option>
											<option value="Biblioteca">
												Biblioteca</option>
											<option value="Administracion educativa">Administracion educativa</option>
											<option value="Emprendimiento">Emprendimiento</option>
											<option value="Gastronomia">Gastronomia
											</option>
											<option value="Estar de instructores">Estar de instructores
											</option>
											<option value="Centro de convivencia">Centro de convivencia
											</option>
											<option value="Maquinaria agricola">Maquinaria agricola
											</option>
											<option value="Agroindustria">Agroindustria
											</option>
											<option value="Ganaderia">Ganaderia
											</option>
											<option value="Especies menores y mayores">Especies menores y mayores
											</option>
											<option value="Agricultura">Agricultura
											</option>
											<option value="Agricultura">Unidad de recursos naturales
											</option>
										</select>
									</label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="ubicacionEspecifica">Ubicación Específica: <input name="ubicacionEspecifica" id="ubicacionEspecifica" class=" form-control" type="text" placeholder="Ingrese una ubicacion detallada." required /></label>
								</div>
							</div>

				            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="estado">Estado: <input
                                            name="estado" id="estado" class="form-control" type="text"  placeholder="Ingrese en que estado se encuentra el elemento."
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="fechaRegistro">Fecha en que se registra el elemento: <input
                                            name="fechaRegistro" id="fechaRegistro" class="form-control" type="date"
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="fechaVencimiento">Fecha de vencimiento: <input
                                            name="fechaVencimiento" id="fechaVencimiento" class="form-control" type="date"
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="comentarios">Comentarios: <input name="comentarios"
                                            id="comentarios" class="form-control" type="text"
                                            placeholder="Ingrese un comentario acerca del estado o observaciones que se le puedan hacer al elemento."
                                            required /></label>
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

		<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<?php else : ?>

		<h1>No has iniciado sesion.</h1>

	<?php endif; ?>
</body>