<?php include '../db/conexion.php';?>
<!doctype html>
<html lang="es">
  <head>
    <title>Normas del Ministerio del Trabajo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/header.css">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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

    <a href="../php/rolPersona/indexPersona.php"><img id="logoResponsive" src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></a>
    

    <nav>
        <ul>
            
            <li><a href="../php/rolPersona/indexPersona.php"><img src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></a></li>

            <li><a href="index.php" id="selected">Inicio</a></li>
            <li><a href="#trainer">Brigadistas</a></li>
            <li><a href="php/login.php">Reglamento</a></li>
            <li><a href="#newsletter">Reportar</a></li>
            <li><a href="#testimonial">Noticias</a></li>
        </ul>
    </nav>
</div>
</div>
      <div class="container-fluid ">
          <br>
          <br>
       <center>
       <div class="btn-group">
        <a  href="index.php" class="btn btn-success">inicio</a>
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

if(!empty($_POST))
{
$aKeyword = explode(" ", $_POST['PalabraClave']);
$query ="SELECT * FROM normas_trab WHERE concepto like '%" . $aKeyword[0] . "%' OR descripcion like '%" . $aKeyword[0] . "%'";

for($i = 1; $i < count($aKeyword); $i++) {
 if(!empty($aKeyword[$i])) {
     $query .= " OR descripcion like '%" . $aKeyword[$i] . "%'";
 }
}

$result = $conexion->query($query);
echo "<br>Has buscado la palabra clave:<b> ". $_POST['PalabraClave']."</b>";
              
if(mysqli_num_rows($result) > 0) {
 $row_count=0;
 echo "<br><br>Resultados encontrados: ";
 echo "<br><table class='table table-striped'>";
 While($row = $result->fetch_assoc()) {   
     $row_count++;                         
     echo "<tr><td>".$row_count." </td><td>". $row['concepto'] . "</td><td>". $row['descripcion'] . "</td></tr>";
 }
 echo "</table>";

}
else {
 echo "<br>Resultados encontrados: Ninguno";
 
}
}

?>

       <footer class="container-fluid bg-dark fixed-bottom">
        <div class="row">
            <div class="col-md text-light text-center py-3">
                Autor: Yeison Steven Valbuena Leguizamon
            </div>
        </div>
    </footer>
</body>
</html>