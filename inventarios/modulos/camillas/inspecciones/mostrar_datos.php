<?php 
session_start();
error_reporting(0);
include '../../../../db/conexion.php';
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
            <h1>Administrar camillas</h1>
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
                                            <th>Tipo de camilla</th>
                                            <th>Señalizacion</th>
                                            <th>Acceso</th>
                                            <th>Estado del soporte</th>
                                            <th>Correas de seguridad</th>
                                            <th>Inmovilizador</th>
                                            <th>Limpieza</th>
                                            <th>Instalacion de pared</th>
                                            <th>Ubicacion actual</th>
                                            <th>Fecha adquisicion</th>
                                            <th>Fecha ultimo mantenimiento</th>
                                            <th>Fecha proximo mantenimiento</th>
                                            <th>Observaciones</th>
                                            <th>Fecha de registro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $divSeleccionado = $_POST['divSeleccionado'];
                                        $sql = "SELECT * FROM camillas WHERE UbicacionActual = '$divSeleccionado'";
                                        $result = $conexion->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($fila = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $fila['CamillaID']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo '<img src="data:imag/png;base64,' . base64_encode($fila['ImagenReferencia']) . '" alt="Imagen" style="width: 150px; height:150px;" >'; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['TipoCamilla']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['Señalizacion']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['Acceso']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['EstadoSoporte']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['CorreasSeguridad']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['Inmovilizador']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['Limpieza']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['InstalacionPared']; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        switch ($fila['UbicacionActual']) {

                                                            case 'Biblioteca':

                                                                echo $fila['UbicacionActual'];
                                                                ?>
                                                                <iframe
                                                                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d208.29876097118972!2d-74.21726913685644!3d4.695541010889089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDQuMCJOIDc0wrAxMycwMS42Ilc!5e1!3m2!1ses-419!2sco!4v1694558172765!5m2!1ses-419!2sco"
                                                                    width="200" height="200" style="border:0;" allowfullscreen=""
                                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                <?php
                                                                break;

                                                            case 'Administracion':

                                                                echo $fila['UbicacionActual'];
                                                                ?>
                                                                <iframe
                                                                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d163.74281803261528!2d-74.21589439980467!3d4.6957436974358595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDQuNiJOIDc0wrAxMic1Ny4yIlc!5e1!3m2!1ses-419!2sco!4v1694558624024!5m2!1ses-419!2sco"
                                                                    width="200" height="200" style="border:0;" allowfullscreen=""
                                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                <?php
                                                                break;

                                                            default:
                                                                echo $fila['UbicacionActual'];
                                                                break;
                                                        }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['FechaAdquisicion']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila['FechaUltimoMantenimiento']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $fila['FechaProximoMantenimiento'];

                                                        // Fecha de vencimiento del objeto en la base de datos (en formato 'Y-m-d')
                                                        $fechaVencimiento = $fila['FechaProximoMantenimiento'];
                                                        // Obtener la fecha actual
                                                        date_default_timezone_set('America/Bogota');
                                                        $fechaActual = date('Y-m-d');
                                                        // Calcular la diferencia en segundos entre las fechas
                                                        $diferenciaSegundos = strtotime($fechaVencimiento) - strtotime($fechaActual);
                                                        // Definir la cantidad de segundos en un mes (aproximadamente)
                                                        $diferencia_dias = $diferenciaSegundos / (60 * 60 * 24);
                                                        // Verificar si la diferencia es menor o igual a un mes en segundos
                                                        if ($diferencia_dias > 30) {
                                                            ?>
                                                            <center><i class="fa-solid fa-circle-check fa-2xl"
                                                                    style="color: #2bf21c;"></i><br>
                                                            <?php
                                                            echo "La inspección todavia esta a mas de un mes";
                                                            ?>
                                                            </center>
                                                            <?php
                                                        } elseif ($diferencia_dias >= 1) {
                                                            ?>
                                                            <center><i class="fa-solid fa-circle-exclamation fa-2xl"
                                                                    style="color: #ffd500;"></i><br>
                                                                <?php
                                                                echo "La inspección esta a menos de un mes";
                                                                ?>
                                                            </center>
                                                            <?php

                                                        } else {
                                                            ?>
                                                            <center><i class="fa-solid fa-circle-xmark fa-2xl"
                                                                    style="color: #f50000;"></i><br><br>
                                                                <?php
                                                                print "La fecha de inspeccion ya se vencio y no se ha llevado a cabo";
                                                                ?>
                                                            </center>
                                                            <?php
                                                        }

                                                        ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $fila['Observaciones']; ?>
                                                    </td>


                                                    <td>
                                                        <?php echo $fila['FechaRegistro']; ?>
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
    include("../../../../Footer/footer.php");
    ?>

<?php else: ?>

<script>
    alert("No has iniciado sesión, por favor inicia a continuación.");
    window.location.href = "../../../../php/login.php";
</script>

<?php endif; ?>

</body>

</html>