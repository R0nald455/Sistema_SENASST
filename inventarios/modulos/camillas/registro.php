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

        <?php include("registrar.php"); ?>

        <div style="height: 90%; top: 50px;" class="modal fade" id="registroModal" tabindex="-1"
            aria-labelledby="labelRegistroModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelRegistroModal">Registrar camillas 🚑</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid"
                            action="registrar.php" method="POST">

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="ImagenReferencia">Imagen de referencia: </label>
                                    <input name="ImagenReferencia" id="ImagenReferencia" class="form-control" type="file"
                                        accept="image/*" multiple />
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="TipoCamilla">Tipo de camilla: <input type="text"
                                            name="TipoCamilla" id="TipoCamilla" placeholder="Ingrese el tipo de camilla..."
                                            class="form-control" required></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Señalizacion">Señalizacion:
                                        <select name="Señalizacion" class="form-control">
                                            <option value="Cuenta con señalizacion. ✅">Cuenta con señalizacion. ✅</option>
                                            <option value="No cuenta con señalizacion. ❌">No cuenta con señalizacion. ❌
                                            </option>
                                        </select>
                                    </label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Acceso">Acceso:

                                        <select class="form-control" name="Acceso" id="Acceso">
                                            <option value="Acceso libre ✅">Acceso libre ✅</option>
                                            <option value="Acceso obstaculizado ❌">Acceso obstaculizado ❌</option>
                                        </select>

                                    </label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="EstadoSoporte">Estado del soporte:

                                        <select class="form-control" name="EstadoSoporte" id="EstadoSoporte">
                                            <option value="Buen estado ✅">Buen estado ✅</option>
                                            <option value="Mal estado ❌">Mal estado ❌</option>
                                        </select>

                                    </label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="CorreasSeguridad">Estado de las correas de seguridad:

                                        <select class="form-control" name="CorreasSeguridad" id="CorreasSeguridad">
                                            <option value="Buen estado ✅">Buen estado ✅</option>
                                            <option value="Mal estado ❌">Mal estado ❌</option>
                                        </select>

                                    </label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">

                                    <label class="control-label" for="Inmovilizador">Inmovilizador:

                                        <select class="form-control" name="Inmovilizador" id="Inmovilizador">
                                            <option value="Cuenta con inmovilizador ✅">Cuenta con inmovilizador ✅</option>
                                            <option value="No cuenta con inmovilizador ❌">No cuenta con inmovilizador ❌
                                            </option>
                                        </select>

                                    </label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Limpieza">Limpieza:

                                        <select class="form-control" name="Limpieza" id="Limpieza">
                                            <option value="Limpio ✅">Limpio ✅</option>
                                            <option value="Sucio ❌">Sucio ❌</option>
                                        </select>

                                    </label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="InstalacionPared">Instalacion en la pared:

                                        <select class="form-control" name="InstalacionPared" id="InstalacionPared">
                                            <option value="Cuenta con instalacion de pared ✅">Cuenta con instalacion de
                                                pared ✅</option>
                                            <option value="No cuenta con instalacion de pared ❌">No cuenta con instalacion
                                                de pared ❌</option>
                                        </select>

                                    </label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="UbicacionActual">Ubicacion:
                                        <select name="UbicacionActual" class="form-control">
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
                                    <label class="control-label" for="FechaAdquisicion">Fecha de adquisicion: <input
                                            name="FechaAdquisicion" id="FechaAdquisicion" class="form-control" type="date"
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="FechaUltimoMantenimiento">Ultimo mantenimiento: <input
                                            name="FechaUltimoMantenimiento" id="FechaUltimoMantenimiento"
                                            class="form-control" type="date" required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="FechaProximoMantenimiento">Proximo mantenimiento:
                                        <input name="FechaProximoMantenimiento" id="FechaProximoMantenimiento"
                                            class="form-control" type="date" required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Observaciones">Observaciones:

                                        <textarea class="form-control" id="Observaciones" name="Observaciones" rows="10"
                                            cols="50"
                                            placeholder="Ingrese sus observaciones acerca de la camilla."></textarea>

                                    </label>
                                </div>
                            </div>

                            <div class="control-group buttons-container">
                                <div class="controls">
                                    <input type="submit" name="input" id="input" value="Enviar"
                                        class="btn btn-sm btn-primary"></input>
                                    <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_SESSION['registro_camilla']) && $_SESSION['registro_camilla']) {
            echo '<script>
                                Swal.fire({
									imageUrl: "https://i.imgur.com/VxcH9d8.jpg",
									imageHeight: 200,
									imageAlt: "camilla confirmacion",
                                    title: "¡Camilla registrada exitosamente!",
                                    text: "Todos los datos de la camilla han sido registrados en el sistema.",
									confirmButtonColor: "#12b071"
                                });
                            </script>';
            $_SESSION['registro_camilla'] = false; // Reinicia la variable de sesión
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