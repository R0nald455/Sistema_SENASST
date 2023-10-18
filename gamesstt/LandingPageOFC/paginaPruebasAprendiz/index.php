<?php 
    include ("../../conexion/conexion.php");
    session_start();
    if (empty($_SESSION["idSe"])){
        header("location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/sistemas.css">

    <title>Preguntas-Sistemas</title>
    
</head>

<body onload="inicioPagina()"> 

<?php

if (!empty($_SESSION['envia_numPrueba'])) {
    $inputValue = $_SESSION['envia_numPrueba'];
    $pruebaTrae = $_SESSION['envia_aleatorio'];

    $numero_aleatorio = array_shift($pruebaTrae);

    // echo"este número se elimina".$numero_aleatorio;
    $aleatorio = $numero_aleatorio;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['continuar'])) {
        if (!empty($_SESSION['envia_numPrueba'])){

            $_SESSION['envia_aleatorio'] = $pruebaTrae;
            // Traer lo que queda de arriba 
            
            $numero_aleatorio = array_shift($pruebaTrae);       
            
            $aleatorio = $numero_aleatorio;
            // echo "Número aleatorio: $aleatorio<br>";
            
            usleep(500000);

            if($aleatorio<=0){
                ?>
                    <script>
                        Swal.fire({
                            title: `<h2 style="color: white;">Ya no se encuentran más preguntas asignadas </h2>`,
                            html: '<h2 style="color: white;">Felicidades, has terminado correctamente la prueba.</h2><br><h2 style="color: white;">Para conocer tu resultado puedes precionar el botón </h2>',
                            background: '#00000053',
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ver resultados',
                            BackDrop: true,
                            allowEscapeKey : false,
                            allowOutsideClick: false,
                            allowSideClick: false,
                            allowEnterKey: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "../PaguinaSimulador";
                            }
                        })
                    </script>
                <?php
            } 
        } 
    } 

    $sql = "SELECT * FROM preguntas WHERE PreNumPregunta = '$aleatorio'";

    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $blobData = $row['PreArchivo'];

        ?>
            <center>
                <form class="container" method="POST">
                    <div id="previ-imagePreg">
                        
                        <input id="icono-image-salir" type="submit" value="" name="confirmar-salir">
                        
                        <input id="icono-image-continuar" type="submit" value="" name="continuar">

                        

                        <div class="traeBlob">
                            <?php
                                echo '<img width="100%" height="100%"src="data:image/png;base64,'. base64_encode($blobData) . '" alt="Imagen">';
                            ?>
                        </div>

                            <div class="cont-pregEnun">
                                <h1 id="titulo-pregEnun">Pregunta del ununciado.</h1>
                                <h1 id="pregunta-enunciado"><?php echo $row['PrePreguntaEnun']?></h1>
                            </div>

                            <label class="checkbox-container">
                                <input id="checkmarkA" type="radio" value="A" name="grupo-inputR">
                                <input id="checkmarkB" type="radio" value="B" name="grupo-inputR">
                                <input id="checkmarkC" type="radio" value="C" name="grupo-inputR">
                                <input id="checkmarkD" type="radio" value="D" name="grupo-inputR">
                            </label>

                            <h1 id="preA">A) <?php echo $row['PreA'];?></h1>
                            <h1 id="preB">B) <?php echo $row['PreB'];?></h1>
                            <h1 id="preC">C) <?php echo $row['PreC'];?></h1>
                            <h1 id="preD">D) <?php echo $row['PreD'];?></h1>


                            <input type="submit" id="btn-contestar" name="contestar" value="Contestar">

                    </div>
                </form>
            </center>
        <?php


    }else{
        ?>
            <script>
                console.log("Esta prueba no tiene preguntas");
            </script>
        <?php
    }



} else {
    echo "No trajo ninguna variable por session";
}

?>



<?php
    if(isset($_POST['confirmar-salir'])){
        ?>
            <script>
                Swal.fire({
                    title: `<h2 style="color: white;">¿Estás seguro que quieres salir?</h2>`,
                    html: '<h2 style="color: white;"> ¡Perderás el progreso! </h2>',
                    background: '#00000053',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, quiero salir',
                    cancelButtonText: 'Cancelar',
                    BackDrop: true,
                    allowEscapeKey : false,
                    allowOutsideClick: false,
                    allowSideClick: false,
                    allowEnterKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../PaguinaSimulador";
                    }
                })
            </script>
        <?php
        exit;
    }

?>



<?php

    if(isset($_POST['contestar'])){
        if(!isset($_POST['grupo-inputR'])){
            ?>
                <script>
                    alert("Debes seleccionar una opción.");
                </script>
            <?php
            exit;
        } else {
            
            ?>
                <script>
                    document.getElementById("btn-contestar").style.display = "none";
                </script>
            <?php

            $inputRadioValue= $_POST['grupo-inputR'];

            $sql = "SELECT RetroRetroali FROM retro WHERE RetroPruebaId = $inputValue AND RetroOpcionPregABCD = '$inputRadioValue' AND RetroNumPregunta = '$aleatorio'";
            $sqlPreguntas = "SELECT * FROM preguntas WHERE PreNumPregunta = $aleatorio";

            $resultPreg = $con->query($sqlPreguntas);
            $rowPreg = $resultPreg->fetch_assoc();

            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            // PUNTAJE VARIABLES
            $puntajeA = $rowPreg['PrePuntoA'];
            $puntajeB = $rowPreg['PrePuntoB'];
            $puntajeC = $rowPreg['PrePuntoC'];
            $puntajeD = $rowPreg['PrePuntoD'];

            // VARIABLES DE LA PREGUNTA CORRECTA
            $keyA = $rowPreg['PreKeyA'];
            $keyB = $rowPreg['PreKeyB'];
            $keyC = $rowPreg['PreKeyC'];
            $keyD = $rowPreg['PreKeyD'];

            // VARIABLES DE LA PREGUNTA CORRECTA
            $keyA = $rowPreg['PreKeyA'];
            $keyB = $rowPreg['PreKeyB'];
            $keyC = $rowPreg['PreKeyC'];
            $keyD = $rowPreg['PreKeyD'];

            $sumaA = $rowPreg['PrePuntoA'];
            $sumaB = $rowPreg['PrePuntoB'];
            $sumaC = $rowPreg['PrePuntoC'];
            $sumaD = $rowPreg['PrePuntoD'];

            $_SESSION['resultadoPreg'] = null;

            if($row>0){
                if($inputRadioValue === "A"){

                    if($keyA>0){
                        ?>
                            <div class="cont-retroAli">
                                <h1><?php echo $keyA;?></h1>
                            </div>
                        <?php
                    }


                    $_SESSION['resultadoPreg'] += $sumaA;


                    ?>
                        <div class="cont-retroAli">
                            <h1><?php echo $row['RetroRetroali'];?></h1>
                        </div>
                    <?php
                    
                    exit;

                } else if ($inputRadioValue === "B"){
                    if($keyB>0){
                        ?>
                            <div class="cont-retroAli">
                                <h1><?php echo $keyB;?></h1>
                            </div>
                        <?php
                    } 

                    $_SESSION['resultadoPreg'] += $sumaB;
                    

                    ?>
                        <div class="cont-retroAli">
                            <h1><?php echo $row['RetroRetroali'];?></h1>
                        </div>
                    <?php

                    exit;

                } else if ($inputRadioValue === "C"){

                    if($keyC>0){
                        ?>
                            <div class="cont-retroAli">
                                <h1><?php echo $keyC;?></h1>
                            </div>
                        <?php
                    } 

                    $_SESSION['resultadoPreg'] += $sumaC;

                    ?>
                        <div class="cont-retroAli">
                            <h1><?php echo $row['RetroRetroali'];?></h1>
                        </div>
                    <?php
                    
                    exit;

                } else if ($inputRadioValue === "D"){

                    if($keyD>0){
                        ?>
                            <div class="cont-retroAli">
                                <h1><?php echo $keyD;?></h1>
                            </div>
                        <?php
                    }

                    $_SESSION['resultadoPreg'] += $sumaD;

                    ?>
                        <div class="cont-retroAli">
                            <h1><?php echo $row['RetroRetroali'];?></h1>
                        </div>
                    <?php
                    
                    exit;

                } else {
                    echo "No se encuentran resultados";
                    exit;
                }

            }

        }
        
    }

?>




</body>
</html>