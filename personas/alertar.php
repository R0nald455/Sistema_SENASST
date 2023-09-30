<?php
session_start();

include_once("../db/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>¡¡ Alertar brigadistas !!</title>
  <!-- custom css file link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/alertar.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="icon" href="../img/LogoSena.png">
</head>

<body>



  <!-- Menu de navegacion-->

  <!-- Menu de navegacion-->

  <div class="container__menu">

    <div class="menu">

      <input type="checkbox" id="check__menu">
      <label for="check__menu" class="lbl-menu">
        <span id="spn1"></span>
        <span id="spn2"></span>
        <span id="spn3"></span>
      </label>

      <img id="logoResponsive" src="../img/LogoSenaBlanco.png" width="50px" alt="logoSena"></a>

      <nav>

        <img src="../img/LogoSenaBlanco.png" width="50px" alt="logoSena"></a>

        <ul>
          <?php if (isset($_SESSION["id"])) :

            $rol = $_SESSION["rol"];


            if ($rol == 1) {
          ?>
              <li><a href="../php/rolFuncionario/indexfuncionario.php" id="selected">Inicio</a></li>

            <?php
            } elseif ($rol == 2) {
            ?>
              <li><a href="../php/rolPersona/indexpersona.php" id="selected">Inicio</a></li>

            <?php
            } elseif ($rol == 3) {
            ?>
              <li><a href="../php/rolPersona/indexbrigadista.php" id="selected">Inicio</a></li>

            <?php
            } elseif ($rol == 4) {
            ?>
              <li><a href="../php/rolFuncionario/indexadministrador.php" id="selected">Inicio</a></li>

            <?php
            }
            ?>

          <?php else : ?>

            <li><a href="../index.php" id="selected">Inicio</a></li>

          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </div>

  <div class="container" id="maestro">
    <div class="row justify-content-center">
      <div class="col-md-10" id="container">
        <div class="card">
          <form name="p-4" id="p-4" method="post" action="enviarAlerta.php" autocomplete="off" enctype="multipart/form-data">
            <div class="mb-3 text-center">
              <h1 class="heading">¡¡Envianos tu ubicación, para poder ayudarte!!</h1>
            </div>
            <div class="mb-3">
              <select id="contexto" name="contexto" onchange="mostrarOtro()">
                <option selected value="Administracion">Administracion</option>
                <option value="Auditorio">Auditorio
                </option>
                <option value="Bloque A">Bloque A</option>
                <option value="Bloque B">Bloque B
                </option>
                <option value="Bloque C">Bloque C</option>
                <option value="Biblioteca">
                  Biblioteca</option>
                <option value="Administracion educativa">Administracion educativa</option>
                <option value="Emprendimiento">Emprendimiento</option>
                <option value="Gastronomia">Gastronomia
                </option>
                <option value="Estar de instructores">Estar de instructores
                </option>
                <option value="Centro de convivencia">Centro de convivencia
                </option>
                <option value="Maquinaria agricola">Maquinaria agricola
                </option>
                <option value="Agroindustria">Agroindustria
                </option>
                <option value="Ganaderia">Ganaderia
                </option>
                <option value="Especies menores y mayores">Especies menores y mayores
                </option>
                <option value="Agricultura">Agricultura
                </option>
                <option value="Agricultura">Unidad de recursos naturales
                </option>
                <option value="otro">Otro</option>
              </select>
              <div id="otroRiesgo" style="display: none;">
                <label for="otroRiesgoInput">Cual:</label>
                <input type="text" id="otroRiesgoInput" name="otroRiesgoInput">
              </div>
              </p>
            </div>
            <div class="d-grid">
              <button name="submit" class="btn" id="BotonAlertar">Alertar!</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/alert.js"></script>
    <script src="script2.js"></script>
</body>

</html>