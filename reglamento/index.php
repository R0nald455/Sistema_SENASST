<?php include 'db/conexion.php';?>

<!doctype html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reglamento del aprendiz </title>
 <!--  <link href="css/bootstrap.min.css" rel="stylesheet">  -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">
  <h4 class="mt-5">Reglamento del Aprendiz</h4>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12">  
      <ul class="list-group">
        <li class="list-group-item">
          <form method="post">
            <div class="form-row align-items-center">
              <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Curso</label>
                <input required name="PalabraClave" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Ingrese palabra clave">  
                <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Buscar</button>

              </div>
            </div>
          </form>
    </li>
  </ul>


  <?php
  if(!empty($_POST))
  {
        $aKeyword = explode(" ", $_POST['PalabraClave']);
        $query ="SELECT * FROM articulos WHERE articulo like '%" . $aKeyword[0] . "%' OR descripcion like '%" . $aKeyword[0] . "%'";
      for($i = 1; $i < count($aKeyword); $i++) {
          if(!empty($aKeyword[$i])) {
              $query .= " OR descripcion like '%" . $aKeyword[$i] . "%'";
          }
        }
      $result = $conex->query($query);


      if(mysqli_num_rows($result) > 0) {
          $row_count=0;
          echo "<br><br>Resultados encontrados: ";
          echo "<br><table class='table table-striped'>";
          While($row = $result->fetch_assoc()) {   
              $palabra=['integral'];
              $conPalabras="SELECT  palabra from significados";
              $significado=mysqli_query($conex,$conPalabras);
              while($fila = mysqli_fetch_assoc($significado)) {
                  $palabra[]=$fila['palabra'];
              }
              $texto=explode(" ",$row['descripcion']);
              echo "<tr><td>". $row['articulo'] . "</td><td>";
              $x=0;
              while($x<count($texto)){
                  if(in_array($texto[$x],$palabra)){
                    $cons="SELECT definicion FROM significados where palabra='$texto[$x]'";
                    $significado=mysqli_query($conex,$cons);
                    while($fila = mysqli_fetch_assoc($significado)) {
                        echo '<div class="tooltip">'.$texto[$x].
                        '<span class="tooltiptext">'.$fila['definicion'].'</span></div>';
                    }
                    $x++;
                  }else{
                      echo ' '.$texto[$x].' ';
                      $x++;
                  }
              }
              echo "</td></tr>";


          }
          echo "</table>";
      }
      else {
          echo "<br>Resultados encontrados: Ninguno";
      }
  }
  
  ?>
  </div>
  </div>
</div>
    </body>
</html>