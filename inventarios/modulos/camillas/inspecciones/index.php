<?php include '../../../../db/conexion.php'; ?>

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
                    <li><img src="../../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena"></li>
                    <li><a href="../../indexCamillas.php" id="selected">Inicio</a></li>
                    <li><a href="../index.php">Administrar camillas</a></li>
                    <li><a href="#">Inspeccionar Camillas</a></li>
                    <li><a href="../revisiones/index.php">Camillas con revisiones pendientes</a></li>

                </ul>
            </nav>

            <div class="responsive-container">
                <img id="logoResponsive" src="../../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena">
            </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>
    <center>
        <h1>Inspección de camillas 🚑</h1>
    </center>
    <br>

    <div class="col-12 col-md-12">
        <ul class="list-group">
            <li class="list-group-item">
                <form method="post" action="mostrar_datos.php">
                    <center>
                        <br>
                        <h1>Por favor, ingrese la ubicacion en donde desea inspeccionar. </h1>
                        <br>
                        <select name="divSeleccionado" class="form-select form-select-lg mb-3">
                            <hr>
                            <option value="Administracion">Administracion</option>
                            <br>
                            <option value="Auditorio">Auditorio</option>
                            <br>
                            <option value="Bloque A">Bloque A</option>
                            <br>
                            <option value="Bloque B">Bloque B</option>
                            <br>
                            <option value="Bloque C">Bloque C</option>
                            <br>
                            <option value="Biblioteca">Biblioteca</option>
                            <br>
                            <option value="Administracion educativa">Administracion educativa</option>
                            <br>
                            <option value="Emprendimiento">Emprendimiento</option>
                            <br>
                            <option value="Gastronomia">Gastronomia</option>
                            <br>
                            <option value="Estar de instructores">Estar de instructores</option>
                            <br>
                            <option value="Centro de convivencia">Centro de convivencia</option>
                            <br>
                            <option value="Maquinaria agricola">Maquinaria agricola</option>
                            <br>
                            <option value="Agroindustria">Agroindustria</option>
                            <br>
                            <option value="Ganaderia">Ganaderia</option>
                            <br>
                            <option value="Especies menores y mayores">Especies menores y mayores</option>
                            <br>
                            <option value="Agricultura">Agricultura</option>
                            <br>
                            <option value="Unidad de recursos naturales">Unidad de recursos naturales</option>
    </div>
    </select>
    <br>

    <input class="btn btn-outline-success"  type="submit" value="Mostrar Datos">

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