<?php
session_start();
error_reporting(0);
require_once("../../../../db/conexion.php");
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
                        $CamillaID = intval($_GET['CamillaID']);
                        $sql = mysqli_query($conexion, "SELECT * FROM camillas WHERE CamillaID='$CamillaID'");
                        if (mysqli_num_rows($sql) == 0) {
                            header("Location: index.php");
                        } else {
                            $row = mysqli_fetch_assoc($sql);
                        }
                        ?>

                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php"
                            method="POST" enctype="multipart/form-data">

                            <blockquote>
                                <h1><b>Editar camillas 🖋️</b></h1>
                            </blockquote>

                            <center><h3><i>"En este apartado puedes dedicarte a editar los datos previamente registrados."</i></h3></center>

                            
                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="basicinput">Identificador de la camilla: <input type="text" name="CamillaID" id="CamillaID" value="<?php echo $row['CamillaID']; ?>" placeholder="" class="form-control" disabled readonly="readonly"></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="ImagenReferencia">Imagen de referencia: </label>
                                    <input name="ImagenReferencia" id="ImagenReferencia" class="form-control" type="file"
                                        accept="image/*" multiple />
                                </div>
                            </div>

                            
                            <?php
                            echo '<img src="data:imag/png;base64,' . base64_encode($row['ImagenReferencia']) . '" alt="Imagen" style="width: 150px; height:150px;" >'
                            ?>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="TipoCamilla">Tipo de camilla: <input type="text"
                                            name="TipoCamilla" id="TipoCamilla" value="<?php echo $row['TipoCamilla']; ?>"
                                            class="form-control" required></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Señalizacion">Señalizacion:
                                        <input type="text" name="Señalizacion" id="Señalizacion"
                                            value="<?php echo $row['Señalizacion']; ?>" class="form-control" required>
                                    </label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Acceso">Acceso: <input name="Acceso" id="Acceso"
                                            class="form-control" type="text"
                                            value="<?php echo $row['Acceso']; ?>" required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="EstadoSoporte">Estado del soporte: <input
                                            name="EstadoSoporte" id="EstadoSoporte" class="form-control" type="text"
                                            value="<?php echo $row['EstadoSoporte']; ?>"
                                            required /></label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="CorreasSeguridad">Estado de las correas de seguridad:
                                        <input name="CorreasSeguridad" id="CorreasSeguridad" class="form-control"
                                            type="text" value="<?php echo $row['CorreasSeguridad']; ?>"
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Inmovilizador">Inmovilizador: <input
                                            name="Inmovilizador" id="Inmovilizador" class="form-control" type="text"
                                            value="<?php echo $row['Inmovilizador']; ?>" required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Limpieza">Limpieza: <input name="Limpieza"
                                            id="Limpieza" class="form-control" type="text"
                                            value="<?php echo $row['Limpieza']; ?>" required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="InstalacionPared">Instalacion en la pared:
                                        <input name="InstalacionPared" id="InstalacionPared" class="form-control"
                                            type="text" value="<?php echo $row['InstalacionPared']; ?>"
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="UbicacionActual">Ubicacion: <input
                                            name="UbicacionActual" id="UbicacionActual" class="form-control" type="text"
                                            value="<?php echo $row['UbicacionActual']; ?>" required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="FechaAdquisicion">Fecha de adquisicion: <input
                                            name="FechaAdquisicion" id="FechaAdquisicion" class="form-control" type="date" value="<?php echo $row['FechaAdquisicion']; ?>"
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="FechaUltimoMantenimiento">Ultimo mantenimiento: <input
                                            name="FechaUltimoMantenimiento" id="FechaUltimoMantenimiento"
                                            class="form-control" type="date" required value="<?php echo $row['FechaUltimoMantenimiento']; ?>" /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="FechaProximoMantenimiento">Proximo mantenimiento:
                                        <input name="FechaProximoMantenimiento" id="FechaProximoMantenimiento"
                                            class="form-control" type="date" value="<?php echo $row['FechaProximoMantenimiento']; ?>" required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Observaciones">Observaciones: <input
                                            name="Observaciones" id="Observaciones" class="form-control" type="text" value="<?php echo $row['Observaciones']; ?>"
                                            required /></label>
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