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
    <title>Simulador 5</title>
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


            <h3>Simulador - Biblioteca </h3>

            <div id="previ_escenario" style="background-image: url(../paginas/img-cafeteria/escenarioCafeteria.jpg);"></div>   

            <div class="previ_situacion" onclick="clickSituacion(0)" style=" position: relative; width: 250px; height: 200px; left: -550px; top: -580px; background-image: url(../paginas/img-cafeteria/agujero.png); background-size:cover; background-repeat: no-repeat;"></div>
            
            <div class="previ_situacion" onclick="clickSituacion(1)" style=" position: relative; width: 200px; height: 100px; left: 180px; top: -630px; background-image: url(../paginas/img-cafeteria/charcodejugo.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(2)" style=" position: relative; width: 200px; height: 250px; left: -80px; top: -1196px; background-image: url(../paginas/img-cafeteria/grieta.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(3)" style=" position: relative; width: 350px; height: 250px; left: 300px; top: -1100px; background-image: url(../paginas/img-cafeteria/cayendose-de-espalda.png);"></div>
            
            <div class="previ_situacion" onclick="clickSituacion(4)" style=" position: relative; width: 100px; height: 100px; left: 350px; top: -1510px; background-image: url(../paginas/img-cafeteria/humo.png);"></div>

            <div class="previ_situacion" style=" position: relative; width: 65px; height: 100px; left: 355px; top: -1550px; opacity: 0.4; background-image: url(../paginas/img-cafeteria/color-rojo.png);"></div>

        </div>

    </center>

    <script src="./js/logicaCafe.js"></script>
    <script src="./js/alertaInicioCafeteria.js"></script>

</body>
</html>