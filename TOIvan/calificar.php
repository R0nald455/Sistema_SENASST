<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&family=Roboto:wght@300&display=swap');

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Roboto', sans-serif;
        }

        /* Estilo para el botón de submit */
        input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
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
            font-family: sans-serif;
            width: 40%;
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
            text-align: center;

        }

        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        /* Estilo para el encabezado de las secciones */
        h2 {
            margin-top: 30px;
            font-size: 1.5em;
            font-weight: bold;
            text-align: center;
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
            border: solid 1px #31cf18;
            width: 50%;
            height: 50%;
            text-align: center;
            margin-top: 40px;
        }

        th:first-child {
            text-align: center;
        }

        a {
            display: inline-block;
            padding: 10px;
            text-align: center;
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

        /*Estilo de los div que muestran la informaciòn*/
        #myDiv {
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f1f1f1;
            font-size: 14px;
            line-height: 1.5;
        }

        #aparte {
            width: 100%;
        }

        .volver {
            position: relative;
        }
    </style>
</head>

<body>
    <center style="margin: 50px;">
        <h1><b>Evaluar reportes</b></h1>
        <h1>Seleccionar Reporte</h1>

    </center>
    <!--selección del formulario-->
    <table border="2">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            error_reporting(0);
            include("../db/conexion.php");


            $queryIni = "SELECT id,Condicion FROM observacion";
            $resultIni = $conexion->query($queryIni);

            while ($row = $resultIni->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['Condicion']; ?>
                    </td>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <form action="" method="post">
        <center>
            <p>Escoger ID<br> <input id="aparte" type="number" width="30px" REQUIRED
                    placeholder="Digite el ID del reporte..." name="tuconel" size="30"></p>

            <input type="submit" value="Elegir">
        </center>


    </form>


    <!--condicional para obligar a seleccionar el formulario ome-->
    <?php

    $SelecId = $_POST['tuconel'];

    if ($SelecId == 0) {
        echo '<a href="ProfIni.php">Volver</a>';
    } else {

        ?>
        <center>
              <div class="divisor">
            <p>Nombre Del Usuario <br>
            <div id="myDiv" readonly required>
                <?php


                $query4 = "SELECT nombre FROM observacion where id= $SelecId";
                $resultado4 = $conexion->query($query4);
                if ($resultado4->num_rows > 0) {
                    $row = $resultado4->fetch_assoc();
                    $contexto = $row['nombre'];
                    echo $contexto;
                } else {
                    echo "no funciono";
                }
                ?>
            </div>
            </p>

            <p>Condición insegura<br>
            <div id="myDiv" readonly required style="word-wrap: break-word;">
                <?php
                $query4 = "SELECT condicion FROM observacion where id = $SelecId";
                $resultado4 = $conexion->query($query4);
                if ($resultado4->num_rows > 0) {
                    $row = $resultado4->fetch_assoc();
                    $contexto = $row['condicion'];
                    echo $contexto;
                } else {
                    echo "No funcionó";
                }
                ?>
            </div>
            </p>

            <center>
                <table>
                    <thead>
                        <tr>
                            <th>Imagen</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT Foto FROM observacion  where id= $SelecId";
                        $resultado = $conexion->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                            ?>
                            <tr>
                                <td style="text-align: center;"><img width="80%"
                                        src="data:image/jpg;base64,<?php echo base64_encode($row['Foto']); ?>"></td>
                            </tr>

                        <?php } ?>
                    </tbody>

                </table>
            </center>
            <?php





            ?>

            <p>Ubicación<br>
            <div id="myDiv" readonly required style="word-wrap: break-word;">
                <?php


                $query4 = "SELECT Lugar FROM observacion where id= $SelecId";
                $resultado4 = $conexion->query($query4);
                if ($resultado4->num_rows > 0) {
                    $row = $resultado4->fetch_assoc();
                    $contexto = $row['Lugar'];
                    echo $contexto;
                } else {
                    echo "no funciono";
                }
                ?>
            </div>
            </p>

            <p>Nivel del riesgo <br>
            <div id="myDiv" readonly required style="word-wrap: break-word;">
                <?php


                $query4 = "SELECT contexto FROM observacion where id= $SelecId";
                $resultado4 = $conexion->query($query4);
                if ($resultado4->num_rows > 0) {
                    $row = $resultado4->fetch_assoc();
                    $contexto = $row['contexto'];
                    echo $contexto;
                } else {
                    echo "no funciono";
                }
                ?>
            </div>
            </p>

            <p>Fecha del Reporte <br>
            <div id="myDiv" readonly required>
                <?php


                $query4 = "SELECT fecha FROM observacion where id= $SelecId";
                $resultado4 = $conexion->query($query4);
                if ($resultado4->num_rows > 0) {
                    $row = $resultado4->fetch_assoc();
                    $contexto = $row['fecha'];
                    echo $contexto;
                } else {
                    echo "no funciono";
                }
                ?>
            </div>
            </p>

        </div>



        <form action="InsertEva.php" method="post" enctype="multipart/form-data">


            <div class="divisor">
                <h1 class="animate__animated animate__backInLeft">Evaluar</h1>

                <p>¿Quíen evalua el estado?<br>
                    <input type="text" type="text" REQUIRED placeholder="ingrese su nombre" name="evaluacion">
                </p>

                <p>Observación del reporte<br><Textarea id="myTextArea2" REQUIRED placeholder="text" name="retro" rows="3"
                        cols="35"></textarea></p>
                <!-- Este valor es para recolectar la id dada previamente
en la variable "tuconel" -->
                <input type="hidden" name="ocid" value="<?php echo $SelecId; ?>">

                <input type="submit" value="Subir">
            </div>        </form>

        </center>
      
        <center>
            <div class="volver">
                <a href="ProfIni.php">Volver</a>
            </div>
        </center>

        <?php
    }
    ?>
    <br> <br> <br>


</body>

</html>