<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/styleindex.css">
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
            <h1 class="head">Personas</h1>
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
                            <span class="fil">¿C</span>ómo surgió?
                        </h2>
                        <h1 class="head hea-dark">La Historia</h1>
                        <div class="circle">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <p>
                        Sabemos que el área de cuidado de las personas es lo más importante 
                        y algo que se debe preservara toda costa, así que pensamos en una mejora 
                        a ésta situación, haciendo que todo sea más sencillo y rapido al momento de primera
                        respuesta ante una emergencia médica, presentamos éste módulo en el cual podrás 
                        encontrar principalmente a los brigadistas y su informción básica, incluso en donde están 
                        ubicados, tambien información sobre dotación especial conla que cuantan algunas áreas en 
                        especifico, puedes obtener más información acá. 
                    </p>
                    <a href="#" class="btn cta-btn">Nosotros</a>
                </div>

            </div>
        </div>
    </section>


    <section class="taste bt">
        <div class="container">
            <div class="global">
                <h2 class="h2-sub">
                    <span class="fil">I</span>ncreibles
                </h2>
                <h1 class="head">Brigadistas</h1>
            </div>
        </div>
    </section>


    <section class="disco">
        <div class="container">
            <div class="res-info">
                <div class="res-des">
                    <div class="global">
                        <h2 class="h2-sub">
                            <span class="fil">D</span>escubre
                        </h2>
                        <h1 class="head hea-dark">Quiénes son:</h1>
                        <div class="circle">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <p>
                        Hablando de primeros auxilios, los brigadistas son las personas más importantes 
                        en ese momento, así que puedes conocer mucho acerca de ellos justo acá.
                    </p>
                    <a href="#" class="btn cta-btn">Más información</a>
                </div>
                <div class="image-group pad-rig">
                    <img src="images/img1brigad.jpg" alt="">
                    <img src="images/img2brigad.jpg" alt="">
                    <img src="images/img3brigad.jpg" alt="">
                    <img src="images/img4brig.jpg" alt="">
                </div>

            </div>
        </div>
    </section>

    <section class="pb bt">
        <div class="container">
            <div class="global">
                <h2 class="h2-sub">
                    <span class="fil">N</span>ecesitas
                </h2>
                <h1 class="head">¿Dotación?</h1>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="res-info">

                <div class="image-group">
                    <img src="images/dotac1.jpg" alt="">
                    <img src="images/dotac2.webp" alt="">
                </div>
                <div class="res-des pad-rig">
                    <div class="global">
                        <h2 class="h2-sub">
                            <span class="fil">¿C</span>ómo 
                        </h2>
                        <h1 class="head hea-dark">Funciona?</h1>
                        <div class="circle">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <p>
                        Tenemos conocimiento de que en ocasiones hay algo de desinformación
                        sobre este tema en particular, porque claro, ¿en dónde se encuentra?, 
                        ¿a quién se solicita?, ¿hay disponibilidad?, es confuso muchas veces, 
                        así que no te asustes, aquí puedes saberlo todo.
                    </p>
                    <a href="#" class="btn cta-btn">Más información</a>
                </div>

            </div>
        </div>
    </section>


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