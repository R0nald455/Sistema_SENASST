<?php
session_start();
error_reporting(0);
require_once("../../../../db/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("head.php"); ?>
</head>

<body>

	<?php if (isset($_SESSION["id"])): ?>

		<?php include 'registrar.php'; ?>

		<div style="height: 90%; top: 50px;" class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="labelRegistroModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="labelRegistroModal">Registrar entradas ✅</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid"
							action="registrar.php" method="POST">

							<div class="control-group">
								<label class="control-label" for="ID_Implementos">Elementos de proteccion personal:</label>
								<input class="form-control" type="text" id="ID_Implementos" placeholder="Buscar EPP"
									autocomplete="off">
								<input type="hidden" id="producto_id" name="producto_id">
								<div id="ID_Implementos_Div"></div>
							</div>

							<div class="control-group">
								<label class="control-label" for="ID_Empleado">Responsable: </label>
								<input class="form-control" type="text" id="ID_Empleado"
									placeholder="Buscar persona responsable del EPP" autocomplete="off">
								<input type="hidden" id="empleado_id" name="empleado_id">
								<div id="ID_Empleado_Div"></div>
							</div>


							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="cantidad">Cantidad: <input type="number"
											name="cantidad" id="cantidad" placeholder="Ingrese la cantidad de implementos"
											class="form-control span8 tip" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="descripcion">Descripcion: <input name="descripcion"
											id="descripcion" class="form-control span8 tip" type="text"
											placeholder="Descripcion del estado de los implementos" required /></label>
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

		<script src="js/script.js"></script>
		<script src="js/scriptEmpleado.js"></script>

		<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



	<?php else: ?>

		<script>
			alert('No has iniciado sesion.');
			window.location.href = '../../../../php/login.php';
		</script>

	<?php endif; ?>
</body>