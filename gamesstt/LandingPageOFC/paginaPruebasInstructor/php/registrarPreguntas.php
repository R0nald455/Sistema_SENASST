<?php

    if (isset($_POST['btnPreguntas'])){
        
        if (strlen($_POST['sePruebasOpcion']) >= 1 && strlen($_POST['sePreguntasTrae']) >= 1 && strlen($_POST['inPreguntaEnun']) >= 1 && strlen($_POST['select-complejidad']) >= 1 && strlen($_POST['select-dificultad']) >= 1 && strlen($_POST['inTiempoP']) >= 1 && strlen($_POST['inPuntosP']) >= 1 && strlen($_POST['inA']) >= 1 && strlen($_POST['inB']) >= 1 && strlen($_POST['inC']) >= 1 && strlen($_POST['inD']) >= 1 && strlen($_POST['inPuntosA']) >= 1 && strlen($_POST['inPuntosB']) >= 1 && strlen($_POST['inPuntosC']) >= 1 && strlen($_POST['inPuntosD']) >= 1){


            $sePruebas = $_POST['sePruebasOpcion'];
            $sePreguntas = $_POST['sePreguntasTrae'];
            $preguntaEnun = $_POST['inPreguntaEnun'];

            //Guarda la imagen
            $image = $_FILES['inArchivo']['tmp_name'];
            $archivo = addslashes(file_get_contents($image));

            $seComplejidad = $_POST['select-complejidad'];
            $seDificultad = $_POST['select-dificultad'];
            $tiempos = $_POST['inTiempoP'];
            $puntoss = $_POST['inPuntosP'];
            $inputA = $_POST['inA'];
            $inputB = $_POST['inB'];
            $inputC = $_POST['inC'];
            $inputD = $_POST['inD'];
            $keyA = $_POST['inKeyA'];
            $keyB = $_POST['inKeyB'];
            $keyC = $_POST['inKeyC'];
            $keyD = $_POST['inKeyD'];
            $puntosA = $_POST['inPuntosA'];
            $puntosB = $_POST['inPuntosB'];
            $puntosC = $_POST['inPuntosC'];
            $puntosD = $_POST['inPuntosD'];


            
            $sentenciat = "INSERT INTO preguntas (PreNumPrueba,PreNumPregunta,PreArchivo,PrePreguntaEnun,PreComplejidad,PreDificultad,PreTiempo,PrePuntos,PreA,PreB,PreC,PreD,PreKeyA,PreKeyB,PreKeyC,PreKeyD,PrePuntoA,PrePuntoB,PrePuntoC,PrePuntoD) VALUES ('$sePruebas','$sePreguntas','$archivo','$preguntaEnun','$seComplejidad','$seDificultad','$tiempos','$puntoss','$inputA','$inputB','$inputC','$inputD','$keyA','$keyB','$keyC','$keyD','$puntosA','$puntosB','$puntosC','$puntosD')";
            $queryy = mysqli_query($con, $sentenciat);


            // $sentencias = $con->prepare("INSERT INTO preguntas (PreNumPrueba,PreNumPregunta,PreArchivo,PrePreguntaEnun,PreComplejidad,PreDificultad,PreTiempo,PrePuntos,PreA,PreB,PreC,PreD,PreKeyA,PreKeyB,PreKeyC,PreKeyD,PrePuntoA,PrePuntoB,PrePuntoC,PrePuntoD) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
            // $result = $sentencias->execute([$sePruebas,$sePreguntas,$archivo,$preguntaEnun,$seComplejidad,$seDificultad,$tiempo,$puntos,$inputA,$inputB,$inputC,$inputD,$keyA,$keyB,$keyC,$keyD,$puntosA,$puntosB,$puntosC,$puntosD]);


            if($queryy){
                ?><script>
                    alert("Se registro correctamente la pregunta");
                    console.log("registro good");
                </script><?php
            } else {
                ?><script>
                    alert("¡Algo fallo...!");
                    console.log("fuck");
                </script><?php
            }

        }
    }


?>