<?php
session_start();
if (empty($_SESSION["idInst"])){
    header("location: ../index.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/stylesdd.css">
    <link rel="stylesheet" href="styles/stylesPreguntas.css">
    <link rel="stylesheet" href="styles/stylesOpcionesPres.css">
    <link rel="stylesheet" href="styles/stylesRetros.css">
    <title>Document</title>
</head>
<body>
    <center>
        
        <!-- contenedor principal de todo el contenido -->
    <div class="principal">

        <a href="../PaguinaSimulador/indexInstructor.php"><div class="enviar-atras"></div></a>

        <fieldset class="fieldset-prueba">
            <legend>Registro de pruebas</legend>
            
            <!-- formulario del registro de pruebas -->
            <form  method="POST" class="cont-pruebas">
                
                <p id="pPrueba">Prueba N°:</p>
                    <input id="inputPrueba" type="number" min="0" name="inPrueba">
                
                <p id="pFecha">Fecha:</p>
                    <input id="inputFecha" type="date" name="inFecha">
                
                <p id="pTema">Tema:</p>
                    <input id="inputTema" type="text" name="inTema">
                
                <P id="pPreguntas">Preguntas:</P>
                    <input id="inputPreguntas" type="number" min="0" name="inPreguntas">
                
                <p id="pComplejidad">Complejidad:</p>
                    <select id="selectComplejidad" name="seComplejidad">
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                
                <p id="pDificultad">Dificultad:</p>
                    <select id="selectDificultad" name="seDificultad">
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                
                <p id="pTiempo">Tiempo:</p>
                    <input id="inputTiempo" type="number" name="inTiempo">
                
                <p id="pPuntos">Puntos:</p>
                    <input id="inputPuntos" type="number" min="0" name="inPuntos">

                    <input id="btn-prueba" type="submit" value="Registrar" name="btnRegistrar">

            </form>
        </fieldset>

        <!-- Un select con la instrucción en la base de datos. -->
        
        <fieldset class="fieldset-preguntas">
            <legend>Registro de preguntas</legend>
                <form method="POST" class="form-Preguntas" enctype="multipart/form-data">
                    
                    <p id="pre-pNumero">Prueba #:</p>

                    <!-- Lógica traida de la base de datos para ver las pruebas disponibles. -->

                    <select id="selectPrueba" name="sePruebasOpcion" onchange="guardarValorSeleccionado()" required>
                        <option disabled selected>0</option>
                        <?php
                            include_once "../../conexion/conexion.php";
                            $sql="SELECT * FROM pruebas";
                            $query=mysqli_query($con,$sql);
                        ?>

                        <?php foreach ($query as $opciones): ?>
                            
                            <option value="<?php echo $opciones['PruNumero']?>"> <?php echo $opciones['PruNumero']?> </option>
                        
                        <?php endforeach ?>

                    </select>

                            <input style="position: absolute;" onclick="traerDatos()" class="btnBuscar" type="submit" value="buscar" name="btnBuscar" >

                    <p id="pre-prueba">Pregunta #:</p>

                    <select id="selectPregunta" name="sePreguntasTrae" required>
                        <option disabled selected>0</option>

                        <?php
                            include_once "../../conexion/conexion.php";
    
                                if(isset($_POST['btnBuscar'])){
                                    if(strlen($_POST['sePruebasOpcion']) >=1){
    
                                        $opcionesst = trim($_POST['sePruebasOpcion']);


                                $sqlPregu="SELECT PruNumPreguntas as total FROM pruebas WHERE PruNumero = '$opcionesst'";
                                $querys=mysqli_query($con, $sqlPregu);
                                $filaResultado = mysqli_fetch_assoc($querys);
                            
                        ?>

                        <?php for ($i = 1; $i <= $filaResultado['total']; $i++) { ?>
                            
                            <option value="<?php echo $i?>"> <?php echo $i;?> </option>

                        <?php } 
                            }
                        }
                        ?>

                    </select>

                    <p id="pre-oEnunciado">Opciones de enunciado:</p>

                    <!-- Lógica para traer las pruebas de la base de datos existentes. -->

                    <select id="selectOpcionEnun" name="selectOpcionEnun" onclick="mostrarOpcion()">
                        <option value="valueOpcion" selected>Opciones</option>
                        <option id="" value="img" >Imagen</option>
                        <!-- <option id="" value="video" >Video</option>
                        <option id="" value="audio" >Audio</option> -->
                    </select>

                    <!-- Lógica para hacer que funcione el switch de las opciones. -->


                    <!-- Texto de la pregunta. -->
                    
                    <p id="pre-textPregunta">Pregunta del enunciado:</p>
                        <input type="text" id="inputPregunta" name="inPreguntaEnun">
                    
                    <!-- Mostrar el tipo del enunciado según lo elija arriba -->

                    <div style="display: none;" id="cont-archivo" class="cont-archivo">
                        
                        <p id="pre-archivo">Subir archivo:</p>
                        <input id="input-file" type="file" name="inArchivo">
                        
                    </div>

                    <p id="pre-complejidad">Complejidad:</p>
                        <select id="select-Complejidad" name="select-complejidad">
                            <option value="alta">Alta</option>
                            <option value="media">Media</option>
                            <option value="baja">Baja</option>
                        </select>
                
                    <p id="pre-dificultad">Dificultad:</p>
                        <select id="select-Dificultad" name="select-dificultad">
                            <option value="alta">Alta</option>
                            <option value="media">Media</option>
                            <option value="baja">Baja</option>
                        </select>
                    
                    <p id="pre-tiempo">Tiempo:</p>
                        <input id="input-Tiempo" type="number" name="inTiempoP">
                    
                    <p id="pre-puntos">Puntos:</p>
                        <input id="input-Puntos" type="number" min="0" name="inPuntosP">

                    <fieldset class="fieldset-opcionPre">
                        <legend>Opciones de las preguntas</legend>

                        <p id="pre-a">A</p>
                            <input id="input-a" type="text" name="inA" >

                        <p id="pre-b">B</p>
                            <input id="input-b" type="text" name="inB" >

                        <p id="pre-c">C</p>
                            <input id="input-c" type="text" name="inC" >

                        <p id="pre-d">D</p>
                            <input id="input-d" type="text" name="inD" >
                        
                        <p id="key">KEY</p>

                        <input id="key-a" type="number" min="0" name="inKeyA">
                        <input id="key-b" type="number" min="0" name="inKeyB">
                        <input id="key-c" type="number" min="0" name="inKeyC">
                        <input id="key-d" type="number" min="0" name="inKeyD">
                            
                        <p id="pre-key-puntos">PUNTOS</p>

                        <input type="number" id="puntos-a" min="0" name="inPuntosA" >
                        <input type="number" id="puntos-b" min="0" name="inPuntosB" >
                        <input type="number" id="puntos-c" min="0" name="inPuntosC" >
                        <input type="number" id="puntos-d" min="0" name="inPuntosD" >

                        <input id="btn-preguntasS" type="submit" value="Registrar preguntas" name="btnPreguntas">
                    
                    </form>
            </fieldset>
                
            <fieldset class="fieldset-retro">
                <legend>Retroalimentación de las preguntas</legend>
                    <form method="POST" class="form-PreguntasS">
                        
                        <p id="pre-pNumeroR">Prueba #:</p>

                         <!-- Lógica para traer las pruebas de la base de datos existentes. -->
                            <select id="selectPruebaR" name="sePruebasOpcionR" onchange="guardarValorSeleccionadoDos()" required>
                                <option disabled selected>0</option>
                                <?php
                                    include_once "../../conexion/conexion.php";
                                    $sql="SELECT * FROM pruebas";
                                    $query=mysqli_query($con,$sql);
                                ?>

                                <?php foreach ($query as $opciones): ?>
                                    
                                    <option value="<?php echo $opciones['PruNumero']?>"> <?php echo $opciones['PruNumero']?> </option>
                                
                                <?php endforeach ?>

                            </select>
                        
                        <p id="pre-pruebaR">Pregunta #:</p>

                        <input type="submit" value="Buscar" id="btn-buscar" name="btn-buscar">
                        <!-- Lógica para traer las pruebas de la base de datos existentes. -->

                        <select id="selectPreguntaR" name="sePreguntasTraeDos" required>
                            <option disabled selected>0</option>

                            <?php
                                include_once "../../conexion/conexion.php";
                                    if(isset($_POST['btn-buscar'])){

                                        if(strlen($_POST['sePruebasOpcionR']) >=1){
    
                                            $opcioness = trim($_POST['sePruebasOpcionR']);

                                    $sqlPregu="SELECT PreNumPregunta FROM preguntas WHERE PreNumPrueba = '$opcioness'";
                                    $querys=mysqli_query($con, $sqlPregu);
                                
                            ?>

                            <?php foreach($querys as $opcion): ?>
                                
                                <option value="<?php echo $opcion['PreNumPregunta']?>"> <?php echo $opcion['PreNumPregunta'];?> </option>

                            <?php 
                                    endforeach;
                                        
                                }
                            }
                            ?>

                        </select>

                        <p id="selectABCD">Opciones:</p>
                            <select name="selectOpcionABCD" id="selectOpcionABCD">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>

                        <p id="retro-p">Retroalimentación</p>
                            <input id="input-retro" type="text" name="inRetro">

                        <p id="referencia-p">Referencia</p>
                            <input id="input-referencia" type="text" name="inRefe">

                            <input id="btn-preguntas" type="submit" value="Registrar preguntas" name="btn-retro">
                    
                    </form>
            </fieldset>
    </div>  

</center>

<script src="logicas.js"></script>

<?php 
    require "php/registrarPreguntas.php";
    require "php/registrarPruebas.php";
    require "php/registrarRetro.php";
?>


</body>
</html>