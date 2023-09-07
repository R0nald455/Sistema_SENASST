<?php
    
        // Verificar si se ha hecho clic en el botón "Enviar"
        if (isset($_POST["submit"])) {
            // Obtener los datos del formulario
            $diregional = $_POST["diregional"];
            $desregional = $_POST["desregional"];
            $dirsede = $_POST["dirsede"];
            $ciudad = $_POST["ciudad"];
            $lugariden = $_POST["lugariden"];
            $fecha = $_POST["fecha"];
            $nomreporta = $_POST["nomreporta"];
            $cargo = $_POST["cargo"];
            $actinseguro = $_POST["actinseguro"];
            $desituacion = $_POST["desituacion"];
            $imagen = $_POST["imagen"];
            // (Agrega aquí los campos restantes del formulario)
            echo $ciudad;
            // Conectar a la base de datos (Asegúrate de cambiar los datos de conexión)
            include ('../../db/conexion.php');

            if ($conexion->connect_error) {
                die("Error al conectar a la base de datos: " . $conn->connect_error);
            }

            // Preparar la consulta SQL para insertar los datos en la base de datos
            $sql = "INSERT INTO `tobservacion`(`regional`, `centro`, `direccion`, `ciudad`, `lugar`, `fecha`, `reporta`, `cargo`, `tipo`, `descripcion`, `imagen`) 
                    VALUES ('$diregional', '$desregional', '$dirsede', '$ciudad', '$lugariden', '$fecha', '$nomreporta', '$cargo', '$actinseguro', '$desituacion', '$imagen ')";

            if ($conexion->query($sql) === TRUE) {
                header("Location: ../index.php");
            } else {
                header("Location: ../index.php");
            }
            $conexion->close();
        }
    
    ?>