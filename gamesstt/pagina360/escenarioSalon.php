<html>
  <head>
    <script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body onload="inicioPagina()">
  <!--  -->

    <a-scene>

        <a-assets>
        <!-- Carga tu imagen en los activos -->
            <img src="./img/extintor-de-incendios.png" id="extintor">
            <img src="./img/Aviso-Senal-RutaEvacuacionDerecha-TripSign.png" id="rutaEva">
        </a-assets>


        <a-sky src="./img/Salon.jpg"></a-sky>

            <a-image shootable src="#extintor" position="15 1 -10" scale="1"></a-image>

            <a-image shootable src="#rutaEva" position="-4 1 -10" scale="1"></a-image>

        <a-entity camera look-controls>
            <a-text value="Encuentra los elementos" color="white" position="0 -0.1 -1" width="1" align="center"></a-text>
            
            <a-entity cursor="fuse: true; fuseTimeout: 100" position="0 0 -1" 
                geometry="primitive: ring; radiusInner: 0.02; radiusOuter: 0.03" material="shader: flat;"></a-entity>
        </a-entity>

    </a-scene>

  <script src="js/inicioSalonn.js"></script>
  <script src="js/logica.js"></script>


  </body>
</html>