<!-- <?php
// session_start();
// if (empty($_SESSION["idSe"])){
//     header("location: ../index.php");
// }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/styleIniciss.css">
    <title>Pruebas Auditorio</title>
</head>
<body>

<center>

    <form method="POST" class="form-container">

        <div class="logoSena"></div>

        <h1 class="sstTitulo">SST-PRUEBAS - Auditorio</h1>
        <h1>Digite el número de la prueba a presentar</h1>
        
        <input class="numPrueba" type="number" name="numPrueba">

        <input class="btn-prueba" type="submit" name="btn-prueba" value="Presentar prueba">

        <a href="../PaguinaSimulador/index.php"><div class="enviar-atras"></div></a>

    </form>

</center>

<?php
        include ("./php/logicaAuditorio.php");

?>


</body>
</html>