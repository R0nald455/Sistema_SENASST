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

    <?php if (isset($_SESSION["id"])): ?>

        <?php
        if (isset($_POST['input'])) {

            $ImagenReferencia = $_FILES['ImagenReferencia']['tmp_name'];
            $ImagenContenido = addslashes(file_get_contents($ImagenReferencia));

            $TipoCamilla = $conexion->real_escape_string($_POST['TipoCamilla']);
            $Señalizacion = $conexion->real_escape_string($_POST['Señalizacion']);
            $Acceso = $conexion->real_escape_string($_POST['Acceso']);
            $EstadoSoporte = $conexion->real_escape_string($_POST['EstadoSoporte']);
            $CorreasSeguridad = $conexion->real_escape_string($_POST['CorreasSeguridad']);
            $Inmovilizador = $conexion->real_escape_string($_POST['Inmovilizador']);
            $Limpieza = $conexion->real_escape_string($_POST['Limpieza']);
            $InstalacionPared = $conexion->real_escape_string($_POST['InstalacionPared']);
            $UbicacionActual = $conexion->real_escape_string($_POST['UbicacionActual']);
            $FechaAdquisicion = $conexion->real_escape_string($_POST['FechaAdquisicion']);
            $FechaUltimoMantenimiento = $conexion->real_escape_string($_POST['FechaUltimoMantenimiento']);
            $FechaProximoMantenimiento = $conexion->real_escape_string($_POST['FechaProximoMantenimiento']);
            $Observaciones = $conexion->real_escape_string($_POST['Observaciones']);

            $FechaRegistro = date("Y-m-d H:i:s");

            $stmt = $conexion->query("INSERT INTO camillas (ImagenReferencia, TipoCamilla, Señalizacion, Acceso, EstadoSoporte, CorreasSeguridad, Inmovilizador, Limpieza, InstalacionPared, UbicacionActual, FechaAdquisicion, FechaUltimoMantenimiento, FechaProximoMantenimiento, Observaciones, FechaRegistro) VALUES ('$ImagenContenido', '$TipoCamilla', '$Señalizacion', '$Acceso', '$EstadoSoporte', '$CorreasSeguridad', '$Inmovilizador', '$Limpieza', '$InstalacionPared', '$UbicacionActual', '$FechaAdquisicion', '$FechaUltimoMantenimiento', '$FechaProximoMantenimiento', '$Observaciones', '$FechaRegistro')");
            if ($stmt) {
                echo '<script>
                alert("La camilla ha sido ingresada exitosamente.")
                window.location.href="index.php";
                </script>';
            } else {
                echo '<script>
                alert("Error al ingresar los datos.")
                window.location.href="index.php";
                </script>';
            }
        }
        ?>

        <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="labelRegistroModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelRegistroModal">Registrar camillas 🚑</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid"
                            action="registro.php" method="POST">

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
                                            <option value="Si">Si, cuenta con señalizacion. ✅</option>
                                            <option value="No">No, no cuenta con señalizacion. ❌
                                            </option>
                                        </select>
                                    </label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Acceso">Acceso:

                                        <select class="form-control" name="Acceso" id="Acceso">
                                            <option value="Acceso libre">Acceso libre ✅</option>
                                            <option value="Acceso obstaculizado">Acceso obstaculizado ❌</option>
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

        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <?php else: ?>

        <h1>No has iniciado sesion.</h1>

    <?php endif; ?>
</body>