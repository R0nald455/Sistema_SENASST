<?php include '../../conexion.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <?php include("head.php"); ?>
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
                    <li><img src="../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena"></li>
                    <li><a href="../../../php/rolFuncionario/indexfuncionario.php" id="selected">Inicio</a></li>
                    <li><a href="../botiquines/index.php">Administrar Elementos</a></li>
                    <li><a href="../inspecciones/index.php">Inspeccion de Elementos</a></li>
                    <li><a href="../entradas/index.php">Entrada de Elementos</a></li>
                    <li><a href="../salidas/index.php">Salida de Elementos</a></li>

                </ul>
            </nav>

            <div class="responsive-container">
                <img id="logoResponsive" src="../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena">
            </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
    <center>
        <b><h1>Inspección de Botiquines ❤️‍🩹</h1></b>
    </center>
    <br>

    <div class="col-12 col-md-12">
        <ul class="list-group">
            <li class="list-group-item">
                <form method="post" action="../inspecciones/mostrar_datos.php">
                    <center>
                        <br>
                        <h1>Por favor, ingrese la ubicacion en donde desea inspeccionar. </h1>
                        <br>
                        <select name="divSeleccionado" class="form-select form-select-lg mb-3">
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

    <input class="btn btn-outline-success" type="submit" value="Mostrar Datos">

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