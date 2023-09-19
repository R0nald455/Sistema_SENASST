<?php 
session_start();
include 'conexion.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Normatividad</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </head>
  <body>
    <style>
      .container-fluid  {
    background-color:#5eb319;
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
      <div class="container-fluid ">
          <div class="row">
              <div class="col-md">
                  <header class="py-3">
                      <h3 class="text-center">Normatividad </h3>
                  </header>
              </div>
          </div>
          </div>
          <br>
          <br>
       <center>
       <?php if (isset($_SESSION["id"])):

          $rol = $_SESSION["rol"];

          if ($rol == 1) {
                ?>
                  <div class="btn-group">
                  <a href="indextrab.php" class="btn btn-success">Ministerio del Trabajo</a>
                  <a href="indexagro.php" class="btn btn-success">Ministerio Agricultura</a>
                  <a  href="indersalud.php" class="btn btn-success">Invima</a>
                  <a  href="index.php" class="btn btn-success">Agregar</a>
                  <a  href="editar.php" class="btn btn-success">Editar</a>
                  <a  href="eliminar.php" class="btn btn-success">Eliminar</a>
                </div>
                

                <?php
          } elseif ($rol == 2) {
                ?>

               

                <?php
          } elseif ($rol == 4) {
                ?>

                

                <?php
          }

          ?>

          <?php else: ?>


          <?php endif; ?>

      
       </center>
       <br>
       
<html>
<head>
  <title>REGISTRADOR</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <style>
    body{
      backdrop-filter: url(filters.svg#filter) blur(4px) saturate(40%);
      background-image: url(fondoregistro.gif);
      background-repeat: no-repeat;
      background-size: 150%;
      font-family: 'Times New Roman', Times, serif;
      font-size: large;
      color:black;
    }
  </style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<center><h1>ADMINISTRADOR DE NORMATIVIDAD</h1></center>


  <!--FUNCION DE VARIABLE GLOBAL-->


  <div class="row">
    <div class="col-md-4"></div>

  <!-- INICIA LA COLUMNA -->


    <div class="col-md-4">

      <center><h2>Insertar</h2></center>

      <form method="POST" action="procesar/insertar.php" >

      <div class="form-group">
      <label for="miCombo">¿A qué ministerio desea agregar normas?</label>
      <br>
      <center><select id="miCombo" name="miCombo" required>
        <option value="trabajo">Ministerio de trabajo</option>
        <option value="invima">Invima</option>
        <option value="agricultura">Ministerio Agricultura</option>
        <option value="aprendiz">normas Apendiz</option>
      </select></center>
  </div>

      <div class="form-group">
          <label for="nombre">Numero de Resolución </label>
          <input type="text" name="num_resol" class="form-control" id="num_resol" required >
      </div>

      <div class="form-group">
          <label for="pape">Concepto</label>
          <input type="text" name="concepto" class="form-control" id="concepto" required>
      </div>

      <div class="form-group">
          <label for="sape">Descripciom</label>
          <input type="text" name="descripcion" class="form-control" id="descripcion">
      </div>

      <center>
        <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
        <br>
      </center>

    </form>






<br>
<br>

       <footer class="container-fluid bg-dark fixed-bottom">
        <div class="row">
            <div class="col-md text-light text-center py-3">
                SENA CBA
            </div>
        </div>
    </footer>




</body>
</html>

      