<?php
session_start();
error_reporting(0);
require_once("../db/conexion.php");
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Reglamento del aprendiz </title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../footer/footer.php">
  <link rel="stylesheet" href="../css/style_reglamento.css">

</head>

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

      <a href="../php/rolPersona/indexpersona.php"><img id="logoResponsive" src="../img/LogoSenaBlanco.png" width="50px"
          alt="logoSena"></a>


      <nav>
        <ul>

          <li><a href="../php/rolPersona/indexpersona.php"><img src="../img/LogoSenaBlanco.png" width="50px"
                alt="logoSena"></a></li>

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

          <?php else: ?>

            <li><a href="../index.php" id="selected">Inicio</a></li>

          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </div>

  <div class="container">
    <hr>
    <div class="row">
      <div class="col-12 col-md-12">
        <ul class="list-group">
          <li class="list-group-item">
            <form method="post">
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInput">Curso</label>
                  <input required name="PalabraClave" type="text" class="form-control mb-2" id="inlineFormInput"
                    placeholder="Ingrese palabra clave"><br>
                  <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
                </div>
                <div class="col-auto">
                  <button type="submit">Buscar</button>
                </div>
              </div>
            </form>
          </li>
        </ul>


        <?php
        if (!empty($_POST)) {
          $aKeyword = explode(" ", $_POST['PalabraClave']);
          $query = "SELECT * FROM articulos WHERE articulo like '%" . $aKeyword[0] . "%' OR descripcion like '%" . $aKeyword[0] . "%'";
          for ($i = 1; $i < count($aKeyword); $i++) {
            if (!empty($aKeyword[$i])) {
              $query .= " OR descripcion like '%" . $aKeyword[$i] . "%'";
            }
          }
          $result = $conexion->query($query);


          if (mysqli_num_rows($result) > 0) {
            $row_count = 0;
            echo "<br><br>Resultados encontrados: ";
            echo "<br><table class='table table-striped text-justify'>
          <th>No</th>
          <th>Descripción</th>
          <th>Interpretación</th>";
            while ($row = $result->fetch_assoc()) {
              $palabra = ['integral'];
              $conPalabras = "SELECT  palabra from significados";
              $significado = mysqli_query($conexion, $conPalabras);
              while ($fila = mysqli_fetch_assoc($significado)) {
                $palabra[] = $fila['palabra'];
              }
              $texto = explode(" ", $row['descripcion']);
              echo "<tr><td>" . $row['articulo'] . "</td><td>";
              $x = 0;
              while ($x < count($texto)) {
                if (in_array($texto[$x], $palabra)) {
                  $cons = "SELECT definicion FROM significados where palabra='$texto[$x]'";
                  $significado = mysqli_query($conexion, $cons);
                  while ($fila = mysqli_fetch_assoc($significado)) {
                    echo '<a href="#" data-mdb-toggle="tooltip" title="' . $fila['definicion'] . '">' . $texto[$x] .
                      '</a>';
                  }
                  $x++;
                } else {
                  echo ' ' . $texto[$x] . ' ';
                  $x++;
                }
              }
              echo " 
              </td><td>" . $row['interpretacion'] . "</td></tr>";
              /* <td><a class='expand-button' href='#card-content'>▼</a></td> */

            }
            echo "</table>";
          } else {
            echo "<br>Resultados encontrados: Ninguno";
          }
        }

        ; ?>
      </div>
    </div>
  </div>
  <?php
  include("../footer/footer.php");
  ?>

</body>

</html>