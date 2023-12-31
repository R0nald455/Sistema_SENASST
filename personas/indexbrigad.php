<?php

session_start();

@include 'config.php';

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conexion, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'La alerta ha sido enviada al brigdista, por favor espere...';
    } else {
        $insert_product = mysqli_query($conexion, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
        $message[] = 'La alerta ha sido enviada al brigdista, por favor espere...';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brigadistas</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/styleindex.css">
</head>

<body>

    <?php if (isset($_SESSION["id"])): ?>

        <?php

        if (isset($message)) {
            foreach ($message as $message) {
                echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
            }
            ;
        }
        ;

        ?>

        <?php include 'header.php'; ?>

        <div class="container">

            <section class="products">

                <div class="container">
                    <div class="res-info">
                        <div>
                            <img src="images/brigadistassena.jpg" alt="">
                        </div>

                        <div class="res-des pad-rig">
                            <div class="global">
                                <h2 class="h2-sub">
                                    <span class="fil">¿Q</span>ué es
                                </h2>
                                <h1 class="head hea-dark">Una brigada de emergencia?</h1>
                                <div class="circle">
                                    <i class="fas fa-circle"></i>
                                </div>
                            </div>
                            <p>
                                Es un grupo de trabajadores organizados debidamente
                                entrenados y capacitados para actuar antes, durante
                                y después de una emergencia en la institución. A los
                                cuales se les denomina brigadistas que se desempeñan
                                como promotores del área preventiva y actúan en caso
                                de una emergencia.
                            </p>
                            <a href="#" class="btn cta-btn">Nosotros</a>
                        </div>

                    </div>
                </div>

                <h1 class="heading">Conoce a nuestros Brigadistas</h1>

                <section>
                    <a href="admin.php" class="btn cta-btn">Gestionar Brigadista</a>
                </section>

                <div class="box-container">

                    <?php

                    $select_products = mysqli_query($conexion, "SELECT * FROM `products`");
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                            ?>

                            <form action="" method="post">
                                <div class="box">
                                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                                    <h3>
                                        <?php echo $fetch_product['name']; ?>
                                    </h3>
                                    <div style="font-size: 15px;" class="price">Correo:
                                        <?php echo $fetch_product['contact']; ?>
                                    </div>
                                </div>
                            </form>

                            <?php
                        }
                        ;
                    }
                    ;
                    ?>

                </div>

            </section>

        </div>

        <footer>
            <div class="container">
                <div class="footer-content">

                    <div class="footer-content-about">
                        <b><h4>&copy;Servicio Nacional de Aprendizaje SENA - Centro de Biotecnologia Agropecuaria - Regional Cundinamarca <br>
					Dirección: Km 7 Via Bogota-Mosquera Cundinamarca - Telefono: (1) 5462323 Ext. 17967 <br>
					Conmutador Nacional (57 1) 5461500 <br>
					Atención telefónica: lunes a viernes 7:30 a.m. a 4:30 P.M <br>
					Atención al ciudadano: Bogotá (57 1) 5925555 - Línea gratuita y resto del país 018000 910270 <br>
					Atención al empresario: Bogotá (57 1) 4049494 - Línea gratuita y resto del país 018000 910682</h4></b> 
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
                                <input type="text" class="news-input" placeholder="Escribe tu email">
                                <button class="news-btn" type="submit">
                                    <i class="fas fa-envelope"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- custom js file link  -->
        <script src="js/script.js"></script>

    <?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../php/login.php";
        </script>

    <?php endif; ?>

</body>

</html>