<?php
session_start();
include_once("../db/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tarjeta de Observacion</title>
      <link rel="stylesheet" href="../css/css.css">
      <script src="../js/jquery-1.12.4-jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
      <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">

</head>

<body>

      <div class="imagen-container">
            <a href="../index.php"><img class="imagen_TO" src="../img/LogoSena.png" alt=""></a>
      </div>


      <div class="TO-container">

            <div class="menu-container">
                  <div class="icon">
                        <?php if (isset($_SESSION["id"])):

                              $rol = $_SESSION["rol"];

                              if ($rol == 1) {
                                    ?>

                                    <a href="../php/rolFuncionario/indexfuncionario.php">Inicio</a>

                                    <?php
                              } elseif ($rol == 3) {
                                    ?>

                                    <a href="../php/rolPersona/indexbrigadista.php">Inicio</a>

                                    <?php
                              } elseif ($rol == 4) {
                                    ?>

                                    <a href="../php/rolFuncionario/indexadministrador.php">Inicio</a>

                                    <?php
                              }

                              ?>

                        <?php else: ?>

                              <a href="../index.php">Inicio</a>

                        <?php endif; ?>

                  </div>
            </div>

            <div class="menu-container">
                  <div class="icon">
                        <a href="calificar.php">Revisar</a>
                  </div>
            </div>

            <div class="menu-container">
                  <div class="icon">
                        <a href="ResEvaluacion.php">Estado</a>
                  </div>
            </div>

            <div class="menu-container">
                  <div class="icon">
                        <a href="crear.php">Reportar</a>
                  </div>
            </div>


      </div>

</body>

</html>