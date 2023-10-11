<?php
session_start();
error_reporting(0);
include '../db/conexion.php';
?>
<!doctype html>
<html lang="es">

<head>
  <title>Normatividad</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/header.css">
  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</head>
<style>
  .container-fluid {
    background-color: #5eb319;
  }

  .btn-success {
    color: #fff;
    background-color: #5eb319;
    border-color: #5eb319;
  }

  .text-center {
    color: white;
  }
</style>

<body>

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
          <?php if (isset($_SESSION["id"])):

            $rol = $_SESSION["rol"];


            if ($rol == 1) {
              ?>
              <li><a href="../php/rolFuncionario/indexfuncionario.php" id="selected">Inicio</a></li>

              <?php
            } elseif ($rol == 2) {
              ?>
              <li><a href="../php/rolPersona/indexpersona.php" id="selected">Inicio</a></li>

              <?php
            } elseif ($rol == 4) {
              ?>
              <li><a href="../php/rolFuncionario/indexadministrador.php" id="selected">Inicio</a></li>

              <?php
            }
            ?>

          <?php else: ?>

            <li><a href="../index.php" id="selected">Inicio</a></li>

          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </div>
  <br>
  <br>
  <center>
    <div class="btn-group" id="botones">
      <a href="indextrab.php" class="btn btn-success">Ministerio del Trabajo</a>
      <a href="indexagro.php" class="btn btn-success">Ministerio Agricultura</a>
      <a href="indersalud.php" class="btn btn-success">Invima</a>
    </div>
  </center>
  <br>
  <center>
    <ul class="list-group">
      <li class="list-group-item">
        <form method="post">
          <div class="form-row align-items-center">
            <div class="col-auto">
              <input type="text" name="PalabraClave" placeholder="Ingrese una palabra clave">
              <button type="submit" class="btn btn-success mb-2">Buscar Ahora</button>
            </div>
          </div>
        </form>
      </li>

    </ul>
  </center>

  <?php

  if (!empty($_POST)) {
    $aKeyword = explode(" ", $_POST['PalabraClave']);
    $query = "SELECT * FROM normas_apren WHERE concepto like '%" . $aKeyword[0] . "%' OR descripcion like '%" . $aKeyword[0] . "%'";

    for ($i = 1; $i < count($aKeyword); $i++) {
      if (!empty($aKeyword[$i])) {
        $query .= " OR descripcion like '%" . $aKeyword[$i] . "%'";
      }
    }
    $result = $conexion->query($query);
    echo "<br>Has buscado la palabra clave:<b> " . $_POST['PalabraClave'] . "</b>";

    if (mysqli_num_rows($result) > 0) {
      $row_count = 0;
      echo "<br><br>Resultados encontrados: ";
      echo "<br><table class='table table-striped'>";
      while ($row = $result->fetch_assoc()) {
        $row_count++;
        echo "<tr><td>" . $row_count . " </td><td>" . $row['fech_ingre'] . "</td><td>" . $row['num_resol'] . "</td><td>" . $row['descripcion'] . "</td><td>" . $row['concepto'] . "</td></tr>";
      }
      echo "</table>";

    } else {
      echo "<br>Resultados encontrados: Ninguno";

    }
  }

  ?>
  </div>
</body>

</html>