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

    <?php if (isset($_SESSION["id"])): ?>

        <br>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="content">
                        <?php
                        $ID = intval($_GET['ID']);
                        $sql = mysqli_query($conexion, "SELECT * FROM botiquines WHERE ID='$ID'");
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

                        <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php"
                            method="POST" enctype="multipart/form-data">

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="ID">Identificador del botiquin: <input type="text"
                                            name="ID" id="ID" value="<?php echo $row['ID']; ?>" class="form-control"
                                            readonly="readonly"></label>
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
                                    <label class="control-label" for="Nombre">Nombre y Tipo: <input type="text"
                                            name="Nombre" id="Nombre" value="<?php echo $row['Nombre']; ?>"
                                            class="form-control" required></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Ubicacion">Ubicacion: <input name="Ubicacion"
                                            id="Ubicacion" class="form-control" type="text"
                                            value="<?php echo $row['Ubicacion']; ?>" placeholder="Ingrese la ubicacion."
                                            required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="UbicacionEspecifica">Ubicacion especifica: <input
                                            name="UbicacionEspecifica" id="UbicacionEspecifica" class="form-control"
                                            type="text" value="<?php echo $row['UbicacionEspecifica']; ?>"
                                            placeholder="Ingrese la ubicacion especifica." required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="FechaUltima">Fecha de la ultima revision: <input
                                            name="FechaUltima" id="FechaUltima" class="form-control" type="date"
                                            value="<?php echo $row['FechaUltima']; ?>" required /></label>
                                </div>

                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="FechaRevision">Fecha de la proxima revision: <input
                                            name="FechaRevision" id="FechaRevision" class="form-control" type="date"
                                            value="<?php echo $row['FechaRevision']; ?>" required /></label>
                                </div>

                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Responsable">Responsable de la ultima revision: <input
                                            name="Responsable" id="Responsable" class="form-control" type="text"
                                            value="<?php echo $row['Responsable']; ?>" required /></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label" for="Comentarios">Comentarios: <input name="Comentarios"
                                            id="Comentarios" class="form-control" type="text"
                                            value="<?php echo $row['Comentarios']; ?>" required /></label>
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