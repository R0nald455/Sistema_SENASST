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

            <div id="previ_escenario" style="background-image: url(../paginas/img-biblioteca/escenarioBiblioteca.jpg);"></div>   

            <div class="previ_situacion" onclick="clickSituacion(0)" style=" position: relative; width: 400px; height: 150px; left: 15px; top: -350px; background-image: url(../paginas/img-biblioteca/charco2.png); background-size:cover; background-repeat: no-repeat;"></div>
            
            <div class="previ_situacion" onclick="clickSituacion(1)" style=" position: relative; width: 150px; height: 150px; left: 580px; top: -948px; background-image: url(../paginas/img-biblioteca/vidrio-roto.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(2)" style=" position: relative; width: 100px; height: 180px; left: 280px; top: -1220px; background-image: url(../paginas/img-biblioteca/grieta-pared.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(3)" style=" position: relative; width: 150px; height: 250px; left: -560px; top: -900px; background-image: url(../paginas/img-biblioteca/humoCargador.png);"></div>
            
            <div class="previ_situacion" onclick="clickSituacion(4)" style=" position: relative; width: 550px; height: 550px; left: 200px; top: -1300px; background-image: url(../paginas/img-biblioteca/corriendo2.png);"></div>


        </div>

    </center>

    <script src="./js/logicaBiblioteca.js"></script>
    <script src="./js/alertaInicioBiblioteca.js"></script>

</body>
</html>