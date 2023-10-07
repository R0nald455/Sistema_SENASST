<?php
session_start();
error_reporting(0);
include "../../../../db/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<head>
		<?php include("head.php"); ?>
	</head>

<body>
	<?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4): ?>
		<br>

		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="content">

						<?php
						$id = intval($_GET['id_salidas']);
						$sql = mysqli_query($conexion, "SELECT * FROM salidasbotiquin WHERE id_salidas='$id'");
						if (mysqli_num_rows($sql) == 0) {
							header("Location: index.php");
						} else {
							$row = mysqli_fetch_assoc($sql);
						}
						?>

						<center>
							<blockquote>
								<h1><b>Editar salidas 🖋️</b></h1>
							</blockquote>
							<h3><i>"En este apartado puedes dedicarte a editar los datos previamente registrados."</i>
							</h3>
						</center>

						<form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php"
							method="POST">

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="id_salidas">Identificador de la salida: <input
											type="text" name="id_salidas" id="id_salidas"
											value="<?php echo $row['id_salidas']; ?>" class="form-control" readonly></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Identificador de Elemento del Botiquín:
										<input type="text" name="id_elementos" id="id_elementos"
											value="<?php echo $row['id_elementos']; ?>" class="form-control"
											readonly></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Cantidad: <input name="cantidad"
											id="cantidad" value="<?php echo $row['cantidad']; ?>"
											class="form-control span8 tip" readonly></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Comentario: <input type="text"
											name="comentario" id="comentario" value="<?php echo $row['comentario']; ?>"
											placeholder="" class="form-control span8 tip" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Fecha de salida: <input name="fechaSale"
											id="fechaSale" value="<?php echo $row['fechaSale']; ?>"
											class=" form-control span8 tip" type="date"></label>
								</div>
							</div>

							<div class="control-group buttons-container">
								<div class="controls">
									<input type="submit" name="update" id="update" value="Actualizar"
										class="btn btn-sm btn-primary" />
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

	<?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../../../../php/login.php";
        </script>
		
	<?php endif; ?>
</body>