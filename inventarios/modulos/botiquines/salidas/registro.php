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
	<?php if (isset($_SESSION["id"])) : ?>
		<br>

		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="content">
	
					<?php include('registrar.php'); ?>

						<form name="form1" id="form1" class="form-horizontal row-fluid" action="registrar.php" method="POST">

							<blockquote>
								Registrar salida 🚩
							</blockquote>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="id_elementos">Ingrese el ID del elemento del Botiquín: <input type="number" name="id_elementos" id="id_elementos" placeholder="" class="form-control" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="cantidad">Cantidad: <input type="number" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad de elementos a retirar" class="form-control span8 tip" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="descripcion">Comentario: <input name="comentario" id="comentario" class="form-control span8 tip" type="text" placeholder="Descripcion del estado de los elementos" required /></label>
								</div>
							</div>

							<div class="control-group">
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

	<?php else : ?>

		<h1>No has iniciado sesion.</h1>

	<?php endif; ?>
</body>