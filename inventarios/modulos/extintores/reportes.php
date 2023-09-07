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
    <title>Reporte de todos los extintores PDF</title>
</head>

<body>

    <?php
    require_once("../../../db/conexionPDO.php");

    $sql = $conexion->prepare("SELECT * FROM extintores");
    $sql->execute();
    $listaExtintores = $sql->fetchAll(PDO::FETCH_ASSOC);

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

        th{
            width: 25%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
            background-color: rgb(57,168,1);
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



    <h1>REPORTE DE LOS EXTINTORES DEL CENTRO DE BIOTECNOLOGIA AGROPECUARIA</h1>

    <table id="lookup" class="table table-bordered">
        <thead bgcolor="rgb(57,168,1)" align="center">
            <tr>
                <th>ID del extintor</th>
                <th>Numero de serie</th>
                <th>Tipo de extintor</th>
                <th>Fecha de fabricación</th>
                <th>Fecha de compra</th>
                <th>Ubicación</th>
                <th>Ubicación especifica</th>
                <th>Ultima recarga</th>
                <th>Proxima recarga</th>
                <th>Comentarios</th>
                <th>Imagen de referencia</th>
                <th>Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaExtintores as $extintor) { ?>
                <tr>
                    <td>
                        <?php echo $extintor['ExtintorID'] ?>
                    </td>
                    <td>
                        <?php echo $extintor['NumeroDeSerie'] ?>
                    </td>
                    <td>
                        <?php echo $extintor['TipoDeExtintor'] ?>
                    </td>
                    <td>
                        <?php echo $extintor['FechaDeFabricacion'] ?>
                    </td>
                    <td>
                        <?php echo $extintor['FechaDeCompra'] ?>
                    </td>
                    <td>
                        <?php echo $extintor['Ubicacion'] ?>
                    </td>
                    <td>
                        <?php echo $extintor['UbicacionEspecifica'] ?>
                    </td>
                    <td>
                        <?php echo $extintor['UltimaRecarga'] ?>
                    </td>
                    <td>
                        <?php echo $extintor['ProximaRecarga'] ?>
                    </td>
                    <td>
                        <?php echo $extintor['Comentarios'] ?>
                    </td>
                    <td><img src="data:imag/png;base64,<?php echo base64_encode($extintor['ImagenReferencia']) ?>"
                            alt="Imagen" style="width: 100px; height:100px;"></td>
                    <td>
                        <?php echo $extintor['FechaDeRegistro'] ?>
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

$dompdf->stream("extintores.pdf", array("Attachment" => false));

?>