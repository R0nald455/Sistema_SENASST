<?php
session_start();
error_reporting(0);
require_once("../db/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/contenidos.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">

    <title>Administrador de contenidos</title>
</head>

<body>
    <?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 4): ?>

        <!-- Menu de navegacion-->

        <div class="container__menu">

            <div class="menu">

                <input type="checkbox" id="check__menu">
                <label for="check__menu" class="lbl-menu">
                    <span id="spn1"></span>
                    <span id="spn2"></span>
                    <span id="spn3"></span>
                </label>

                <img style="margin: 5px;" id="logoResponsive" src="../img/LogoSenaBlanco.png" width="50px" alt="logoSena">

                <nav>
                    <ul>
                        <li><img src="../img/LogoSenaBlanco.png" width="50px" alt="logoSena"></li>
                        <li><a style="color: white;" onclick="window.location.href='../php/rolFuncionario/indexadministrador.php'"
                                id="selected">Inicio</a>
                        </li>
                        <li><a style="color: white;" onclick="window.location.href='../reglamento/index.php'">Reglamento</a></li>
                        <li><a href="#">Inspecciones</a>
                            <ul> <b>
                                    <li><a onclick="window.location.href='../inventarios/modulos/indexExtintores.php'">Inventario
                                            y inspeccion para extintores</a></li>
                                    <li><a onclick="window.location.href='../inventarios/modulos/indexBotiquines.php'">Inventario
                                            y inspeccion para botiquines</a></li>
                                    <li><a onclick="window.location.href='../inventarios/modulos/indexCamillas.php'">Inventario
                                            y inspeccion para camillas</a></li>
                            </ul> </b>
                        </li>
                        <li><a href="#">Inventarios</a>
                            <ul> <b>
                                    <li><a onclick="window.location.href='../inventariosCristian/index.php'">Inventario
                                            Dotacion</a></li>
                                    <li><a onclick="window.location.href='../dotacionSamuel/views/usuarios/index.php'">Inventario
                                            Dotacion Especial</a></li>
                                    <li><a onclick="window.location.href='../inventarios/modulos/indexEpps.php'">Inventario
                                            para EPP's</a></li>
                            </ul></b>
                        </li>
                        <li><a href="#">Administrativos</a>
                            <ul> <b>
                                    <li><a onclick="window.location.href='../administrador/View/user.php'">Administrar
                                            usuarios</a></li>
                                    <li><a href="#">Administrar
                                            Contenidos</a></li>
                                    <li><a onclick="window.location.href='../personas/indexbrigad.php'">Administrar
                                            Brigadistas</a></li>
                                    <li><a onclick="window.location.href='../QR/indexCrud.php'">Administrar Salon</a>
                            </ul> </b>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>

        <div class="container mt-4">
            <div class="row justify-content-center">

                <div class="card">
                    <a href="publicar.php"><button class="botonNuevo">Nueva Publicación +</button></a>
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'mostrar_datos.php'; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <?php
        include '../Footer/footer.php';
        ?>

    <?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../php/login.php";
        </script>

    <?php endif; ?>

</body>

</html>