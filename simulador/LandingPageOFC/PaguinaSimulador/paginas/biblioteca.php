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
    <link rel="stylesheet" href="./css/generall.css">
    <title>Simulador Auditorio</title>
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

            <h3>Simulador - Auditorio </h3>

            <div id="previ_escenario" style="background-image: url(../paginas/img-riesgos/biblioteca.jpg);"></div>   
            

        </div>

    </center>


</body>
</html>