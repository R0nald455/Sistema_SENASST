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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/resetty.css">
  <link rel="stylesheet" href="../css/games.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script defer src="../js/gameAA.js"></script>

  <title>Tipo A</title>
</head>

<body>

  <main>
    <h1>Memory game - Elementos de botiquin tipo A</h1><br><br>
    
    <header>
      <span class="player"></span>
      <a href="../index.php" style="color: red; text-decoration: none; font-size: 25px" >Salir</a>
      <h4 style="margin-left:20px"><span style="color: green;">Aprendiz:</span> <?php echo $_SESSION["nombre"] ?></h4>
      <span>Tiempo: <span class="timer">00</span></span>
    </header>
    
      <a href="../BotiquinTipoA.php" type="submit" class="btn-practica-A">Práctica</a>

      <div class="grid"></div>
  
  </main>

</body>

</html>