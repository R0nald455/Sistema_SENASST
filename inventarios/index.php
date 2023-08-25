<?php
session_start();
error_reporting(0);
require_once ("../db/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Sistema de inventario para extintores</title>
    <link rel="icon" href="../../img/LogoSena.png">
    <script src="https://kit.fontawesome.com/27e58a102f.js" crosssorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styles_inventario_extintores.css">
</head>
<body>

<?php if(isset($_SESSION["id"]) ): ?>

    <header>
        <div class="header__superior">
            <div class="logo">
                <img src="../img/LogoSena.png" alt="">
            </div>
            <div class="tittle"><b>Sistema de inventario para extintores</b><br> Centro de Biotecnologia <br> Agropecuaria </div>
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
                    <li><a href="../index.php" id="selected">Inicio</a></li>
                    <li><a href="#">Modulos</a>
                        <ul> <b>
                            <li><a href="../inventarios/modulos/extintores/index.php">Administrar extintores</a></li>
                            <li><a href="../inventarios/modulos/recarga/index.php">Extintores con revisiones pendientes</a></li>
                        </ul> </b>
                    </li>
                    <li><a href="#">Ayuda y Soporte</a></li>
                    <li><a href="#">Acerca de inventarios</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="social-media__container">
    
        <a href="https://www.youtube.com/channel/UCt5y885UFplu2okY39TBwCg" target="_blank"><div class="social-media__item"><img src="https://i.imgur.com/y0pAMPe.png" alt=""></div></a>
        <a href="https://twitter.com/SENAComunica?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><div class="social-media__item"><img src="https://i.imgur.com/0RAoGAx.jpg" alt=""></div></a>
        <a href="https://es-la.facebook.com/SENA/" target="_blank"><div class="social-media__item"><img src="https://i.imgur.com/afIj2Mw.png" alt=""></div></a>
        <a href="https://www.instagram.com/senacomunica/?hl=es" target="_blank"><div class="social-media__item"><img src="https://i.imgur.com/FV76U6t.png" alt=""></div></a>

    </div>

        <div class="contenedor-etiqueta">
            <img class="contenedor-etiqueta__image" src="https://i.imgur.com/8hl42hq.jpg">
        </div>

        <div class="info-extintor-container">

            <div class="info1-container">
                <div class="info1"><b>¿Que puedes hacer con el sistema de inventario para extintores?</b> </div>
                <div class="info1__content">El Sistema de inventario para extintores te permitirá mantener un registro preciso de todos tus extintores, garantizar que estén en condiciones óptimas para su uso y cumplir con las regulaciones de seguridad. Esto contribuirá a mejorar la preparación para situaciones de emergencia y a mantener un ambiente seguro para empleados y visitantes.  <br>
                        <img class="info1__image" src="https://i.imgur.com/eOKfrpo.jpg" alt="">
                </div>
            </div>

            <div class="info2-container">
                <div class="info2"><b>Objetivo general</b></div>
                <div class="info2__content">El objetivo general de un sistema de inventario para extintores es mejorar la seguridad, la eficiencia y el cumplimiento normativo en relación con los extintores, garantizando que estén listos y en buen estado para su uso en caso de emergencia. <br>
                    <img class="info2__image" src="https://i.imgur.com/XMG1mVU.gif" alt="">
                </div>
            </div>

        </div>
    
        
    
        <div class="videos-relacionados">Videos <b>Relacionados</b></div>
    
        <div class="videos-relacionados__container">
    
            <iframe class="videos-relacionados__item1" width="560" height="315" src="https://www.youtube.com/embed/i6rJQFOKuMI?si=OiEXnTljeCTftJ9w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <iframe class="videos-relacionados__item2" width="560" height="315" src="https://www.youtube.com/embed/UPe2Uyue418?si=Tko13R7mXI2WBd9S" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <iframe class="videos-relacionados__item3"  src="https://www.youtube.com/embed/87fQFljT7OQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    
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

<?php else:?>

    <h1>No has iniciado sesion.</h1>

<?php endif; ?>

</body>
</html>