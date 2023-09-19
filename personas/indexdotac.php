<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/styledotac.css">
    <link rel="stylesheet" href="../css/header-modulos.css">

    <?php
        include("./config.php");
    ?>
    
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
    </label>

    <a href="../php/rolPersona/indexpersona.php"><img id="logoResponsive" src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></a>
    

    <nav>
        <ul>
            
            <li><a href="../php/rolPersona/indexpersona.php"><img src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></a></li>

            <li><a href="#overview" id="selected">Inicio</a></li>
            <li><a href="../php/rolPersona/indexpersona.php">salir</a></li>
        </ul>
    </nav>
</div>


    <section class="hero" id="hero">
        <div class="container">
            <h2 class="h2-sub">
                <span class="fil">B</span>ienvenido a:
            </h2>
            <h1 class="head">Dotación</h1>
            <div class="he-des">
                <h5></h5>
            </div>
        </div>
    </section>

    <section class="dis-sto">
        <div class="container">
            <div class="res-info">
                <div>
                    <img src="images/persurgio.jpg" alt="">
                </div>
            
                <div class="res-des pad-rig">
                    <div class="global">
                        <h2 class="h2-sub">
                            <span class="fil">¿P</span>or qué
                        </h2>
                        <h1 class="head hea-dark">Es importante?</h1>
                        <div class="circle">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <p>
                        La dotación industrial es el conjunto de implementos para el 
                        desarrollo de las actividades riesgosas. Esta dotación le 
                        permite a los trabajadores, contar con elementos de seguridad 
                        adecuados; además de proporcionar los elementos adecuados para 
                        realizar el trabajo.
                    </p>
                    <a href="#" class="btn cta-btn">Nosotros</a>
                </div>

            </div>
        </div>
    </section>

    <!--TARJETAS Informativas-->

    <div class="container__card">
        <div class="card__father">
            <div class="card">
                <div class="card__front" style="background-image: url(images/img/ganaderia.jpg);">
                    <div class="bg"></div>
                    <div class="body__card_front">
                        <h1>Pecuarios</h1>
                    </div>
                </div>
                <div class="card__back">
                    <div class="body__card_back">
                        <h1>Pecuarios</h1>
                        <pU>En este tipo de dotación encontraremos el overol y botas en caucho están pensadas para <b> el trabajo de campo</b> se suele utilizar en ambientes como: ganadería, porcicultura, avicultura, conicultura y demás.</pU>
                        <br><br><br><br>
                        <input type="button" value="Leer Más" onclick="window.location.href='https://bienestarcba.blogspot.com/p/uniformes-centro-de-biotecnologia.html'">
                    </div>
                </div>
            </div>
        </div>

        <div class="card__father">
            <div class="card">
                <div class="card__front" style="background-image: url(images/img/gastronomia.jpg) ">
                    <div class="bg"></div>
                    <div class="body__card_front">
                        <h1>Gastronomicos</h1>
                    </div>
                </div>
                <div class="card__back">
                    <div class="body__card_back">
                        <h1>Gastronomicos</h1>
                        <pI>Consta de un gorro, delantal, chaqueta y pantalón. El delantal es una prenda pensada para evitar que la persona ensucie su ropa. La chaqueta y el pantalón están pensados para <b>garantizar la seguridad</b> en las cocinas</pI>
                        <br><br><br><br>
                        <input type="button" value="Leer Más" onclick="window.location.href='https://bienestarcba.blogspot.com/p/uniformes-centro-de-biotecnologia.html'">
                    </div>
                </div>
            </div>
        </div>

        <div class="card__father">
            <div class="card">
                <div class="card__front" style="background-image: url(images/img/deportivos.png) ">
                    <div class="bg"></div>
                    <div class="body__card_front">
                        <h1>Deportivos</h1>
                    </div>
                </div>
                <div class="card__back">
                    <div class="body__card_back">
                        <h1>Deportivos</h1>
                        <pI>Consta generalmente de una sudadera completa de color azul oscuro y azul claro a los lados, camisa tipo polo color blanca, pantaloneta y tenis blancos, el <b>color varía conforme a su tipo de entrenamiento</b> en algunos casos es camiseta roja o blanca deportiva y pantaloneta negra.</pI>
                        <br><br>
                        <input type="button" value="Leer Más" onclick="window.location.href='https://bienestarcba.blogspot.com/p/uniformes-centro-de-biotecnologia.html'">
                    </div>
                </div>
            </div>
        </div>

        <div class="card__father">
            <div class="card">
                <div class="card__front" style="background-image: url(images/img/administrativos.png);">
                    <div class="bg"></div>
                    <div class="body__card_front">
                        <h1>Administrativos</h1>
                    </div>
                </div>
                <div class="card__back">
                    <div class="body__card_back">
                        <h1>Administrativos</h1>
                        <pI>Este tipo de dotación consta de un blazer azul, camisa blanca, jean azul y tenis blancos. Lo utilizan los <b> trabajos administrativos</b> como por ejemplo: gestión contable, asistencia administrativa, gestión empresarial, gestión documental y demás.</pI>
                        <br><br><br><br>
        
                        <input type="button" value="Leer Más" onclick="window.location.href='https://bienestarcba.blogspot.com/p/uniformes-centro-de-biotecnologia.html'">
                    </div>
                </div>
            </div>
        </div>

        <div class="card__father">
            <div class="card">
                <div class="card__front" style="background-image: url(images/img/brigadistas.jpg);">
                    <div class="bg"></div>
                    <div class="body__card_front">
                        <h1>Brigadistas</h1>
                    </div>
                </div>
                <div class="card__back">
                    <div class="body__card_back">
                        <h1>Brigadistas</h1>
                        <pI>La dotación de los brigadistas consta de un casco certificado, gafas con normas de protección, tapabocas de material particulado, chaleco multibolsillos tipo brigadista con reflectivos, linterna, silbato y brazalete brigadista. </pI>
                        <br><br><br><br>
                        
                        <input type="button" value="Leer Más" onclick="window.location.href='https://bienestarcba.blogspot.com/p/uniformes-centro-de-biotecnologia.html'">
                    </div>
                </div>
            </div>
        </div>

        <div class="card__father">
            <div class="card">
                <div class="card__front" style="background-image: url(images/img/instructores.jpg);">
                    <div class="bg"></div>
                    <div class="body__card_front">
                        <h1>Instructores</h1>
                    </div>
                </div>
                <div class="card__back">
                    <div class="body__card_back">
                        <h1>Instructores</h1>
                        <pI>La dotación de los instructores consta de una bata blanca o "bata científica", algunos no están obligados a portarlas pero esto ya depende del tipo de ambiente en el que instruye, se suele ver más seguido en ambientes administrativos, y biotecnológicos.   </pI>
                        <br><br><br>
                        
                        <input type="button" value="Leer Más" onclick="window.location.href='https://bienestarcba.blogspot.com/p/uniformes-centro-de-biotecnologia.html'">
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <footer>
        <div class="container">
            <div class="footer-content">

                <div class="footer-content-about">
                    <h4>Seguridad y Salud en el Trabajo</h4>
                </div>
                <div class="footer-div">
                    <div class="social-media">
                        <h4>Siguenos</h4>
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-tripadvisor"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4>Noticias</h4>
                        <form action="" class="news-form">
                            <input type="text" class="news-input"
                            placeholder="Escribe tu email"
                            >
                            <button class="news-btn" type="submit">
                                <i class="fas fa-envelope"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <script>

        const selectElement = function(element) {
            return document.querySelector(element);
        }


        let menuToggle = selectElement('.menu-toggle');
        let body = selectElement('body');

        menuToggle.addEventListener('click', function(){
            body.classList.toggle('open');
        })

    </script>

    
</body>
</html>