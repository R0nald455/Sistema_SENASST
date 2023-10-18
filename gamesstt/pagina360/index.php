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
</head>
<body>

  <a-scene vr-mode-ui="enabled: false">
    <!-- Entorno -->
    <a-assets>
      <img  src="./img-elementos/maderaGris.jpg" id="ladrillos">
      <img  src="./img-elementos/ParedOscura.jpg" id="pared">
    </a-assets>

    <a-sky src="./img/entredaSena.jpg"></a-sky>
    
    <!-- Terreno -->
    <a-plane position="2.5 -3 0" src="./img-elementos/maderaRoble.jpg" rotation="-90 0 0" width="35" height="30" color="#AAA"></a-plane>

    <!-- <a-text value="LearnGamingSST" position="-6 2 -10" scale="16 16 16" color="green" font="kelsonsans"></a-text> -->

    <a-box position="2.5 -1.5 -15" borde="1" width="35" depth="0.12" height="3" depth="0.1" material="color: black; opacity: 0.5; transparent: true;"></a-box>

    <!--Vidrio balcón lado izquierdo-->
    <a-box position="-15 -1.5 -12" width="6" height="3" depth="0.1" rotation="0 90 0" material="color: black; opacity: 0.5; transparent: true;"></a-box>

    <!-- Varandilla -->
    <a-cylinder position="-14.7 3.5 -14.7" width="0.2" height="13" depth="0.1" radius="0.3"  material="color: #484648;"></a-cylinder>


    <!--Vidrio balcón lado derecho-->
    <a-box position="20 -1.5 -12" width="6" height="3" depth="0.1" rotation="0 90 0" material="color: black; opacity: 0.5; transparent: true;"></a-box>

    <!-- Varandilla derecha -->
    <a-cylinder position="19.7 3.5 -14.7" width="0.2" height="13" depth="0.1" radius="0.3"  material="color: #484648;"></a-cylinder>
    

    <!--Pared lado izquierdo-->
    <a-box position="-15 3 3" width="24" height="12" depth="0.3" rotation="0 90 0" src="#pared" repeat="4"></a-box>

    <!-- Imagen del lado izquierdo -->
    <a-box position="-14.8 3 8" width="5" height="3" depth="0.3" rotation="0 90 0" src="./img/internado.jpg" shootable ></a-box>

    <!-- Texto del escenario del internado -->
    <a-text value="Internado 360" position="-14.8 5 10.2" rotation="0 90 0" scale="3 3 3" color="green" font="kelsonsans"></a-text>


    <!-- Texto del lado izquierdo -->
    <a-text value="Escenarios 360°" position="-14.8 8 8" rotation="0 90 0" scale="7 7 7" color="green" font="kelsonsans"></a-text>

    <!--PARED DERECHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
    <!--Pared lado derecho-->
    <a-box position="20 3 3" width="24" height="12" depth="0.3" rotation="0 90 0" src="#pared" repeat="4"></a-box>

    <a-box position="19.7 3 3" width="18" height="9" depth="0.3" rotation="0 90 0" src="#pared" repeat="4"></a-box>

    
    <!-- vidrio parte de atrás de la vista inicial 1 parte derecha. -->
    <a-box position="-12.6 3 15" borde="1" width="5" depth="0.12" height="12" depth="0.1" material="color: black; opacity: 0.5; transparent: true;"></a-box>

    <!-- parte de atrás de la vista inicial derecha -->
    <a-box position="-7.6 3 14.5" borde="1" width="5" depth="1" height="12" depth="0.1" src="#pared"></a-box>

    <!-- vidrio parte de atrás de la vista inicial 2 parte-->
    <a-box position="-2.6 3 15" borde="1" width="5" depth="0.12" height="12" depth="0.1" material="color: black; opacity: 0.5; transparent: true;"></a-box> 

    <!-- parte de atrás de la vista inicial derecha siguiente parte -->
    <a-box position="2.4 3 14.5" borde="1" width="5" depth="1" height="12" depth="0.1" src="#pared"></a-box>

    <!-- vidrio parte de atrás de la vista inicial 3ra parte-->
    <a-box position="7.4 3 15" borde="1" width="5" depth="0.12" height="12" depth="0.1" material="color: black; opacity: 0.5; transparent: true;"></a-box> 

    <!-- parte de atrás de la vista inicial derecha siguiente parte -->
    <a-box position="12.4 3 14.5" borde="1" width="5.1" depth="1" height="12" depth="0.1" src="#pared"></a-box>


    <!-- vidrio parte de atrás de la vista inicial 3ra parte-->
    <a-box position="17.4 3 15" borde="1" width="5" depth="0.12" height="12" depth="0.1" material="color: black; opacity: 0.5; transparent: true;"></a-box> 


    <!-- Arriba techo -->
    <a-box position="2 9.2 0" width="40"  depth="35" height="0.5" repeat="2" src="./img-elementos/maderaGris.jpg"></a-box>

 
    <!-- <a-box position="-1 2 -14.9" depth="0.2" src="./img-elementos/textureLadrillos.jpg" repeat="1 1" normal-scale="1 1" height="10px" width="20px"
           cursor-listener 
           event-set__mouseenter="_event: mouseenter; color: red"
           event-set__mouseleave="_event: mouseleave; color: blue">
    </a-box> -->



    <!-- Cámara para ver la escena -->
    <a-camera look-controls position="0 1.6 0">
        
      <a-entity cursor="fuse: true; fuseTimeout: 100" position="0 0 -1" 
            geometry="primitive: ring; radiusInner: 0.02; radiusOuter: 0.03" color="black" material="shader: flat;"></a-entity>
            
    </a-camera>
  </a-scene>


<script src="./js/js-logicas/logicaIndex.js"></script>

</body>
</html>