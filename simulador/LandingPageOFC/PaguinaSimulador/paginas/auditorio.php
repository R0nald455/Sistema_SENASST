<?php
session_start();
if (empty($_SESSION["idSe"])){
    header("location: ../index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/generalll.css">
    <title>Simulador Auditorio</title>
</head>

<body onload="cargarPagina()">


    <audio id="backgroundMusic" autoplay loop>
    <source src="./audio/y2mate.com - Música relajante para cabezas vacías ᖗᖘ Música de Nintendo.mp3" type="audio/mpeg">
    </audio>

    <audio id="correct" hidden>
    <source src="./audio/correct.mp3" type="audio/mpeg">
    </audio>

    <audio id="error" hidden>
    <source src="./audio/error.mp3" type="audio/mpeg">
    </audio>

    <!-- Contenedor principal -->
    <center>

        <div id="container">

            <div class="resultado">
                <span>Score: </span>
                <span id="scoreSpan">0</span>
            </div>

            <div class="correctas">
                <span>Correctas: </span>
                <span id="correctaSpan">0</span>
            </div>

            <div class="incorrectas">
                <span>Incorrectas: </span>
                <span id="incorrectaSpan">0</span>
            </div>

            <div class="usuario">
                <h5><strong>Usuario:</strong> <?php echo $_SESSION["nombre"] ?> </span></h5>
            </div>

            <h3>Simulador - Auditorio </h3>

            <div id="previ_escenario" style="background-image: url(../paginas/img-riesgos/auditorio2.jpg);"></div>   
            

            <div class="previ_situacion" onclick="clickSituacion(0)" style="position: absolute; width: 250px; height: 250px; left: 1500px; top: 800px; background-image: url(../paginas/img-auditorio/agujero.png); background-size:cover; background-repeat: no-repeat;"></div>
            
            <div class="previ_situacion" onclick="clickSituacion(1)" style=" position: absolute; width: 150px; height: 250px; left: 260px; top: 120px; background-image: url(../paginas/img-auditorio/grietaAuditorio.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(2)" style=" position: absolute; width: 50px; height: 60px; left: 1115px; top: 170px; background-image: url(../paginas/img-auditorio/lamparaTorcida.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(3)" style=" position: absolute; width: 110px; height: 145px; left: 315px; top: 400px; background-image: url(../paginas/img-auditorio/empujar.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(4)" style=" position: absolute; width: 220px; height: 300px; left: 740px; top: 550px; background-image: url(../paginas/img-auditorio/corriendo.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(5)" style=" position: absolute; width: 250px; height: 250px; left: 1020px; top: 320px; background-image: url(../paginas/img-auditorio/exponiendo.png);"></div>

        </div>
    </center>


<script src="./js/alertaIncioAuditors.js"></script>
<script src="./js/auditorios.js"></script>



</body>
</html>