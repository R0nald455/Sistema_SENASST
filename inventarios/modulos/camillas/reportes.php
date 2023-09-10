<?php

ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Reporte de todos las camillas PDF</title>
</head>

<body>

    <?php
    require_once("../../../db/conexionPDO.php");

    $sql = $conexion->prepare("SELECT * FROM camillas");
    $sql->execute();
    $listaCamillas = $sql->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <?php
    $nombreImagen = "../../../img/LogoSena.png";
    ?>

    <style>
        .imgContainer {
            width: 100%;
            height: 100px;
            margin-bottom: 50px;
        }

        .imgContainer #logoPDF {
            height: 100%;
        }

        table {
            width: 100%;
            border: 1px solid #000;
        }

        th {
            width: 25%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
            background-color: rgb(57, 168, 1);
            color: white;
        }

        td {
            width: 25%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
        }
    </style>

    <div class="imgContainer">
        <img id="logoPDF" style=""
            src="data:imag/png;base64,<?php echo base64_encode(file_get_contents($nombreImagen)); ?>" alt="Imagen"
            style="width: 100px; height:100px;">
    </div>



    <h1>REPORTE DE LAS CAMILLAS DEL CENTRO DE BIOTECNOLOGIA AGROPECUARIA</h1>

    <table id="lookup" class="table table-bordered">
        <thead bgcolor="rgb(57,168,1)" align="center">
            <tr>
                <th>ID</th>
                <th>Imagen de referencia</th>
                <th>Tipo</th>
                <th>Señalizacion</th>
                <th>Acceso</th>
                <th>Estado del soporte</th>
                <th>Correas de seguridad</th>
                <th>Inmovilizador</th>
                <th>Limpieza</th>
                <th>Instalacion de pared</th>
                <th>Ubicacion</th>
                <th>Fecha de adquisicion</th>
                <th>Ultimo mantenimiento</th>
                <th>Proximo mantenimiento</th>
                <th>Observaciones</th>
                <th>Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaCamillas as $camilla) { ?>
                <tr>
                    <td>
                        <?php echo $camilla['CamillaID'] ?>
                    </td>
                    <td>
                        <img src="data:imag/png;base64,<?php echo base64_encode($camilla['ImagenReferencia']) ?>"
                            alt="Imagen" style="width: 100px; height:100px;">
                    </td>
                    <td>
                        <?php echo $camilla['TipoCamilla'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['Señalizacion'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['Acceso'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['EstadoSoporte'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['CorreasSeguridad'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['Inmovilizador'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['Limpieza'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['InstalacionPared'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['UbicacionActual'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['FechaAdquisicion'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['FechaUltimoMantenimiento'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['FechaProximoMantenimiento'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['Observaciones'] ?>
                    </td>
                    <td>
                        <?php echo $camilla['FechaRegistro'] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

<?php
$html = ob_get_clean();
require '../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$options->set('defaultFont', 'Helvetica');
$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);
$dompdf->setPaper([0, 0, 1200, 500,1000]);

$dompdf->render();

$dompdf->stream("camillas.pdf", array("Attachment" => false));

?>