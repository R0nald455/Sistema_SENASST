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
    <title>Administrador de contenidos</title>
</head>

<body>
    <?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 4): ?>
        <header>
            <a href="../php/rolFuncionario/indexadministrador.php"><img src="../img/LogoSena.png" alt="logosena"></a>
            <h1>Administrador de contenidos</h1>
        </header>

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