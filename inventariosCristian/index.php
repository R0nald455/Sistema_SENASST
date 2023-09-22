<?php
session_start();
$url_base = "https://cbaproy20.com/SenaSST/inventariosCristian/"; ?>

<!doctype html>
<html lang="en">

<head>
    <title>Inventario</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>template/Style/nav11.css">
</head>

<?php if (isset($_SESSION["id"])): ?>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <ul class="nav navbar-nav">
            <?php

            $rol = $_SESSION["rol"];

            if ($rol == 1) {
                ?>
                <li class="nav-item">
                    <a class="nav-link active" href="../php/rolFuncionario/indexfuncionario.php" aria-current="page">Sena
                        CBA<span class="visually-hidden">(current)</span></a>
                </li>
                <?php
            } elseif ($rol == 4) {
                ?>
                <li class="nav-item">
                    <a class="nav-link active" href="../php/rolFuncionario/indexadministrador.php" aria-current="page">Sena
                        CBA<span class="visually-hidden">(current)</span></a>
                </li>
                <?php
            }
            ?>

            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $url_base; ?>index.php" aria-current="page">Busqueda<span
                        class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/contacto/">Personas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/elemento/">Dotación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>modulos/asignacion/">Asignación</a>
            </li>
        </ul>
    </nav>

    <body>

        <main class="container">
            <br>
            <br>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Inventario</h1>
                    <p class="col-md-8 fs-4">En esta página, podrás insertar datos y visualizar la información de un
                        inventario. Nuestro objetivo es proporcionarte una herramienta sencilla y eficiente para gestionar
                        tus activos.</p>
                    <br>
                    <label>
                        <h2>Buscar Persona</h2>
                        <br>
                        <p>Detalles Generales de la Persona y su Asignación Correspondiente</p>
                    </label>
                    <form class="d-flex mb-3" action="buscar.php" method="GET">
                        <input class="form-control me-2" type="search" name="term" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </div>
            </div>

            <?php include("template/footer.php"); ?>

        <?php else: ?>

            <script>
                alert("No has iniciado sesión, por favor inicia a continuación.");
                window.location.href = "../php/login.php";
            </script>

        <?php endif; ?>