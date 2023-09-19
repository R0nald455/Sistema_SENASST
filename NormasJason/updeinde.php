
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
  <!--FUNCION DE VARIABLE GLOBAL-->


  <div class="row">
    <div class="col-md-4"></div>

  <!-- INICIA LA COLUMNA -->


    <div class="col-md-4">

      <center><h1>ADMINISTRADOR DE NORMATIVIDAD</h1></center>

      <form method="POST" action="index.php" >

      <div class="form-group">
        <label for="cod">Codigo</label>
        <input type="text" name="id" class="form-control" id="id" require>
      </div>

      <div class="form-group">
        <label for="cod">Fecha de Ingreso</label>
        <input type="text" name="fech_ingre" class="form-control" id="fech_ingre" require  >
      </div>

      <div class="form-group">
          <label for="nombre">Numero de Resolución </label>
          <input type="text" name="num_resol" class="form-control" id="num_resol" require >
      </div>

      <div class="form-group">
          <label for="pape">Concepto</label>
          <input type="text" name="concepto" class="form-control" id="concepto" require>
      </div>

      <div class="form-group">
          <label for="sape">Descripciom</label>
          <input type="text" name="descripcion" class="form-control" id="descripcion">
      </div>

      <center>
        <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
        <input type="submit" value="Editar" class="btn btn-info" name="btn_editar">
        <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
        <br>
      </center>

    </form>
    <?php
      include("conexion.php");
        
        $id="";
        $fech_ingre="";
        $num_resol="";
        $concepto="";
        $descripcion="";

        if(isset($_POST['btn_registrar']))
        {      
          $id=$_POST['id'];
          $fech_ingre=$_POST['fech_ingre'];
          $num_resol=$_POST['num_reso'];
          $concepto=$_POST['concepto'];
          $descripcion=$_POST['descripcion'];

          if ($id=="" || $fech_ingre=="" || $num_resol=="" || $concepto=="" || $descripcion=="" ){
            echo "Los campos son obligatorios";
          }
          else{
            
            mysqli_query($db, "INSERT * INTO`normas_apren`(`id`, `fech_ingre`, `num_resol`, `concepto`, `descripcion`) 
            values ('$id','$fech_ingre','$num_resol','$concepto','$descripcion')");
            
          }
          echo "REGISTRO EXITOSO";
        }
        ?>
        