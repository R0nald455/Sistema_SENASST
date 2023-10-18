<?php
session_start();
if (empty($_SESSION["idInst"])){
    header("location: ../index.php");
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./index.css">
    <title>Inicio</title>
</head>

<body>


    <!-- Contenedor principal inicio  -->

    <section class="cont-prin">

        <!-- Contenedor del video -->

        <div class="cont-video">


            <img src="../images/Videojuego-sst.png" style="height: 100vh; width:100%;" alt="">

            <!--<video autoplay loop muted>-->

            <!--    <source src="./videos/SENAVIDEO.mp4" type="video/mp4">-->

            <!--</video>-->

        </div>

        <div class="capa"></div>

    </section>

    <section class="cont-menu">

        <div class="cont-logo">

            <h1 class="logo"></h1>

        </div>

        <header>
            <div class="btn-menu">
                <h3 style="color: rgb(166, 255, 0);"><strong style="color: white;">Instructor:</strong>
                    <?php echo $_SESSION["nombreIns"] ?></h3>
                <a href="../LandingPageOFC/PaguinaSimulador/indexInstructor.php">Test simuladores</a>
                <a href="#">¿Cómo usar?</a>
                <a href="#">Creadores</a>
                <a href="../conexion/cerrar_sesion.php" style="text-decoration: none; color: red;">Salir</a>
            </div>
        </header>


    </section>


</body>

</html>