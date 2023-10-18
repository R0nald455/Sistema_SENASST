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


            <h3>Simulador - Sala de sistemas </h3>

            <div id="previ_escenario" style="background-image: url(../paginas/img-sistemas/escenarioSistemas.jpg);"></div>   

            <div class="previ_situacion" onclick="clickSituacion(0)" style=" position: relative; width: 300px; height: 320px; left: 330px; top: -330px; background-image: url(../paginas/img-riesgos/silla-removebg-preview.png); background-size:cover; background-repeat: no-repeat;"></div>
            
            <div class="previ_situacion" onclick="clickSituacion(1)" style=" position: relative; width: 700px; height: 370px; left: -460px; top: -870px; background-image: url(../paginas/img-sistemas/cablelargo.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(2)" style=" position: relative; width: 200px; height: 230px; left: -720px; top: -1586px; background-image: url(../paginas/img-sistemas/grieta.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(3)" style=" position: relative; width: 130px; height: 230px; left: -100px; top: -1680px; background-image: url(../paginas/img-sistemas/comiendo.png);"></div>
            
            <div class="previ_situacion" onclick="clickSituacion(4)" style=" position: relative; width: 120px; height: 220px; left: 450px; top: -1990px; background-image: url(../paginas/img-sistemas/bebiendo.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(5)" style=" position: relative; width: 200px; height: 200px; left: 275px; top: -2140px; background-image: url(../paginas/img-sistemas/encorvado.png);"></div>
            
            <div class="previ_situacion" onclick="clickSituacion(6)" style=" position: relative; width: 140px; height: 120px; left: 600px; top: -2050px; background-image: url(../paginas/img-riesgos/charco.png); "></div>

            <div class="previ_situaciona" style=" position: relative; width: 210px; height: 200px; left: 630px; top: -2350px; background-image: url(../paginas/img-sistemas/cayendose.png); background-repeat: no-repeat; background-size: cover;"></div>


        </div>

    </center>

    <script src="./js/logicaSistemas.js"></script>
    <script src="./js/alertaInicioss.js"></script>

</body>
</html>