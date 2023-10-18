<!DOCTYPE html>
<html>
<head>
<script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
<script src="https://cdn.rawgit.com/donmccurdy/aframe-extras/v6.1.0/dist/aframe-extras.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="./css/tamaño.css">
</head>
<body onload="inicioPagina()">

  <a-scene>

      <a-assets>
          <img  src="./img-elementos/transparente.png" id="elemento1">
          <img  src="./img-elementos/transparenteColor.png" id="elemento2">
      </a-assets>


    <!-- Imagen 360 grados -->
    <a-sky src="./img/sena.jpg"></a-sky>

    <a-image onclick="clickSituacion(0)" id="elemento1" src="#elemento1" position="-6 4.2 -11" scale="1"></a-image>
    <a-image onclick="clickSituacion(1)" id="elemento2" src="#elemento1" position="1.3 0 20" scale="1"></a-image>


    <!-- Cámara con controles de movimiento -->
    <a-camera wasd-controls position="0 1.6 0">
        
        <a-entity cursor="fuse: true; fuseTimeout: 100" position="0 0 -1" 
            geometry="primitive: ring; radiusInner: 0.02; radiusOuter: 0.03" color="black" material="shader: flat;"></a-entity>
    </a-camera>

</a-scene>

<script src="./js/logicas.js"></script>
<script src="./js/inicioIndexs.js"></script>

</body>
</html>