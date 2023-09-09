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

        <br>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="content">
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
                                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
                            }


                        }
                        ?>
                        <form enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal row-fluid"
                            action="registro.php" method="POST">

                            <blockquote>
                                Registrar camillas 🚑
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
                                    <label class="control-label" for="TipoCamilla">Tipo de camilla: <input type="text"
                                            name="TipoCamilla" id="TipoCamilla" placeholder="Ingrese el tipo de camilla..."
                                            class="form-control" required></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Señalizacion">Señalizacion:
                                        <select name="Señalizacion" class="form-control">
                                            <option value="Si">Si, cuenta con señalizacion.</option>
                                            <option value="No">No, no cuenta con señalizacion.
                                            </option>
                                        </select>
                                    </label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Acceso">Acceso: <input name="Acceso" id="Acceso"
                                            class="form-control" type="text"
                                            placeholder="Ingrese como esta el acceso a la camilla..." required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="EstadoSoporte">Estado del soporte: <input
                                            name="EstadoSoporte" id="EstadoSoporte" class="form-control" type="text"
                                            placeholder="Ingrese en que estado esta el soporte de la camilla..."
                                            required /></label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="CorreasSeguridad">Estado de las correas de seguridad:
                                        <input name="CorreasSeguridad" id="CorreasSeguridad" class="form-control"
                                            type="text" placeholder="Ingrese el estado de las correas de seguridad..."
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Inmovilizador">Inmovilizador: <input
                                            name="Inmovilizador" id="Inmovilizador" class="form-control" type="text"
                                            placeholder="Ingrese el estado del inmovilizador..." required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Limpieza">Limpieza: <input name="Limpieza"
                                            id="Limpieza" class="form-control" type="text"
                                            placeholder="Ingrese el estado de limpieza..." required /></label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="InstalacionPared">Instalacion en la pared:
                                        <input name="InstalacionPared" id="InstalacionPared" class="form-control"
                                            type="text" placeholder="Ingrese el estado de la instalacion de pared..."
                                            required /></label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="UbicacionActual">Ubicacion: <input
                                            name="UbicacionActual" id="UbicacionActual" class="form-control" type="text"
                                            placeholder="Ingrese la ubicacion de la camilla..." required /></label>
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
                                    <label class="control-label" for="Observaciones">Observaciones: <input
                                            name="Observaciones" id="Observaciones" class="form-control" type="text"
                                            required /></label>
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
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->

        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <?php else: ?>

        <h1>No has iniciado sesion.</h1>

    <?php endif; ?>
</body>