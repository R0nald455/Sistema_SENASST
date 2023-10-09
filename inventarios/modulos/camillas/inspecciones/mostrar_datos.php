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

                                                                case 'Auditorio':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d222.8575109850331!2d-74.2161493701108!3d4.695292375472226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDMuMSJOIDc0wrAxMic1OC4wIlc!5e1!3m2!1ses-419!2sco!4v1696883263212!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Bloque A':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d222.85759235124345!2d-74.21651802235279!3d4.695037670459534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDIuNCJOIDc0wrAxMic1OS4yIlc!5e1!3m2!1ses-419!2sco!4v1696883345733!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Bloque B':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d177.65799897876116!2d-74.21675026588541!3d4.694654270139489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDEuMCJOIDc0wrAxMycwMC4wIlc!5e1!3m2!1ses-419!2sco!4v1696883393088!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Bloque C':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d224.0308537002606!2d-74.2173047332015!3d4.695215374235334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDIuNyJOIDc0wrAxMycwMi4xIlc!5e1!3m2!1ses-419!2sco!4v1696883456369!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Administracion educativa':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d224.03075192023644!2d-74.21712518961515!3d4.695532298996547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDQuMyJOIDc0wrAxMycwMS41Ilc!5e1!3m2!1ses-419!2sco!4v1696883620432!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Emprendimiento':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d222.8574361796667!2d-74.21711962113284!3d4.695526530560012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDQuMiJOIDc0wrAxMycwMS43Ilc!5e1!3m2!1ses-419!2sco!4v1696883657351!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Gastronomia':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d270.0473892626156!2d-74.21663300446035!3d4.695484803321365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDMuOCJOIDc0wrAxMycwMC4yIlc!5e1!3m2!1ses-419!2sco!4v1696883706037!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Estar de instructores':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d224.0308738912438!2d-74.21689697671734!3d4.695152500593446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDIuNiJOIDc0wrAxMycwMC44Ilc!5e1!3m2!1ses-419!2sco!4v1696883937021!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Centro de convivencia':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d354.07832393982744!2d-74.21552594377927!3d4.695014982657119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDEuOCJOIDc0wrAxMic1NS4zIlc!5e1!3m2!1ses-419!2sco!4v1696884028409!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Maquinaria agricola':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d446.8871432801036!2d-74.21490838814825!3d4.694755950628813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDEuMSJOIDc0wrAxMic1Mi44Ilc!5e1!3m2!1ses-419!2sco!4v1696884085782!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Agroindustria':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d278.1135341249122!2d-74.2149187271546!3d4.6945397001635385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnNDAuNCJOIDc0wrAxMic1My42Ilc!5e1!3m2!1ses-419!2sco!4v1696884235574!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Ganaderia':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d444.0768705629032!2d-74.21910315570054!3d4.691418550547906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnMjkuMiJOIDc0wrAxMycwOC4yIlc!5e1!3m2!1ses-419!2sco!4v1696884296691!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Especies menores y mayores':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d446.88827919967775!2d-74.22038646539737!3d4.692982209009309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnMzUuMiJOIDc0wrAxMycxMi4yIlc!5e1!3m2!1ses-419!2sco!4v1696884734757!5m2!1ses-419!2sco"
                                                                        width="200" height="200" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Agricultura':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d354.385173715179!2d-74.21821953540987!3d4.692987395977778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnMzUuMCJOIDc0wrAxMycwNS4xIlc!5e1!3m2!1ses-419!2sco!4v1696884635279!5m2!1ses-419!2sco"
                                                                        width="600" height="450" style="border:0;" allowfullscreen=""
                                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    <?php
                                                                    break;

                                                                case 'Unidad de recursos naturales':

                                                                    echo $fila['UbicacionActual'];
                                                                    ?>
                                                                    <iframe
                                                                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d563.0559216028942!2d-74.21912658554216!3d4.693242512734214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNMKwNDEnMzUuOSJOIDc0wrAxMycwOC41Ilc!5e1!3m2!1ses-419!2sco!4v1696884672299!5m2!1ses-419!2sco"
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

                                                        <td style="text-align: center;">
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
                                                                ?><br>
                                                                <i class="fa-solid fa-circle-check fa-2xl"
                                                                        style="color: #2bf21c; margin: 30px;"></i><br>
                                                                    <?php
                                                                    echo "La inspección todavia esta a mas de un mes";
                                                                    ?>
                                                            
                                                                <?php
                                                            } elseif ($diferencia_dias >= 1) {
                                                                ?><br>
                                                                <i class="fa-solid fa-circle-exclamation fa-2xl"
                                                                        style="color: #ffd500; margin: 30px;"></i><br>
                                                                    <?php
                                                                    echo "La inspección esta a menos de un mes";
                                                                    ?>
                                                                
                                                                <?php

                                                            } else {
                                                                ?><br>
                                                                <i class="fa-solid fa-circle-xmark fa-2xl"
                                                                        style="color: #f50000; margin: 30px;"></i><br>
                                                                    <?php
                                                                    print "La fecha de inspeccion ya se vencio y no se ha llevado a cabo";
                                                                    ?>
                                                                
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