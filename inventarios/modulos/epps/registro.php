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

	<?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4): ?>

		<?php include 'registrar.php'; ?>

		<div style="height: 90%; top: 50px;" class="modal fade" id="registroModal" tabindex="-1"
			aria-labelledby="labelRegistroModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="labelRegistroModal">Registrar Elementos de Proteccion Personal ✅</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid"
							action="registrar.php" method="POST">

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="ImagenReferencia">Imagen de
										referencia: </label>
									<input name="ImagenReferencia" id="ImagenReferencia" class="form-control" type="file"
										accept="image/*" multiple />
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="nombre">Nombre: <input type="text" name="nombre"
											id="nombre" placeholder="Nombre del implemento" class="form-control"
											required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="descripcion">Descripcion: <input type="text"
											name="descripcion" id="descripcion" placeholder="Descripcion del implemento"
											class="form-control" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="categoria">Categoria: <input name="categoria"
											id="categoria" class="form-control" type="text"
											placeholder="Ingrese a que categoria pertenece el producto" required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="cantidad">Cantidad: <input name="cantidad"
											id="cantidad" class=" form-control" type="text"
											placeholder="Ingrese la cantidad" required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="ubicacion">Ubicacion: <input name="ubicacion"
											id="ubicacion" class=" form-control" type="text"
											placeholder="Ingrese la ubicacion" required /></label>
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

		<?php
		if (isset($_SESSION['registro_epp']) && $_SESSION['registro_epp']) {
			echo '<script>
                                Swal.fire({
									imageUrl: "https://i.imgur.com/IFvNSnw.gif",
									imageHeight: 200,
									imageAlt: "epps confirmacion",
                                    title: "¡Elemento de proteccion personal registrado exitosamente!",
                                    text: "Todos los datos del EPP han sido registrados en el sistema.",
									confirmButtonColor: "#12b071"
                                });
                            </script>';
			$_SESSION['registro_epp'] = false; // Reinicia la variable de sesión
		}
		?>

		<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<?php else: ?>

		<script>
			alert("No has iniciado sesión, por favor inicia a continuación.");
			window.location.href = "../../../php/login.php";
		</script>

	<?php endif; ?>
</body>