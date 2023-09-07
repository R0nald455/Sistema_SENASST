<?php

include("../conexion/connection.php");


        $articulo = $_POST['articulo'];
        $cantidad = $_POST['cantidad'];

        // Preparar la consulta SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO inventariosalon (articulo, cantidad) VALUES('$articulo', '$cantidad')";

        if ($conexion->query($sql) === TRUE) {
            echo "Formulario enviado correctamente.";
            Header("Location: ../indexCrud.php");
        } else {
            echo "Error al enviar el formulario: " . $con->error;
        }
    

?>