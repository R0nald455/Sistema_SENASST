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
    <title>Reporte de todos los elementos PDF</title>
</head>

<body>

    <?php
    require_once("../../../../db/conexionPDO.php");

    $id_botiquin = (isset($_POST['producto_id']) ? $_POST['producto_id'] : "");
    $sql = $conexion->prepare("SELECT * FROM elementosbotiquines WHERE id_botiquin='$id_botiquin'");
    $sql->execute();
    $listaElementos = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sqlBotiquines = $conexion->prepare("SELECT Nombre, Ubicacion FROM botiquines WHERE ID ='$id_botiquin'");
    $sqlBotiquines->execute();
    $botiquin = $sqlBotiquines->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <?php
    $nombreImagen = "../../../../img/LogoSena.png";
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
        <img id="logoPDF" src="data:imag/png;base64,<?php echo base64_encode(file_get_contents($nombreImagen)); ?>"
            alt="Imagen" style="width: 100px; height:100px;">
    </div>

    <?php foreach ($botiquin as $dato) { ?>
        <h1>REPORTE DE LOS ELEMENTOS DEL <b style="color: #8BC34A;"> <?php echo $dato['Nombre'].' ubicado en '. $dato['Ubicacion'] . ' con ID ' . $id_botiquin;?> </b> DEL CENTRO DE BIOTECNOLOGIA AGROPECUARIA</h1>
    <?php } ?>

    <table id="lookup" class="table table-bordered">
        <thead bgcolor="rgb(57,168,1)" align="center">
            <tr>
                <th>ID del elemento</th>
                <th>ID del botiquin</th>
                <th>Imagen de referencia</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Ubicacion</th>
                <th>Ubicacion especifica</th>
                <th>Estado</th>
                <th>Fecha de registro</th>
                <th>Fecha de vencimiento</th>
                <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaElementos as $elemento) { ?>
                <tr>
                    <td>
                        <?php echo $elemento['id_elementos'] ?>
                    </td>
                    <td>
                        <?php echo $elemento['id_botiquin'] ?>
                    </td>
                    <td><img src="data:imag/png;base64,<?php echo base64_encode($elemento['ImagenReferencia']) ?>"
                            alt="Imagen" style="width: 100px; height:100px;"></td>
                    <td>
                        <?php echo $elemento['nombre'] ?>
                    </td>
                    <td>
                        <?php echo $elemento['cantidad'] ?>
                    </td>
                    <td>
                        <?php echo $elemento['ubicacion'] ?>
                    </td>
                    <td>
                        <?php echo $elemento['ubicacionEspecifica'] ?>
                    </td>
                    <td>
                        <?php echo $elemento['estado'] ?>
                    </td>
                    <td>
                        <?php echo $elemento['fechaRegistro'] ?>
                    </td>
                    <td>
                        <?php echo $elemento['fechaVencimiento'] ?>
                    </td>
                    <td>
                        <?php echo $elemento['comentarios'] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

<?php
$html = ob_get_clean();
require '../../../dompdf/autoload.inc.php';

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

$dompdf->stream("elementos_del_botiquin.pdf", array("Attachment" => false));

?>