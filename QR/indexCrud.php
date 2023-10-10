<?php
session_start();
include("../db/conexion.php");


$sql = "SELECT * FROM inventariosalon";
$query = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Inventario CRUD</title>
</head>


<body>

    <?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4): ?>

        <!-- Menu de navegacion-->

        <div class="container__menu">

            <div class="menu">

                <input type="checkbox" id="check__menu">
                <label for="check__menu" class="lbl-menu">
                    <span id="spn1"></span>
                    <span id="spn2"></span>
                    <span id="spn3"></span>
                </label>

                <img id="logoResponsive" src="../img/LogoSenaBlanco.png" width="50px" alt="logoSena">


                <nav>
                    <ul>
                        <li><img src="../img/LogoSenaBlanco.png" width="50px" alt="logoSena"></li>

                        <?php

                        $rol = $_SESSION["rol"];

                        if ($rol == 1) {
                            ?>
                            <li><a href="../php/rolFuncionario/indexfuncionario.php" id="selected">Inicio</a></li>
                            <?php
                        } elseif ($rol == 4) {
                            ?>
                            <li><a href="../php/rolFuncionario/indexadministrador.php" id="selected">Inicio</a></li>
                            <?php
                        }
                        ?>
                        <li><a onclick="window.location.href='../reglamento/index.php'">Reglamento</a></li>
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
                        <?php
                        if ($rol == 1) {
                            ?>
                            <li><a href="#">Administrativos</a>
                                <ul> <b>
                                        <li><a onclick="window.location.href='../personas/indexbrigad.php'">Administrar
                                                Brigadistas</a></li>
                                        <li><a onclick="window.location.href='../QR/indexCrud.php'">Administrar Salon</a>
                                        <li><a onclick="window.location.href='../normasad/index.php'">Administrar Normas</a>
                                        </li>
                                </ul> </b>
                            </li>
                            <?php
                        } elseif ($rol == 4) {
                            ?>
                            <li><a href="#">Administrativos</a>
                                <ul> <b>
                                        <li><a onclick="window.location.href='../administrador/View/user.php'">Administrar
                                                usuarios</a></li>
                                        <li><a onclick="window.location.href='../contenidos/index.php'">Administrar
                                                Contenidos</a></li>
                                        <li><a onclick="window.location.href='../personas/indexbrigad.php'">Administrar
                                                Brigadistas</a></li>
                                        <li><a onclick="window.location.href='../QR/indexCrud.php'">Administrar Salon</a></li>
                                </ul> </b>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

        <br><br><br><br>

        <main>
            <center>
                <div class="users-form">
                    <h1>Crear Articulo</h1>
                    <form action="crud/insert.php" method="POST" id="formulario">
                        <input type="text" name="articulo" id="articulo" placeholder="Articulo">
                        <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad">

                        <input type="submit" value="Enviar" class="Enviar">
                    </form>
                </div>
                <center>
                    <div class="users-table">
                        <h2>Articulos registrados</h2>
                        <br>
                        <table>
                            <thead>
                                <tr>
                                    <th>Articulo</th>
                                    <th>Cantidad</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conexion, $sql);

                                while ($row = mysqli_fetch_array($result)): ?>
                                    <tr>
                                        <th>
                                            <?= $row['articulo'] ?>
                                        </th>
                                        <th>
                                            <?= $row['cantidad'] ?>
                                        </th>
                                        <th><a href="crud/update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a>
                                        </th>
                                        <th><a href="crud/delete.php?id=<?= $row['id'] ?>"
                                                class="users-table--delete">Eliminar</a></th>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </center>
        </main>

    <?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../php/login.php";
        </script>

    <?php endif; ?>

</body>

</html>