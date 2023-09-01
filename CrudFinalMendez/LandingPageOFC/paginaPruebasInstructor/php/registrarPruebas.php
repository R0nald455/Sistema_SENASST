<?php
require 'conex/conexion.php';
if (isset($_POST['btnRegistrar']) ){
    if (strlen($_POST['inPrueba']) >= 1 && strlen($_POST['inFecha']) >= 1 && strlen($_POST['inTema']) >= 1 && strlen($_POST['inPreguntas']) >= 1 && strlen($_POST['seComplejidad']) >= 1 && strlen($_POST['seDificultad']) >= 1 && strlen($_POST['inTiempo']) >= 1 && strlen($_POST['inPuntos']) >= 1 && strlen($_POST['btnRegistrar']) >= 1 ){

        $prueba = $_POST['inPrueba'];
        $fecha = $_POST['inFecha'];
        $tema = $_POST['inTema'];
        $preguntas = $_POST['inPreguntas'];
        $complejidad = $_POST['seComplejidad'];
        $dificultad = $_POST['seDificultad'];
        $tiempo = $_POST['inTiempo'];
        $puntos = $_POST['inPuntos'];

        $sentencia = "INSERT INTO pruebas (PruNumero,PruTema,PruComplejidad,PruDificultad,PruTiempo,PruPuntos,PruFecha,PruNumPreguntas) VALUES ('$prueba','$tema','$complejidad','$dificultad','$tiempo','$puntos','$fecha','$preguntas')";
        $query = mysqli_query($con, $sentencia);
        $registro = null;


        if(!$query){
            $registro = 2;
        } else {
            $registro = 1;
        }

        if($registro == 1){
            ?><script>
                alert("Prueba registrada exitosamente.");
                location.reload();
            </script><?php
        }

    }
}


?>