<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Quiz</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <script src="../js/jquery-1.12.4-jquery.min.js"></script>


    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /* This CSS was created using SCSS/SASS */
/* Github source for project creation: https://github.com/nrcoover/quizapalooza-web-app */

@import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
*, *::before, *::after {
  box-sizing: border-box;
  border-style: none;
  list-style: none;
  margin: 0;
  padding: 0;
  text-decoration: none;
}

html, body {
  font-family: "Lato", sans-serif;
  font-size: 14px;
  min-width: 100%;
  width: 100%;
}

footer {
  background-color: #5eb319;
  bottom: 0;
  box-shadow: -2px -2px 5px rgba(18, 18, 18, 0.3);
  width: 100%;
}

#Start-Button-Wrap {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

#Quiz-Button-Wrap, #Retry-Button-Wrap {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

#Start-Button, #Next-Button, #Retry-Button, #Quit-Button, .container-timer {
  font-size: 1.5rem;
  line-height: 1.5rem;
  margin: 0 0;
  padding: 0 0;
  background-color: #018786;
  box-shadow: 0 0 5px rgba(18, 18, 18, 0.3);
  border-radius: 5px;
  color: #FFFFFF;
  font-weight: 700;
  height: 3.5rem;
  text-align: center;
  text-decoration: none;
  width: 8rem;
}

#Timer-Title {
  font-size: 0.8rem;
  line-height: 0.8rem;
}

.container-timer {
  margin: 0 0;
  padding: 0 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #FFFFFF;
  color: black;
  height: 3.5rem;
}

.footer-content-wrap {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  height: auto;
  margin: 0 auto;
  max-width: 40rem;
  padding: 2rem 2rem 3rem;
  width: 100%;
}


.header-content-wrap {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  height: auto;
  padding: 2rem 0;
  width: 100%;
}

body {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  font-size: 18px;
  min-height: 100vh;
  min-width: 330px;
}

main {
  height: auto;
  max-width: 40rem;
  padding: 2rem;
  width: 100%;
}

article {
  position: relative;
}

h1, h2, h3, h4, p, label {
  font-family: "Lato", sans-serif;
}

h1 {
  font-size: 3.4rem;
  line-height: 3.6rem;
  margin-bottom: 0.35em;
}

h2 {
  font-size: 1.6rem;
  line-height: 1.8rem;
  font-weight: 500;
  margin-bottom: 0.4em;
}

h3 {
  font-size: 1.2rem;
  line-height: 1.4rem;
  margin-bottom: 1rem;
}

h4 {
  font-size: 1.4rem;
  line-height: 1.6rem;
  margin-bottom: 1rem;
}

p {
  font-size: 1.3rem;
  line-height: 1.6rem;
  margin: 0 auto;
  max-width: 45ch;
}

input, label {
  font-size: 1.2rem;
  line-height: 1.4rem;
  font-family: "Lato", sans-serif;
  margin-left: 1.2rem;
  margin-bottom: 1.2rem;
  max-width: 45ch;
}

input[type=radio] {
  appearance: none;
  min-width: 1rem;
  width: 1rem;
  height: 1rem;
  border: 2px solid #5eb319;
  border-radius: 100%;
}

input[type=radio]:checked {
  background-color: #5eb319;
  width: 1rem;
  height: 1rem;
  border-radius: 100%;
  padding: 7px;
  transform: translate(-2px, -2px);
}

input:hover {
  cursor: pointer;
}

label {
  margin-left: 0.5rem;
}

#Shadow-Panel {
  background-color: rgba(0, 0, 0, 0.4);
  height: 100%;
  min-width: 330px;
  position: absolute;
  width: 100%;
  z-index: 5;
}

#Start-Menu, #Nothing-Selected-Notice, #Failed-Menu-Answer, #Failed-Menu-Time, #Quitting-Pug {
  background-color: #FFFFFF;
  padding: 1rem;
  border-radius: 15px;
  box-shadow: 0 0 5px rgba(18, 18, 18, 0.3);
}
#Start-Menu p, #Nothing-Selected-Notice p, #Failed-Menu-Answer p, #Failed-Menu-Time p, #Quitting-Pug p {
  text-align: justify;
}

#Nothing-Selected-Notice {
  position: absolute;
  bottom: 50%;
  right: 50%;
  transform: translate(50%, 50%);
  max-width: 80%;
  width: 100%;
  z-index: 10;
}
#Nothing-Selected-Notice .menu-content-wrap {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
#Nothing-Selected-Notice input {
  margin: 0 0;
  padding: 0 0;
  background-color: #018786;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(18, 18, 18, 0.3);
  color: #FFFFFF;
  font-weight: 700;
  padding: 1rem;
  margin-top: 1rem;
}

#Failed-Menu-Answer, #Failed-Menu-Time {
  background-color: rgba(176, 0, 32, 0.4);
}
#Failed-Menu-Answer .menu-content-wrap, #Failed-Menu-Time .menu-content-wrap {
  border: 3px solid #B00020;
  background-color: rgba(176, 0, 32, 0.4);
  color: #FFFFFF;
}

#Quitting-Pug {
  position: relative;
  padding-top: 2rem;
}
#Quitting-Pug .menu-content-wrap {
  margin: 0 0;
  padding: 0 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border: none;
}
#Quitting-Pug #It-Me-Paragraph {
  position: absolute;
  top: 12.5%;
}
#Quitting-Pug img {
  border: 3px solid #B00020;
  border-radius: 8px;
  max-height: 40rem;
  max-width: 100%;
}
#Quitting-Pug .small-paragraph {
  margin-top: 0.5rem;
}

#Menu-h3 {
  text-align: center;
}

.small-paragraph {
  font-size: 1rem;
  line-height: 1.3rem;
}

.radio-button-wrapper {
  display: flex;
  flex-direction: row;
}

.menu-content-wrap {
  background-color: #FFFFFF;
  padding: 1.5rem;
  border: 3px solid #018786;
  border-radius: 8px;
}

.quiz-title {
  font-size: 2rem;
  line-height: 2.2rem;
  font-weight: 900;
  margin-bottom: 0.8em;
  text-align: center;
}

.hidden {
  display: none;
}

.active-panel {
  display: block;
}

.winner-panel {
  text-align: center;
}

.winner-panel img {
  border-radius: 15px;
  box-shadow: 2px 2px 8px rgba(18, 18, 18, 0.3);
  margin: 1rem auto;
  width: 100%;
}

.failure-background-color {
  background-color: #B00020;
}

/* MEDIA QUERY TEMPLATE FROM https://www.w3schools.com/css/css_rwd_mediaqueries.asp */
/* Extra small devices (phones, 600px and down) */
@media only screen and (min-width: 460px) {
  html, body {
    background-color: #bdbdbd;
  }

  .question, .winner-panel {
    background-color: #FFFFFF;
    padding: 1rem;
    border-radius: 15px;
    box-shadow: 0 0 5px rgba(18, 18, 18, 0.3);
    accent-color: #5eb319;
    background: linear-gradient(#FFFFFF, #FFFFFF) padding-box, linear-gradient(to bottom, #5eb319, #5eb319) border-box;
    border: 20px solid transparent;
    border-radius: 25px;
    padding: clamp(2rem, 1rem + 10vw, 3rem);
  }
}
/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  body {
    background-image: linear-gradient(to right, #FFFFFF, #bdbdbd, #FFFFFF, #FFFFFF, #FFFFFF, #bdbdbd, #FFFFFF);
  }
}

#options-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 1rem; /* Ajusta el margen superior según necesites */
  }

  /* Estilos para los botones de opción */
  .answer {
    display: flex;
    align-items: center;
    font-size: 1.2rem;
  }

  input[type="radio"] {
    appearance: none;
    min-width: 1.2rem; /* Ajusta el tamaño según necesites */
    width: 1.2rem; /* Ajusta el tamaño según necesites */
    height: 1.2rem; /* Ajusta el tamaño según necesites */
    border: 2px solid #5eb319;
    border-radius: 100%;
    margin-right: 0.5rem; /* Ajusta el margen derecho según necesites */
  }

  input[type="radio"]:checked {
    background-color: #5eb319;
    width: 1.2rem;
    height: 1.2rem;
    border-radius: 100%;
    padding: 3px; /* Ajusta el padding según necesites */
    transform: translate(-2px, -2px);
  }

  label {
    font-size: 1.2rem;
    line-height: 1.4rem;
    font-family: "Lato", sans-serif;
  }

  #containerQuiz{
    position: relative;
    top :100px;
  }
    </style>
          <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
          <link href="blog.css" rel="stylesheet">
          <link href="./texdis.css" rel="stylesheet">
</head>
<body>
 
<!-- partial:index.partial.html -->
<!-- Images used were originally pulled form various creators at https://www.pexels.com/ -->
<!-- These images were uploaded at different dimensions to twitter, and then sourced from the following Twitter thread: https://twitter.com/coovercode/status/1515376340224167941 -->

<!-- Used as an underlay for the Nothing Selected Notice; prevents the rest of the application from functioing until the user closes the notice -->


<?php

include ('subirQuiz/conexion.php');


$nuelemen = "SELECT count(id) as total FROM problema";
$resultado0 = $conexion->query($nuelemen);
$row0 = $resultado0->fetch_assoc();
$totalFilas = $row0['total'];

// Crear una lista de números únicos
$listaNumeros = range(1, $totalFilas);
shuffle($listaNumeros); // Mezclar la lista para que esté en un orden aleatorio

// Obtener los primeros tres números únicos de la lista
$numeroAleatorio1 = array_shift($listaNumeros);
$numeroAleatorio2 = array_shift($listaNumeros);
$numeroAleatorio3 = array_shift($listaNumeros);

///// pregunta 1
$sql = "SELECT pregunta,respuesta,falsa1,falsa2,falsa3 FROM problema where id=$numeroAleatorio1";
$resultado = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_assoc($resultado);

$pregunta = $fila['pregunta'];
$respuesta = $fila['respuesta'];
$falsa1 = $fila['falsa1'];
$falsa2 = $fila['falsa2'];
$falsa3 = $fila['falsa3'];





////pregunta 2



///// pregunta 3

?>


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

            <li><a href="../php/rolPersona/indexpersona.php" id="selected">Inicio</a></li>

        </ul>
    </nav>
</div>
</div>



      <div class="header-content-wrap" id="containerQuiz">
    <h1>Quiz</h1>
    <h2>MAPA DE RIESGOS Y AMBIENTAL</h2>
  </div>


<main>
  <article>

    <section id="Start-Menu" class="menu hidden active-panel">
      <div class="menu-content-wrap">
        <h3 id="Menu-h3">Mapa de Riesgos y Mapa Ambiental</h3>
        <p>Este cuestionario cuenta de tres preguntas sobre mapa de riesgos y ambiental. Tendrá dos minutos para completar el cuestionario. La excelencia es obligatoria; Las respuestas incorrectas reiniciarán su cuestionario, sin embargo, su temporizador continuará disminuyendo. Puede volver a tomar el cuestionario tantas veces como desee. Presione "comenzar" para iniciar.</p>
      </div>
    </section>

    <section id="Failed-Menu-Answer" class="fail-notice hidden">
      <div class="menu-content-wrap">
        <h3 id="Menu-h3">Prueba fallida</h3>
      
        <p><center>respuesta incorrecta</center> </p>
    
      </div>
    </section>

    <section id="Failed-Menu-Time" class="fail-notice hidden">
      <div class="menu-content-wrap">
        <h3 id="Menu-h3">prueba fallida</h3>
        <p><center>Se agoto el tiempo intenta de nuevo</center> </p>
      </div>
    </section>

    <section id="Nothing-Selected-Notice" class="error-notice hidden">
      <div class="menu-content-wrap">
        <h3 id="Menu-h3">No seleccionaste nada</h3>
        <p>Con el objetivo de la excelencia en mente, debe seleccionar una respuesta para continuar.</p>
        <input id="Close-Button" type="submit" value="Cerrar" name="Close">
      </div>
    </section>

    <section id="Quitting-Pug" class="quitting-pug hidden">
      <div class="menu-content-wrap hidden">
        <p id="It-Me-Paragraph">bien hecho</p>
        <img id="Quitting-Pug-Small" class="puppies-small hidden quitting-pug-small" src="img/pexels-donald-tong-193821.jpg" alt="A sad-looking pug puppy with black fur; its eyes watering as they look up towards the camera with a frowning face.">
        <img id="Quitting-Pug-Medium" class="puppies-small hidden quitting-pug-medium" src="img/pexels-donald-tong-193821.jpg" alt="A sad-looking pug puppy with black fur; its eyes watering as they look up towards the camera with a frowning face.">
        <p class="small-paragraph">Te gustaria volver a hacerlo :)</p>
      </div>
    </section>

    <section id="Question-One" class="question hidden">
      <h3>preguntas 1 de 3</h3>
      <form action="">
          <h4><?php echo $pregunta;  ?></h4>
          <div class="radio-button-wrapper">
              <input class="wrong-answer answer" type="radio" id="Shopify" name="real-eCommerce-platform" value="Shopify">
              <label for="Shopify"><?php echo $falsa2;  ?></label><br>
          </div>
          <div class="radio-button-wrapper">
              <input class="wrong-answer answer" type="radio" id="WooCommerce" name="real-eCommerce-platform" value="WooCommerce">
              <label for="WooCommerce"><?php echo $falsa1;  ?></label><br>
          </div>
          <div class="radio-button-wrapper">
              <input class="correct-answer answer" type="radio" id="ShopCommerce" name="real-eCommerce-platform" value="ShopCommerce">
              <label for="ShopCommerce"><?php echo $respuesta;  ?></label><br>
          </div>
          <div class="radio-button-wrapper">
              <input class="wrong-answer answer" type="radio" id="BigCommerce" name="real-eCommerce-platform" value="BigCommerce">
              <label for="BigCommerce"><?php echo $falsa3;  ?></label><br>
          </div>
      </form>
  </section>
  

    <section id="Question-Two" class="question hidden">
      <?php
      $sql2 = "SELECT pregunta,respuesta,falsa1,falsa2,falsa3 FROM problema where id=$numeroAleatorio2";
      $resultado2 = mysqli_query($conexion, $sql2);
      
      $fila2 = mysqli_fetch_assoc($resultado2);

      $pregunta2 = $fila2['pregunta'];
      $respuesta2 = $fila2['respuesta'];
      $falsa1_2 = $fila2['falsa1'];
      $falsa2_2 = $fila2['falsa2'];
      $falsa3_2 = $fila2['falsa3'];

      ?>
      <h3>preguntas 2 de 3</h3>
      <form action="">
        <h4> <?php echo $pregunta2;  ?></h4>
        <div class="radio-button-wrapper">
          <input class="wrong-answer answer" type="radio" id="To_Save" name="why-shopify-devs" value="To_Save">
          <label for="To_Save"><?php echo $falsa3_2;  ?></label><br>
        </div>
        <div class="radio-button-wrapper">
          <input class="wrong-answer answer" type="radio" id="To_Extend" name="why-shopify-devs" value="To_Extend">
          <label for="To_Extend"><?php echo $falsa1_2;  ?></label><br>
        </div>
        <div class="radio-button-wrapper">
          <input class="wrong-answer answer" type="radio" id="To_Provide" name="why-shopify-devs" value="To_Provide">
          <label for="To_Provide"><?php echo $falsa2_2;  ?></label><br>
        </div>
        <div class="radio-button-wrapper">
          <input class="correct-answer answer" type="radio" id="All_Above" name="why-shopify-devs" value="All_Above">
          <label for="All_Above"><?php echo $respuesta2;  ?></label><br>
        </div>
      </form>
    </section>

    <section id="Question-Three" class="question hidden">
      <?php
      $sql3 = "SELECT pregunta,respuesta,falsa1,falsa2,falsa3 FROM problema where id=$numeroAleatorio3";
      $resultado3 = mysqli_query($conexion, $sql3);
      
      $fila3 = mysqli_fetch_assoc($resultado3);

      $pregunta3 = $fila3['pregunta'];
      $respuesta3 = $fila3['respuesta'];
      $falsa1_3 = $fila3['falsa1'];
      $falsa2_3 = $fila3['falsa2'];
      $falsa3_3 = $fila3['falsa3'];

      ?>
      <h3>preguntas 3 de 3</h3>
      <form action="">
        <h4><?php echo $pregunta3;  ?></h4>
        <div class="radio-button-wrapper">
          <input class="wrong-answer answer" type="radio" id="Paid_Well" name="true-shopify-devs" value="Paid_Well">
          <label for="Paid_Well"><?php echo $falsa1_3;  ?></label><br>
        </div>
        <div class="radio-button-wrapper">
          <input class="wrong-answer answer" type="radio" id="High_Demand" name="true-shopify-devs" value="High_Demand">
          <label for="High_Demand"><?php echo $falsa2_3;  ?></label><br>
        </div>
        <div class="radio-button-wrapper">
          <input class="wrong-answer answer" type="radio" id="Need_Know" name="true-shopify-devs" value="Need_Know">
          <label for="Need_Know"><?php echo $falsa3_3;  ?></label><br>
        </div>
        <div class="radio-button-wrapper">
          <input class="correct-answer answer" type="radio" id="All_Above_2" name="true-shopify-devs" value="All_Above_2">
          <label for="All_Above_2"><?php echo $respuesta3;  ?></label><br>
        </div>
      </form>
    </section>

    <section id="You-Won" class="winner-panel hidden">
      <h3 id="Menu-h3">¡Felicidades!</h3>
      <p>¡Has alcanzado la excelencia!</p>
      <!-- SMALL PUPPY IMAGES FOR SMALLER SCREEN SIZES -->
      <img id="Shih-Tzu-Small" class="hidden puppies-small-img" src="gasnate.pgn.jpg" alt="Three Shih-Tzu puppies sitting cuddled together on a wooden board in a rustic house with a blue ball.">
      <img id="Labradoodle-Small" class="hidden puppies-small-img" src="img/sst.jpg" alt="Eleven blonde Labradoodle puppies are standing side-by-side in the bed of an old Chevrolet Truck, their front paws resting on the tailgate.">
      <img id="Plott-Hound-Small" class="hidden puppies-small-img" src="img/sst.jpg" alt="On a lawn are three Plott Hound puppies sitting in a whisker basket, their heads resting over the edge of the basket.">
      <img id="Siberian-Husky-Small" class="hidden puppies-small-img" src="img/sst.jpg" alt="Two Siberian Husky puppies are sitting outside against a stone-plaster brick wall; they have their mouths open and their eyes bright with excitement as they playfully bite at each other.">
      <!-- MEDIUM PUPPY IMAGES FOR MEDIUM SCREEN SIZES -->
      <img id="Shih-Tzu-Medium" class="hidden puppies-medium-img" src="img/sst.jpg" alt="Three Shih-Tzu puppies sitting cuddled together on a wooden board in a rustic house with a blue ball.">
      <img id="Labradoodle-Medium" class="hidden puppies-medium-img" src="img/sst.jpg" alt="Eleven blonde Labradoodle puppies are standing side-by-side in the bed of an old Chevrolet Truck, their front paws resting on the tailgate.">
      <img id="Plott-Hound-Medium" class="hidden puppies-medium-img" src="img/sst.jpg" alt="On a lawn are three Plott Hound puppies sitting in a whisker basket, their heads resting over the edge of the basket.">
      <img id="Siberian-Husky-Medium" class="hidden puppies-medium-img" src="img/sst.jpg" alt="Two Siberian Husky puppies are sitting outside against a stone-plaster brick wall; they have their mouths open and their eyes bright with excitement as they playfully bite at each other.">
      <p class="small-paragraph">(Por favor, juegue de nuevo para la oportunidad de aumentar su dosis diaria de serotonina.)</p>
    </section>
  </article>
</main>

<footer>
  <div id="Start-Button-Wrap" class="footer-content-wrap hidden active-panel">
    <input id="Start-Button" type="submit" value="comenzar" name="Start">
    <br>
    <input id="Start-Button" type="button" value="Crear Pregunta" style="width:200px;" onclick="redirectToQuizPage();">
    <script>
function redirectToQuizPage() {
    window.location.href = "subirQuiz/subirquiz.php";
}
</script>
  </div>

  <div id="Retry-Button-Wrap" class="footer-content-wrap hidden">
    <input id="Retry-Button" type="submit" value="Reintentar" name="Main-Menu">
    <input id="Quit-Button" type="submit" value="Salir" name="Quit-Button">
  </div>

  <div id="Quiz-Button-Wrap" class="footer-content-wrap hidden">
    <input id="Next-Button" type="submit" value="Siguiente ❯" name="Next">
    <div class="container-timer">
      <p id="Timer-Title">tiempo:</p>
      <p id="timer">
        <span id="timer-mins">02</span>
        <span id="timer-colon"> : </span>
        <span id="timer-secs">00</span>
      </p>
    </div>
  </div>

  <!-- FOR DEBUGGING -->
  <!-- <div id="Add-All-Button-Wrap" class="footer-content-wrap hidden active-panel">
            <input id="Add-All-Button" type="submit" value="Add All" name="Add-All">
        </div> -->

</footer>
<!-- partial -->
  <script  src="./script.js"></script>
<!-- script que deja la respuesta en una posicion aleatoia-->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const radioButtonsContainer = document.getElementById("radio-button-container");
    const radioButtons = Array.from(radioButtonsContainer.getElementsByClassName("answer"));

    // Reorganizar las opciones aleatoriamente
    shuffle(radioButtons);

    // Agregar las opciones reorganizadas nuevamente al contenedor
    radioButtons.forEach(radioButton => {
      radioButtonsContainer.appendChild(radioButton.parentElement);
    });

    // Función para reorganizar un array en orden aleatorio (algoritmo de Fisher-Yates)
    function shuffle(array) {
      for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
    }
  });
</script>

</body>
</html>
