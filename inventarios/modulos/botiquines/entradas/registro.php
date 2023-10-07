<?php
session_start();
error_reporting(0);
include "../../../../db/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
</head>

<body>

	<?php if (isset($_SESSION["id"])): ?>

		<br>

		<div style="height: 90%; top: 50px;" class="modal fade" id="registroModal" tabindex="-1"
			aria-labelledby="labelRegistroModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="labelRegistroModal">Registrar entradas ✅</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid"
							action="registrar.php" method="POST">

							<div class="control-group">
								<label class="control-label" for="id_elementos">Elementos: </label>
								<input class="form-control" type="text" id="id_elementos" placeholder="Buscar elemento."
									autocomplete="off">
								<input type="hidden" id="producto_id" name="producto_id">
								<div id="ID_Botiquin_Div"></div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="cantidad">Cantidad: <input type="number" min="0"
											name="cantidad" id="cantidad"
											placeholder="Ingrese la cantidad de elementos a ingresar"
											class="form-control span8 tip" required></label>
								</div>
							</div>

							<div class="control-group">

								<div class="controls">
									<label class="control-label" for="descripcion">Comentario: <input name="comentario"
											id="comentario" class="form-control span8 tip" type="text"
											placeholder="Descripcion del estado de los elementos" required /></label>
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
					<!--/.content-->
				</div>
				<!--/.span9-->
			</div>
		</div>
		<!--/.container-->


		<?php
		session_start();
		if (isset($_SESSION['registro_entrada']) && $_SESSION['registro_entrada']) {
			echo '<script>
                                Swal.fire({
									imageUrl: "https://i.imgur.com/xE8OwWU.jpg",
									imageHeight: 200,
									imageAlt: "entrada confirmacion",
                                    title: "Entrada registrada exitosamente!",
                                    text: "Los datos de la entrada han sido registrados y la cantidad del elemento ha sido modificada.",
									confirmButtonColor: "#ffc107"
                                });
                            </script>';
			$_SESSION['registro_entrada'] = false; // Reinicia la variable de sesión
		}
		?>

		<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<?php else: ?>

		<script>
			alert("No has iniciado sesión, por favor inicia a continuación.");
			window.location.href = "../../../../php/login.php";
		</script>

	<?php endif; ?>
</body>