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
    <link rel="stylesheet" href="./css/sistemas11ww.css">
    <title>Cafeteria</title>
</head>

<body onload="cargarPagina()">
    
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

            <h3>Escenario - Cafetería </h3>

            <div id="previ_escenario" style="background-image: url(../paginas/img-riesgos/cafeteria.jpg);"></div>   
            
            
            <div class="previ_situacion" onclick="clickSituacion(0)" style=" position: relative; width: 300px; height: 320px; left: 330px; top: -330px; background-image: url(../paginas/img-cafeteria/agujero.png); background-size:cover; background-repeat: no-repeat;"></div>
            
            <div class="previ_situacion" onclick="clickSituacion(1)" style=" position: relative; width: 280px; height: 290px; left: -730px; top: -900px; background-image: url(../paginas/img-cafeteria/charcodejugo.png );"></div>

            <div class="previ_situacion" onclick="clickSituacion(2)" style=" position: relative; width: 100px; height: 120px; left: 230px; top: -1506px; background-image: url(../paginas/img-cafeteria/grieta.png);"></div>

            <div class="previ_situacion" onclick="clickSituacion(3)" style=" position: relative; width: 200px; height: 120px; left: 540px; top: -1350px; background-image: url(../paginas/img-cafeteria/jugo.png);"></div>

            



        </div>

    </center>


</body>
</html>