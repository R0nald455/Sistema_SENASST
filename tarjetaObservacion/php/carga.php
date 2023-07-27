<?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Verificar si se ha hecho clic en el botón "Enviar"
                if (isset($_POST["Enviar"])) {
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
                    $coninsegura = $_POST["coninsegura"];
                    $inctrabajo = $_POST["inctrabajo"];
                    $incambiental = $_POST["incambiental"];
                    $desituacion = $_POST["desituacion"];
                    $imagen = $_POST["imagen"];
                    // (Agrega aquí los campos restantes del formulario)

                    // Conectar a la base de datos (Asegúrate de cambiar los datos de conexión)
                    $host = "localhost";
                    $username = "";
                    $password = "";
                    $database = "tobservacion";

                    $conn = new mysqli($host, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("Error al conectar a la base de datos: " . $conn->connect_error);
                    }

                    // Preparar la consulta SQL para insertar los datos en la base de datos
                    $sql = "INSERT INTO `tobservacion`(`diregional`, `desregional`, `dirsede`, `ciudad`, `lugariden`, `fecha`, `nomreporta`, `cargo`, `actinseguro`, `coninsegura`, `inctrabajo`, `incambiental`, `desituacion`, `imagen`) 
                            VALUES ('$diregional', '$desregional', '$dirsede', '$ciudad', '$lugariden', '$fecha', '$nomreporta', '$cargo', '$actinseguro', '$coninsegura', '$inctrabajo', '$incambiental', '$desituacion', '$imagen ')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Formulario enviado correctamente.";
                    } else {
                        echo "Error al enviar el formulario: " . $conn->error;
                    }
                    $conn->close();
                }
            }
            ?>