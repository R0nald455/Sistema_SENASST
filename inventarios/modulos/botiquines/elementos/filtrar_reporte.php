<?php

session_start();
error_reporting(0);
include "../../../../db/conexion.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar reporte de elementos</title>
    <?php
    include('head.php');
    include "../../../../db/conexion.php";
    ?>
</head>

<body>

    <?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4): ?>

        <center>
            <a href="index.php"><img style="width: 150px; margin: 30px;" class="imagen_filtrar"
                    src="../../../../img/LogoSena.png" alt=""></a>

            <b>
                <h1 style="margin: 50px;">Ingrese el botiquín para el reporte de elementos 📄</h1>
            </b>
        </center>

        <div style="margin-bottom: -200px" class="col-12 col-md-12">
            <ul class="list-group">
                <li class="list-group-item">

                    <form action="reportes.php" method="POST">

                        <div class="control-group">
                            <label class="control-label" for="id_botiquin">Botiquines: </label>
                            <input class="form-control" type="text" id="id_botiquin"
                                placeholder="Ingrese el nombre del botiquin al cual le quiere revisar los elementos."
                                autocomplete="off">
                            <input type="hidden" id="producto_id" name="producto_id">
                            <div id="ID_Botiquin_Div"></div>
                        </div>

                        <center style="margin: 20px;"><button type="submit" name="button-pdf" id="button-pdf"
                                class="btn btn-sm btn-primary" href="reportes.php"><i class="fa-solid fa-file-pdf"></i>
                                Generar
                                PDF</button></center>
                    </form>
                </li>
            </ul>
        </div>

        <?php include('../../../../Footer/footer.php'); ?>

        <script src="js/scriptBotiquines.js"></script>

    <?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../../../../php/login.php";
        </script>

    <?php endif; ?>

</body>

</html>