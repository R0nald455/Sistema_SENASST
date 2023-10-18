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
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/indexxs.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/articulos.css">

    <!-- Fuentes  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
    <script src="../js/windows.js"></script>

    <title> Simulador de riesgos </title>
</head>
<body>

<!-- encabezado -->
<header>
    <div class="contenedor">
         <input type="checkbox" id="barra-menu">
        <label class="icon-menu" for="barra-menu"></label> 
            <nav class="menu">
            <h3 style="color: yellowgreen;"><strong>Aprendiz:</strong> <?php echo $_SESSION["nombre"] ?></h3>
            <a href="../index.php">Inicio</a>
            <a href="">Creadores</a>
            <a href="">Contactos</a> 
            <a href="../../conexion/cerrar_sesion.php" style="text-decoration: none; color: white;" >Salir</a>
          </nav>
    </div>
</header>

<div class="container-logo">  
    <h1 class="logo-sena"> </h1>
</div>


<div class="cont-int">
  <div class="cont-2">
        <h3 style="color: rgb(166, 255, 0); padding-bottom: 30px"><strong></strong>Aprendiz:</strong> <?php echo $_SESSION["nombre"] ?></h3>
        <a href="../index.php"> Inicio </a> 
        <a href="../../PracticaBotiquin/index.php">Memory Game</a> 
            <a href="../../pagina360/index.php">Juego 360°</a> 
        <a href="../../conexion/cerrar_sesion.php" style="text-decoration: none; color: white;" >Salir</a>
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
        <h1> Sistemas</h1>
        <hr>
      </div>

      <div class="card-footer">
        <a onclick="MM_openBrWindow('https://www.cbagamesst.online/gamesst/LandingPageOFC/PaguinaSimulador/paginas/sistemas.php','','width=800,height=600');"><button type="button">Comenzar</button></a> 
        <a href="../paginaPruebasAprendiz/indexInicioPreg.php"><button type="button">Pruebas</button></a> 
      </div>

    </div>

    <div class="card card3">

      <div class="card-header">
        <h1> Auditorio </h1>
        <hr>
      </div>

      <div class="card-footer">
        <a onclick="MM_openBrWindow('https://www.cbagamesst.online/gamesst/LandingPageOFC/PaguinaSimulador/paginas/auditorio.php','','width=800,height=600');"><button type="button">Comenzar</button></a> 
        <a href="../paginaPruebasAprendiz/indexInicioAuditorio.php"><button type="button">Pruebas</button></a> 
      </div>

    </div>

    <div class="card card4">

      <div class="card-header">
        <h1> Cafetería</h1>
        <hr>
      </div>

      <div class="card-footer">
        <!-- <a onclick="MM_openBrWindow('https://www.cbagamesst.online/gamesst/LandingPageOFC/PaguinaSimulador/paginas/cafeteria.php','','width=800,height=600');"><button type="button">Comenzar</button></a>  -->
        <a href="../paginaPruebasAprendiz/indexInicioCafeteria.php"><button type="button">Pruebas</button></a> 
      </div>

    </div>

    <div class="card card5">

      <div class="card-header">
        <h1> Biblioteca </h1>
        <hr>
      </div>

      <div class="card-footer">
      <!-- <a onclick="MM_openBrWindow('https://www.cbagamesst.online/gamesst/LandingPageOFC/PaguinaSimulador/paginas/biblioteca.php','','width=800,height=600');"><button type="button">Comenzar</button></a>  -->
      <a href="../paginaPruebasAprendiz/indexInicioBiblioteca.php"><button type="button">Pruebas</button></a> 
    </div>


 </section>



</body>
</html>