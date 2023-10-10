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
    <title>Reporte de todos los elementos de proteccion personal PDF</title>
</head>

<body>

    <?php
    require_once("../../../db/conexionPDO.php");

    $sql = $conexion->prepare("SELECT * FROM tblimplementos");
    $sql->execute();
    $listaEPPS = $sql->fetchAll(PDO::FETCH_ASSOC);

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



    <h1>REPORTE DE LOS ELEMENTOS DE PROTECCION PERSONAL DEL CENTRO DE BIOTECNOLOGIA AGROPECUARIA</h1>

    <table id="lookup" class="table table-bordered">
        <thead bgcolor="rgb(57,168,1)" align="center">
            <tr>
                <th>ID del EPP</th>
                <th>Imagen de referencia</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Cantidad</th>
                <th>Ubicación</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaEPPS as $EPP) { ?>
                <tr>
                    <td>
                        <?php echo $EPP['ID_Implementos'] ?>
                    </td>
                    <td><img src="data:imag/png;base64,<?php echo base64_encode($EPP['ImagenReferencia']) ?>" alt="Imagen"
                            style="width: 100px; height:100px;"></td>
                    <td>
                        <?php echo $EPP['Nombre'] ?>
                    </td>
                    <td>
                        <?php echo $EPP['Descripcion'] ?>
                    </td>
                    <td>
                        <?php echo $EPP['Categoria'] ?>
                    </td>
                    <td>
                        <?php echo $EPP['Cantidad'] ?>
                    </td>
                    <td>
                        <?php echo $EPP['Ubicacion'] ?>
                    </td>
                    <td>
                        <?php echo $EPP['Fecha'] ?>
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
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("EPP's.pdf", array("Attachment" => false));

?>