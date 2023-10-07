<?php
session_start();
error_reporting(0);
include 'index.php';
?>


<!DOCTYPE html>
<html>

<head>
    <?php include("head.php"); ?>
</head>

<body>

    <?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4): ?>


        <header>
            <br>
            <center>
                <h1>Administración de botiquines</h1>
        </header>

        <div class="container">
            <hr>
            <div class="row">
                <div class="col-12 col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <form method="post">
                                <div class="form-row align-items-center table-responsive">
                                    <table id="lookup" class="table table-hover">
                                        <thead bgcolor="rgb(57,168,1)">
                                            <tr>
                                                <th>ID</th>
                                                <th>Imagen de referencia</th>
                                                <th>Nombre</th>
                                                <th>Ubicacion</th>
                                                <th>Ubicacion especifica</th>
                                                <th>Fecha de la ultima revision</th>
                                                <th>Proxima revision</th>
                                                <th>Responsable</th>
                                                <th>Comentarios</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $divSeleccionado = $_POST['divSeleccionado'];
                                            include '../../../../db/conexion.php';
                                            $sql = "SELECT * FROM botiquines WHERE Ubicacion = '$divSeleccionado'";
                                            $result = $conexion->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($fila = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $fila['ID']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo '<img src="data:imag/png;base64,' . base64_encode($fila['ImagenReferencia']) . '" alt="Imagen" style="width: 150px; height:150px;" >'; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fila['Nombre']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fila['Ubicacion']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fila['UbicacionEspecifica']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fila['FechaUltima']; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            // Fecha de vencimiento del objeto en la base de datos (en formato 'Y-m-d')
                                                            $fechaVencimiento = $fila['FechaRevision'];
                                                            // Obtener la fecha actual
                                                            date_default_timezone_set('America/Bogota');
                                                            $fechaActual = date('Y-m-d');
                                                            // Convierte las fechas a timestamps
                                                            $timestamp_variable = strtotime($fechaVencimiento);
                                                            $timestamp_actual = strtotime($fechaActual);
                                                            // Calcula la diferencia en segundos
                                                            $diferencia_segundos = $timestamp_variable - $timestamp_actual;
                                                            // Calcula la diferencia en días
                                                            $diferencia_dias = $diferencia_segundos / (60 * 60 * 24);

                                                            if ($diferencia_dias > 31) {
                                                                ?> <i class="fa-solid fa-circle-check fa-2xl"
                                                                    style="color: #2bf21c;"></i>
                                                                <br>
                                                                <?php
                                                                echo "Falta mas de un mes para que el botiquin sea revisado";
                                                            } elseif ($diferencia_dias >= 1) {
                                                                ?> <i class="fa-solid fa-circle-exclamation fa-2xl"
                                                                    style="color: #ffd500;"></i>
                                                                <br> <br>
                                                                <?php
                                                                echo "El botiquin esta a menos de un mes de ser revisado.";
                                                            } else {
                                                                ?> <i class="fa-solid fa-circle-xmark fa-2xl"
                                                                    style="color: #f50000;"></i>
                                                                <br>
                                                                <?php
                                                                print "El botiquin necesita una revision de manera urgente.";
                                                            }

                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fila['Responsable']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fila['Comentarios']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr class="text-cente">
                                                    <td colspan="16">No existen registros</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-auto">

                                </div>
                </div>
                </form>
                </li>
                </ul>

            </div>
        </div>
        </div>
        <?php
        include '../../../../Footer/footer.php';
        ?>

    <?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../../../../php/login.php";
        </script>

    <?php endif; ?>

</body>

</html>