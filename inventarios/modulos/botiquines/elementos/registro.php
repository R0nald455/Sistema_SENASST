<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include("head.php");
	include "../../../../db/conexion.php"; ?>
</head>

<body>

<?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4): ?>

		<?php
		include("registrar.php");
		?>


		<div style="height: 90%; top: 50px;" class="modal fade" id="registroModal" tabindex="-1"
			aria-labelledby="labelRegistroModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="labelRegistroModal">Registrar Elementos del Botiquin 💊</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid"
							action="registrar.php" method="POST">

							<div class="control-group">
								<label class="control-label" for="id_botiquin">Botiquines: </label>
								<input class="form-control" type="text" id="id_botiquin" placeholder="Buscar botiquin."
									autocomplete="off">
								<input type="hidden" id="producto_id" name="producto_id">
								<div id="ID_Botiquin_Div"></div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="ImagenReferencia">Imagen de referencia: </label>
									<input name="ImagenReferencia" id="ImagenReferencia" class="form-control" type="file"
										accept="image/*" multiple />
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="nombre">Nombre del elemento: <input name="nombre"
											id="nombre" class="form-control" type="text"
											placeholder="Ingrese el nombre del elemento." required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="cantidad">Cantidad: <input name="cantidad"
											id="cantidad" class="form-control" type="number"
											placeholder="Ingrese la cantidad de elementos." required /></label>
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
									<label class="control-label" for="ubicacionEspecifica">Ubicación Específica: <input
											name="ubicacionEspecifica" id="ubicacionEspecifica" class=" form-control"
											type="text" placeholder="Ingrese una ubicacion detallada." required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="estado">Estado: <input name="estado" id="estado"
											class="form-control" type="text"
											placeholder="Ingrese en que estado se encuentra el elemento."
											required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="fechaRegistro">Fecha en que se registra el elemento:
										<input name="fechaRegistro" id="fechaRegistro" class="form-control" type="date"
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
									<button type="submit" name="input" id="input"
										class="btn btn-sm btn-primary">Registrar</button>
									<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/scriptBotiquines.js"></script>

		<?php
		session_start();
		if (isset($_SESSION['registro_elemento']) && $_SESSION['registro_elemento']) {
			echo '<script>
                                Swal.fire({
									imageUrl: "https://i.imgur.com/sSiUe2d.jpg",
									imageHeight: 200,
									imageAlt: "Elemento confirmacion",
                                    title: "Elemento registrado exitosamente!",
                                    text: "Los datos del elemento han sido registrados.",
									confirmButtonColor: "#0d6efd"
                                });
                            </script>';
			$_SESSION['registro_elemento'] = false; // Reinicia la variable de sesión
		}
		?>


	<?php else: ?>

		<script>
			alert("No has iniciado sesion");
			window.location.href = "../../../../php/login.php";
		</script>

	<?php endif; ?>
</body>