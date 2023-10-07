<?php
session_start();
error_reporting(0);
require_once("../../../db/conexion.php");
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
						$id = intval($_GET['ID_Implementos']);
						$sql = mysqli_query($conexion, "SELECT * FROM tblimplementos WHERE ID_Implementos='$id'");
						if (mysqli_num_rows($sql) == 0) {
							header("Location: index.php");
						} else {
							$row = mysqli_fetch_assoc($sql);
						}
						?>

						<center>
							<blockquote>
								<h1><b>Editar extintores 🖋️</b></h1>
							</blockquote>
							<h3><i>"En este apartado puedes dedicarte a editar los datos previamente registrados."</i>
							</h3>
						</center>

						<form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php"
							method="POST">

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">ID_Implementos: <input type="text"
											name="ID_Implementos" id="ID_Implementos"
											value="<?php echo $row['ID_Implementos']; ?>" placeholder=""
											class="form-control" readonly="readonly"></label>
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
											id="nombre" value="<?php echo $row['Nombre']; ?>" placeholder=""
											class="form-control" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Descripcion: <input type="text"
											name="descripcion" id="descripcion" value="<?php echo $row['Descripcion']; ?>"
											placeholder="" class="form-control" required></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Categoria: <input name="categoria"
											id="categoria" value="<?php echo $row['Categoria']; ?>" class="form-control"
											type="text" required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Cantidad: <input name="cantidad"
											id="cantidad" value="<?php echo $row['Cantidad']; ?>" class="form-control"
											type="text" required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Ubicacion: <input name="ubicacion"
											id="ubicacion" value="<?php echo $row['Ubicacion']; ?>" class="form-control"
											type="text" required /></label>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label class="control-label" for="basicinput">Fecha de registro: <input name="notelp"
											id="notelp" value="<?php echo $row['Fecha']; ?>" class=" form-control"
											type="text" disabled /></label>
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
			window.location.href = "../../../php/login.php";
		</script>

	<?php endif; ?>
</body>