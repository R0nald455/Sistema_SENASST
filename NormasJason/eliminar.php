<?php 
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
      <div class="btn-group">
        <a href="indextrab.php" class="btn btn-success">Ministerio del Trabajo</a>
        <a href="indexagro.php" class="btn btn-success">Ministerio Agricultura</a>
        <a  href="indersalud.php" class="btn btn-success">Invima</a>
        <a  href="index.php" class="btn btn-success">Agregar</a>
        <a  href="editar.php" class="btn btn-success">Editar</a>
        <a  href="eliminar.php" class="btn btn-success">Eliminar</a>
      </div>
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

      <center><h2>Eliminar</h2></center>

      <form action="" method="post">
      
      <center><div class="form-group">
      <label for="miCombo">¿Cual es el ministerio al que le quiere eliminar la norma?</label>
      <br>
      <select id="miCombo" name="normaTab" required>
        <option value="normas_trab">Ministerio de trabajo</option>
        <option value="normas_hig">Invima</option>
        <option value="normas_ica">Ministerio Agricultura</option>
        <option value="normas_apren">normas Apendiz</option>
      </select>
  </div></center>
 <center> <div class="form-group">
  <label for="miCombo">¿Cual es el codigo de la norma que desea eliminar?</label>
      <input type="number" name="recibidor" required >
      <br><br>
      <input type="submit">
      </div></center>
      </form>
      

<?php
include ('conexion.php');
error_reporting(0);
$normaTab =$_POST['normaTab'];
$recibidor =$_POST['recibidor'];


if ($recibidor==0){
   echo"no hay respuesta";
}else{

    $sql ="SELECT  num_resol, concepto, descripcion FROM $normaTab where id=$recibidor";
    $resultado= mysqli_query($db, $sql);
    $fila= mysqli_fetch_assoc($resultado);
    $finalmente=$fila['num_resol'];
    $finalmente2=$fila['concepto'];
    $finalmente3=$fila['descripcion'];
    if(empty($fila)){
      echo "<h1>el codigo no ha sido encontrado</h1>";
    }else{
      
    

?>
<center><h2>¿Quiere eliminar esta norma?</h2></center>


      <div class="form-group">
          <label for="nombre">Numero de Resolución </label>
          <input type="text" name="num_resol" class="form-control" id="num_resol" required value="<?php echo $finalmente; ?>">
      </div>

      <div class="form-group">
          <label for="pape">Concepto</label>
          <input type="text" name="concepto" class="form-control" id="concepto" value="<?php echo $finalmente2; ?>" required>
      </div>

      <div class="form-group">
          <label for="sape">Descripciom</label>
          <input type="text" name="descripcion"  class="form-control" id="descripcion" value="<?php echo $finalmente3; ?>" required >
      </div>

      <center>
      <form method="POST" action="procesar/eliminarPro.php" >

      <input type="hidden" name="id" value="<?php echo $recibidor ?>">
      <input type="hidden" name="miCombo" value="<?php echo $normaTab  ?>">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">

        <br>
      </center>

    </form>



<?php
}
}
?>


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

      