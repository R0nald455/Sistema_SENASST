<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&family=Roboto:wght@300&display=swap');

        /* Estilo para el botón de submit */
        input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;

        }

        input[type="submit"]:hover {
            background-color: #1b7161;
            color: white;
        }

        /* Estilo para los campos de texto */
        textarea,
        input[type="text"],
        input[type="number"] {
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 10px;
            resize: vertical;
            width: 80%;
        }

        /* Estilo para la tabla */
        table {
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 1em;
            width: 80%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;

        }

        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        /* Estilo para el encabezado de las secciones */
        h2 {
            margin-top: 30px;
            font-size: 1.5em;
            font-weight: bold;
        }

        /* Estilo para el contenedor del video */
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 30px;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe,
        .video-container object,
        .video-container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .divisor {
            border: solid 1px;
            width: 50%;
        }

        th:first-child {
            text-align: center;
        }

        a {
            display: inline-block;
            padding: 10px;
            margin: 10px;
            border: 2px solid #4caf50;
            border-radius: 5px;
            color: #333;
            text-decoration: none;
            text-align: center;
            /* Centrar el texto */
            width: 80%;
            /* Ajustar el ancho */
            max-width: 200px;
            /* Establecer un ancho máximo */
        }

        /* Estilos para el enlace en hover */
        a:hover {
            background-color: #4caf50;
            color: #fff;
        }

        * {
            font-family: 'Roboto', sans-serif;

        }
    </style>
</head>

<body>
    <center>
        <h1 style="margin: 50px;"><b>Historial de revisiones</b></h1>
    </center>


    <center class="table-responsive">

        <!--selección del formulario-->
        <table border="2">
            <thead>
                <tr>
                    <th>Numero de la condicion</th>
                    <th>Condiciòn</th>
                    <th>Imagen</th>
                    <th>Lugar</th>
                    <th>Nivel de riesgo</th>
                    <th>Fecha en que se reporto</th>
                    <th>Revisado por</th>
                    <th>Estado</th>
                    <th>Fecha de la revisiòn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                error_reporting(0);
                include("../db/conexion.php");

                $qyerySol =
                    $queryIni = "SELECT observacion.id,observacion.Condicion,observacion.Lugar, 
    observacion.Foto,observacion.contexto,observacion.fecha,revision.nombre,
    revision.Estado,revision.Fecha_revision FROM observacion 
    inner JOIN revision on observacion.id=revision.id_Observacion;";
                $resultIni = $conexion->query($queryIni);
                while ($row = $resultIni->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['Condicion']; ?>
                        </td>
                        <td style="text-align: center;"><img width="100%"
                                src="data:image/jpg;base64,<?php echo base64_encode($row['Foto']); ?>"></td>
                        <td>
                            <?php echo $row['Lugar']; ?>
                        </td>
                        <td>
                            <?php echo $row['contexto']; ?>
                        </td>
                        <td>
                            <?php echo $row['fecha']; ?>
                        </td>
                        <td>
                            <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                            <?php echo $row['Estado']; ?>
                        </td>
                        <td>
                            <?php echo $row['Fecha_revision']; ?>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>


        <a href="ProfIni.php">Volver</a>


        <?php

        ?>
        <br> <br> <br>
    </center>

</body>

</html>