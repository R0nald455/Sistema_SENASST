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

  <link rel="stylesheet" href="./css/resetty.css">
  <link rel="stylesheet" href="./css/loginnn.css">

  <script defer src="./js/login.js"></script>
  <link rel="shortcut icon" href="./images/logosena.png" type="image/x-icon">
  <title>Memory Game</title>
</head>

<body>

  <form class="login-form">

    <div class="login__header">
      <div class="img-logo"></div>
      <a href="../LandingPageOFC/index.php" style="color: red; text-decoration: none; margin-bottom: 40px; font-size: 25px" >Salir</a>
      <h3 style="color: rgb(221, 255, 0); margin-bottom: 30px;"><span style="color: greenyellow; ">Aprendiz:</span> <?php echo $_SESSION["nombre"] ?></h3>
      <center>
        <h1>Memory Game SST - Elementos para cada tipo de botiquín</h1>
      </center>
    </div>
    
    <a href="./pages/game.php" type="submit" class="login__button">Tipo A</a>
    <a href="./pages/gameTipoB.php" type="submit" class="login__button">Tipo B</a>
    <a href="./pages/gameTipoC.php" type="submit" class="login__button">Tipo C</a>

  </form>

</body>

</html>