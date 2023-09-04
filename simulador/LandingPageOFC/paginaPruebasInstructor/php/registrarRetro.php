<?php

if (isset($_POST['btn-retro']) ){
    if (strlen($_POST['sePruebasOpcionR']) >= 1 && strlen($_POST['sePreguntasTraeDos']) >= 1 && strlen($_POST['selectOpcionABCD']) >= 1 && strlen($_POST['inRetro']) >= 1 && strlen($_POST['inRefe']) >= 1){

        $prueba = $_POST['sePruebasOpcionR'];
        $selectTrae = $_POST['sePreguntasTraeDos'];
        $selectOpcionABCD = $_POST['selectOpcionABCD'];
        $retro = $_POST['inRetro'];
        $referencia = $_POST['inRefe'];

        $sqlTraeId = "SELECT PruID as Total FROM preguntas as pre
        INNER JOIN pruebas as pru ON pre.PreNumPrueba = pru.PruNumero
        WHERE PreNumPrueba = '$prueba' AND PreNumPregunta = '$selectTrae'";
        $queryyy = mysqli_query($con, $sqlTraeId);
        
        $sqlResult = mysqli_fetch_assoc($queryyy);

        $idMostrar = $sqlResult['Total'];

        $sentencia = "INSERT INTO retro (RetroPrueba,RetroPruebaId,RetroNumPregunta,RetroRetroali,RetroReferencia,RetroOpcionPregABCD) VALUES ('$prueba','$idMostrar','$selectTrae','$retro','$referencia', '$selectOpcionABCD')";

        $query = mysqli_query($con, $sentencia);

        if($query){
            ?><script>
                alert("Retroalimentación registrada exitosamente.");
            </script><?php
            exit;
        } else {
            ?><script>
                alert("Error...");
        </script><?php
        }
    }
}


?>