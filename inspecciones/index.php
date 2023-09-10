<?php include '../db/conexion.php';?>

<!DOCTYPE html>
<html>
<head>
		<?php include("head.php");?>
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
            <span id="spn4"></span>

        </label>

        <nav>
            <ul>
                <li><img src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></li>
                <li><a href="../inventarios/index.php" id="selected">Inicio</a></li>
                <li><a href="../inventarios/modulos/extintores/index.php">Administrar extintores</a></li>
                <li><a href="../inspecciones/index.php">Inspección de Extintores</a></li>
                <li><a href="../inventarios/modulos/recarga/index.php">Extintores con revisiones pendientes</a></li>

            </ul>
        </nav>

        <div class="responsive-container">
            <img id="logoResponsive" src="../../../img/LogoSenaBlanco.png"  width="50px" alt="logoSena">
        </div>
    </div>
</div>

<header>
<h1>Inspección de Extintores</h1>
</header>
<br>

    <div class="col-12 col-md-12">  
      <ul class="list-group">
        <li class="list-group-item">
    <form method="post" action="../inspecciones/mostrar_datos.php">
    <center>
    <br>
    <h1>Por favor ingrese la ubicacion en donde desea inspeccionar </h1>
    <br>
    <select name="divSeleccionado" class="form-select form-select-lg mb-3" >
    <hr>
        <option value="Sistemas">Sistemas</option>
       <br>
       <option value="Ganaderia">Ganaderia</option>
        <br>
        <option value="Administracion">Administracion</option>
       <br>
       <option value="Cocina">Cocina</option>
       <br>
       <option value="Bloque A">Bloque A</option>
       <br>
       <option value="Bloque B">Bloque B</option>
       <br>
       <option value="Bloque C">Bloque C</option>
       <br>
       <option value="Biblioteca">Biblioteca</option>

    </div>
  </select>
  <br>

  <input type="submit" value="Mostrar Datos">

  </div>
  </div>
  </div>
</ul>
</li>
</center>
</form>
  </div>
</body>
</html>


