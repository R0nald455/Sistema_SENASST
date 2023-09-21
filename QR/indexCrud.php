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
    <title>Inventario CRUD</title>
</head>


<body>

    <?php if (isset($_SESSION["id"])): ?>

        <header>

            <?php

            $rol = $_SESSION["rol"];

            if ($rol == 1) {
                ?>
                <a href="../php/rolFuncionario/indexfuncionario.php"><img src="Imagen/LogoSena.png" alt="logosena"></a>

                <?php
            } elseif ($rol == 4) {
                ?>
                <a href="../php/rolFuncionario/indexadministrador.php"><img src="Imagen/LogoSena.png" alt="logosena"></a>
                <?php
            }
            ?>
            <h1>QR</h1>
        </header>
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