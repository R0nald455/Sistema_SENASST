<?php
session_start();
error_reporting(0);
require_once("../../db/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Sistema de inventario para botiquines y elementos de un botiquin</title>
    <link rel="icon" href="../../img/LogoSena.png">
    <script src="https://kit.fontawesome.com/27e58a102f.js" crosssorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/styles_inventario_extintores.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4) : ?>

        <header>
            <div class="header__superior">
                <div class="logo">
                    <img src="../../img/LogoSena.png" alt="">
                </div>
                <div class="tittle"><b>Sistema de inventario y inspecciones para botiquines y elementos de un
                        botiquin</b><br> Centro de
                    Biotecnologia <br> Agropecuaria </div>
            </div>
        </header>

        <div class="container__menu">
            <div class="menu">
                <input type="checkbox" id="check__menu">
                <label for="check__menu" class="lbl-menu">
                    <span id="spn1"></span>
                    <span id="spn2"></span>
                    <span id="spn3"></span>
                </label>
                <nav>
                    <ul>
                        <?php

                        $rol = $_SESSION["rol"];


                        if ($rol == 1) {
                        ?>
                            <li><a href="../../php/rolFuncionario/indexfuncionario.php" id="selected">Inicio</a></li>

                        <?php
                        } elseif ($rol == 4) {
                        ?>
                            <li><a href="../../php/rolFuncionario/indexadministrador.php" id="selected">Inicio</a></li>
                        <?php
                        }
                        ?>

                        <li><a href="#">Administrar</a>
                            <ul>
                                <li><a href="botiquines/index.php">Administrar botiquines</a></li>
                                <li><a href="botiquines/elementos/index.php">Administrar elementos</a>
                            </ul>
                        </li>
                        <li><a href="#">Inspeccion</a>
                            <ul>
                                <li><a href="botiquines/inspeccionBotiquines/index.php">Inspeccion de botiquines</a>
                                <li><a href="botiquines/inspecciones/index.php">Inspeccion de elementos</a>
                            </ul>
                        </li>

                        <li><a href="botiquines/entradas/index.php">Entrada de elementos</a>
                        <li><a href="botiquines/salidas/index.php">Salida de elementos</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="social-media__container">

            <a href="https://www.youtube.com/channel/UCt5y885UFplu2okY39TBwCg" target="_blank">
                <div class="social-media__item"><img src="https://i.imgur.com/y0pAMPe.png" alt=""></div>
            </a>
            <a href="https://twitter.com/SENAComunica?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank">
                <div class="social-media__item"><img src="https://i.imgur.com/0RAoGAx.jpg" alt=""></div>
            </a>
            <a href="https://es-la.facebook.com/SENA/" target="_blank">
                <div class="social-media__item"><img src="https://i.imgur.com/afIj2Mw.png" alt=""></div>
            </a>
            <a href="https://www.instagram.com/senacomunica/?hl=es" target="_blank">
                <div class="social-media__item"><img src="https://i.imgur.com/FV76U6t.png" alt=""></div>
            </a>

        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://i.imgur.com/TUrasyb.jpg" class="d-block w-100" alt="imagen1">
                </div>
                <div class="carousel-item">
                    <img src="https://i.imgur.com/2vHNjWo.jpg" class="d-block w-100" alt="imagen2">
                </div>
                <div class="carousel-item">
                    <img src="https://i.imgur.com/z07AMnz.jpg" class="d-block w-100" alt="imagen3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <div class="info-epps-container">

            <div class="info1-container">
                <div class="info1-text">
                    <div class="info1"><b>¿Que puedes hacer con el sistema de inventario para botiquines?</b> </div>
                    <div class="info1__content"> Un sistema de inventario para botiquines puede llegar a ser una herramienta esencial para
                        garantizar la disponibilidad, la seguridad y la eficiencia en la gestión de botiquines en el entorno
                        del Centro de Biotecnologia Agropecuaria. Al automatizar y sistematizar estas tareas, los
                        brigadistas en caso de emergencia pueden mejorar la atención al paciente y optimizar la utilización
                        de recursos.<br>
                    </div>
                </div>

                <div class="info1-img-container">
                    <img class="info1__image" src="https://i.imgur.com/6y0KWpL.png" alt="">
                </div>

            </div>

            <div class="info2-container">
                <div class="info2-text">
                    <div class="info2"><b>Objetivo general</b></div>
                    <div class="info2__content">El objetivo general de un sistema de inventario para botiquines es gestionar
                        de manera eficiente y precisa todas los botiquines del CBA, garantizando su
                        disponibilidad, excatitud en la cantidad de elementos y seguimiento integral para mejorar la atención al paciente y
                        optimizar los recursos disponibles.
                        <br>
                    </div>
                </div>

                <div class="info2-img-container">
                    <img class="info2__image" src="https://i.imgur.com/0R8xSws.jpg" alt="">
                </div>

            </div>

        </div>

        <div class="videos-relacionados">Videos <b>Relacionados</b></div>

        <div class="videos-relacionados__container">

            <iframe width="560" height="315" src="https://www.youtube.com/embed/XmQlmJtNYKo?si=yMdOyrkkILAlPDaR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/0S8LQ3pIqL8?si=OwGN5QlosqEleq-m" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/hVtFVDuuvGw?si=kPBryP_zjrwENpGC" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

        <footer>
            Servicio Nacional de Aprendizaje SENA - Centro de Biotecnología Agropecuaria - Regional Cundinamarca <br>
            Dirección: Kilómetro 7 vía Mosquera-Bogotá - Telefono: 5462323 Ext. 17963
            Conmutador Nacional (57 1) 5461500 - Extensión 17963 <br>
            PQRS: https://sciudadanos.sena.edu.co - servicioalciudadano@sena.edu.co <br>
            Atención al ciudadano: Bogotá (57 1) 3430111 - Línea gratuita y resto del país 018000 910270 <br>
            Atención al empresario: Bogotá (57 1) 3430101 - Línea gratuita y resto del país 018000 910682 <br>
            Notificaciones judiciales: judicialcundinamarca@sena.edu.co <br>
        </footer>

    <?php else : ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../../php/login.php";
        </script>

    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>