<?php
    $documento = $_POST["documento"];
    $contrasena = $_POST["contrasena"];
    // conexión
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "inventarios";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta
    $query = "SELECT * FROM user WHERE nombre = '$documento' AND password = '$contrasena'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Obtener el rol del usuario
        $row = $result->fetch_assoc();
        $rol = $row["rol"];

        // redireccion
        if ($rol == 1) {
            header("Location: rolFuncionario/indexfuncionario.php");
        } elseif ($rol == 2) {
            header("Location: rolPersona/indexpersona.php");
        }
    } else {
        echo "Credenciales incorrectas. Por favor, intenta nuevamente.";
    }
    $conn->close();
?>
