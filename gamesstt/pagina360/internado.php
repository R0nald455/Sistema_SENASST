<?php
session_start();
if (empty($_SESSION["idSe"])){
    header("location: ../index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
<script src="https://cdn.rawgit.com/donmccurdy/aframe-extras/v6.1.0/dist/aframe-extras.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="./css/tamaño.css">
</head>
<body onload="inicioPagina()">

    <audio id="backgroundMusic" autoplay loop>
        <source src="./audio/musicaFondo.mp3" type="audio/mpeg">
    </audio>

    <audio id="correct" hidden>
        <source src="./audio/correct.mp3" type="audio/mpeg">
    </audio>

    <audio id="error" hidden>
        <source src="./audio/error.mp3" type="audio/mpeg">
    </audio>


  <a-scene  vr-mode-ui="enabled: false">

      <a-assets>
          <img  src="./img-elementos/transparente.png" id="elemento1">
          <img  src="./img-elementos/transparenteColor.png" id="elemento2">
      </a-assets>


    <!-- Imagen 360 grados -->
    <a-sky src="./img/internado.jpg"></a-sky>

    <a-image onclick="clickSituacion(0)" id="elemento1" src="#elemento1" position="-2.4 5.2 -11" scale="2"></a-image>
    <a-image onclick="clickSituacion(1)" id="elemento2" src="#elemento1" position="2 4.7 20" scale="1"></a-image>
    <a-image onclick="clickSituacion(2)" id="elemento1" src="#elemento1" rotation="0 120 0" position="-30 6.2 -3.5" scale="3"></a-image>
    <a-image onclick="clickSituacion(3)" id="elemento1" src="#elemento1" position="15 3.5 -11.8" scale="1" rotation="0 120 0"></a-image>
    <a-image onclick="clickSituacion(4)" id="elemento1" src="#elemento1" position="15 2 -23" scale="1.5" rotation="0 120 0"></a-image>
    <a-image onclick="clickSituacion(5)" id="elemento1" src="#elemento1" position="15 3.5 -6" scale="1.7 1.3" rotation="0 120 0"></a-image>
    <a-image onclick="clickSituacion(6)" id="elemento1" src="#elemento1" position="15 1 -6.2" scale="1.8 3" rotation="0 120 0"></a-image>
    <a-image onclick="clickSituacion(7)" id="elemento1" src="#elemento1" position="15 -2.3 -3.2" scale="2.3 4.5" rotation="0 120 0"></a-image>
    <a-image onclick="clickSituacion(8)" id="elemento1" src="#elemento1" position="15 1.9 -3.2" scale="1.3 1.5" rotation="0 120 0"></a-image>
    <a-image onclick="clickSituacion(9)" id="elemento1" src="#elemento1" position="15 -2.3 6" scale="2.3 3.8" rotation="0 120 0"></a-image>
    <a-image onclick="clickSituacion(10)" id="elemento1" src="#elemento1" position="15 -10 -3.5" scale="3 2.5" rotation="90 0 0"></a-image>
 

    <!-- Cámara con controles de movimiento -->
    <a-camera camera look-controls>
        <a-entity cursor="fuse: true; fuseTimeout: 100" position="0 0 -1" 
            geometry="primitive: ring; radiusInner: 0.02; radiusOuter: 0.03" color="black" material="shader: flat;"></a-entity>
    </a-camera>

</a-scene>

<script src="./js/js-logicas/logicaInternn.js"></script>
<script src="./js/js-inicio/inicioIntern.js"></script>

</body>
</html>