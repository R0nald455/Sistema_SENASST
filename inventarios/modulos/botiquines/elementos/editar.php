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
						$id = intval($_GET['id_elementos']);
						$sql = mysqli_query($conexion, "SELECT * FROM elementosbotiquines WHERE id_elementos='$id'");
						if (mysqli_num_rows($sql) == 0) {
							header("Location: index.php");
						} else {
							$row = mysqli_fetch_assoc($sql);
						}
						?>

						<center>
							<blockquote>
								<h1><b>Editar botiquines 🖋️</b></h1>
							</blockquote>
							<h3><i>"En este apartado puedes dedicarte a editar los datos previamente registrados."</i>
							</h3>
						</center>

						<form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid"
							action="update-edit.php" method="POST">

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Id de los Elementos: <input type="text"
											name="id_elementos" id="id_elementos"
											value="<?php echo $row['id_elementos']; ?>" placeholder="" class="form-control"
											readonly="readonly"></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Id del botiquin: <input type="text"
											name="id_botiquin" id="id_botiquin" value="<?php echo $row['id_botiquin']; ?>"
											placeholder="" class="form-control"></label>
								</div>
							</div>

							<?php
							echo '<img src="data:imag/png;base64,' . base64_encode($row['ImagenReferencia']) . '" alt="Imagen" style="width: 150px; height:150px;" >'
								?>


							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="ImagenReferencia">Imagen de referencia: </label>
									<input name="ImagenReferencia" id="ImagenReferencia" class="form-control" type="file"
										accept="image/*" multiple />
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Nombre: <input type="text" name="nombre"
											id="nombre" value="<?php echo $row['nombre']; ?>" placeholder=""
											class="form-control" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Cantidad: <input name="cantidad"
											id="cantidad" value="<?php echo $row['cantidad']; ?>" class="form-control"
											type="text" required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Ubicacion: <input name="ubicacion"
											id="ubicacion" value="<?php echo $row['ubicacion']; ?>" class="form-control"
											type="text" required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Ubicacion específica: <input
											name="ubicacionEspecifica" id="ubicacionEspecifica"
											value="<?php echo $row['ubicacionEspecifica']; ?>" class="form-control"
											type="text" required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Estado: <input type="text" name="estado"
											id="estado" value="<?php echo $row['estado']; ?>" placeholder=""
											class="form-control" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Fecha de registro del elemento: <input
											name="fechaRegistro" id="fechaRegistro"
											value="<?php echo $row['fechaRegistro']; ?>" class="form-control" type="date"
											required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Fecha de vencimiento: <input
											name="fechaVencimiento" id="fechaVencimiento"
											value="<?php echo $row['fechaVencimiento']; ?>" class=" form-control"
											type="date" required /></label>
								</div>
							</div>


							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Comentarios: <input type="text"
											name="comentarios" id="comentarios" value="<?php echo $row['comentarios']; ?>"
											placeholder="" class="form-control" required></label>
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

		<script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<?php else: ?>

		<script>
			alert("No has iniciado sesión, por favor inicia a continuación.");
			window.location.href = "../../../../php/login.php";
		</script>

	<?php endif; ?>
</body>