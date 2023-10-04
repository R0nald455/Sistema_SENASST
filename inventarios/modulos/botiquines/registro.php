
<?php
session_start();
error_reporting(0);
require_once("../../../db/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("head.php");
    include("registrar.php");
    ?>
</head>

<body>

    <?php if (isset($_SESSION["id"])): ?>

		<div style="height: 90%; top: 50px;" class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="labelRegistroModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="labelRegistroModal">Registrar Botiquines 🏥</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

                        <form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid" action="registrar.php"
                            method="POST">

                            <blockquote>
                                
                            </blockquote>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="ImagenReferencia">Imagen de referencia: </label>
                                    <input name="ImagenReferencia" id="ImagenReferencia" class="form-control" type="file"
                                        accept="image/*" multiple />
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Nombre">Nombre y Tipo: <input type="text"
                                            name="Nombre" id="Nombre" placeholder="Ingrese el nombre y tipo de botiquin."
                                            class="form-control" required></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Ubicacion">Ubicacion:
                                        <select name="Ubicacion" class="form-control">
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
                                    <label class="control-label" for="UbicacionEspecifica">Ubicación Específica: <input
                                            name="UbicacionEspecifica" id="UbicacionEspecifica" class="form-control"
                                            type="text" placeholder="Ingrese detalladamente la ubicacion del botiquin."
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="FechaUltima">Fecha de la ultima revision: <input
                                            name="FechaUltima" id="FechaUltima" class="form-control" type="date"
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="FechaRevision">Fecha de la proxima revision: <input
                                            name="FechaRevision" id="FechaRevision" class="form-control" type="date"
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Responsable">Responsable de la ultima revision: <input
                                            name="Responsable" id="Responsable" class=" form-control" type="text"
                                            placeholder="Ingrese el nombre del responsable de la ultima revision."
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Comentarios">Comentarios: <input name="Comentarios"
                                            id="Comentarios" class=" form-control" type="text"
                                            placeholder="Ingrese un comentario acerca del estado o observaciones que se le puedan hacer al botiquin."
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
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->

        <?php
        session_start();
        if (isset($_SESSION['registro_botiquin']) && $_SESSION['registro_botiquin']) {
            echo '<script>
                                Swal.fire({
									imageUrl: "https://i.imgur.com/9piRVHS.gif",
									imageHeight: 200,
									imageAlt: "Botiquin confirmacion",
                                    title: "Botiquin registrado exitosamente!",
                                    text: "Los datos del botiquin han sido registrados.",
									confirmButtonColor: "#ffc107"
                                });
                            </script>';
            $_SESSION['registro_botiquin'] = false; // Reinicia la variable de sesión
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