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
						$id = intval($_GET['id_entradas']);
						$sql = mysqli_query($conexion, "SELECT * FROM entradasbotiquin WHERE id_entradas='$id'");
						if (mysqli_num_rows($sql) == 0) {
							header("Location: index.php");
						} else {
							$row = mysqli_fetch_assoc($sql);
						}
						?>

						<center>
							<blockquote>
								<h1><b>Editar entradas 🖋️</b></h1>
							</blockquote>
							<h3><i>"En este apartado puedes dedicarte a editar los datos previamente registrados."</i>
							</h3>
						</center>

						<form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php"
							method="POST">

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Identificador de la entrada: <input
											type="text" name="id_entradas" id="id_entradas" readonly
											value="<?php echo $row['id_entradas']; ?>" placeholder=""
											class="form-control span8 tip"></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Identificador de Elemento del Botiquín:
										<input readonly type="text" name="id_elementos" id="id_elementos"
											value="<?php echo $row['id_elementos']; ?>" placeholder=""
											class="form-control span8 tip"></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Cantidad: <input readonly name="cantidad"
											id="cantidad" value="<?php echo $row['cantidad']; ?>"
											class="form-control span8 tip" type="number"></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Comentario: <input type="text"
											name="comentario" id="comentario" value="<?php echo $row['comentario']; ?>"
											placeholder="" class="form-control span8 tip"></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="fechaEntra">Fecha de entrada: <input name="fechaEntra"
											id="fechaEntra" value="<?php echo $row['fechaEntra']; ?>" class=" form-control"
											type="date" required /></label>
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