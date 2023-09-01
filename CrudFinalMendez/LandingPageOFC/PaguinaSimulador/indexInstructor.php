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
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/indexxs.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/articulos.css">

    <!-- Fuentes  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 


    <title> Simulador de riesgos </title>
</head>
<body>

<!-- encabezado -->
<header>
    <div class="contenedor">
         <input type="checkbox" id="barra-menu">
        <label class="icon-menu" for="barra-menu"></label> 
            <nav class="menu">
            <!-- <h3 style="color: yellowgreen;"><strong>Usuario:</strong> <?php// echo $_SESSION["nombre"] ?></h3> -->
            <a href="../index.php">Inicio</a>
            <a href="">Creadores</a>
            <a href="">Contactos</a> 
            <a href="../cerrar_sesion.php" style="text-decoration: none; color: white;" >Salir</a>
          </nav>
    </div>
</header>

<div class="container-logo">  
    <h1 class="logo-sena"> </h1>
</div>


<div class="cont-int">
  <div class="cont-2">
        <h3 style="color: rgb(166, 255, 0); padding-bottom: 30px"><strong>Instructor:</strong> <?php echo $_SESSION["nombreIns"] ?></h3>
        <a href="../indexInstruc.php"> Inicio </a> 
        <a href=""> Creadores </a> 
        <a href="../cerrar_sesion2.php" style="text-decoration: none; color: white;" >Salir</a>
    </div>
</div>   


<!-- texto simulador de riesgos -->
<section id="text">
        <h1> Simulador de Riesgos </h1>
        <hr>
</section>

 <!-- Articulos -->

 <section class="container-cajas">


    <!-- <div class="card2">

      <div class="card-header">
        <h1> Ahorcado </h1>
        <hr>
      </div>

      <div class="card-footer">
        <a href="../Ahorcado/index.html"><button type="button">Jugar</button></a>
      </div>

    </div> -->


    <div class="card card2">

      <div class="card-header">
        <h1> Sistemas 1</h1>
        <hr>
      </div>

      <div class="card-footer">
        <a href="../paginaPruebasInstructor/index.php"><button type="button">Crear pruebas</button></a> 
      </div>

    </div>


    <div class="card card3">

      <div class="card-header">
        <h1> Auditorio </h1>
        <hr>
      </div>

      <div class="card-footer">
        <a href="../paginaPruebasInstructor/index.php"><button type="button">Crear pruebas</button></a> 
      </div>

    </div>


    <div class="card card4">

      <div class="card-header">
        <h1> Cafetería </h1>
        <hr>
      </div>

      <div class="card-footer">
        <a href="../paginaPruebasInstructor/index.php"><button type="button">Crear pruebas</button></a> 
      </div>

    </div>

    <div class="card card5">

      <div class="card-header">
        <h1> Biblioteca </h1>
        <hr>
      </div>

      <div class="card-footer">
        <a href="../paginaPruebasInstructor/index.php"><button type="button">Crear pruebas</button></a> 
      </div>

    </div>



 </section>

 <script src="../js/window.js"></script>


</body>
</html>