<?php

    session_start();

    $documento = $_POST["documento"];
    $contrasena = $_POST["contrasena"];

    include_once("../db/conexion.php");

    // Consulta
    $query = "SELECT * FROM user WHERE nombre = '$documento' AND password = '$contrasena'";
    $result = $conexion->query($query);

    if ($result->num_rows == 1) {
        // Obtener el rol del usuario

        $user = $_GET["documento"] ?? "";

        $_SESSION["id"] = $user;
        $_SESSION["documento"] = $documento;

        $row = $result->fetch_assoc();
        $rol = $row["rol"];
        
        // redireccion
        if ($rol == 1) {
            header("Location: rolFuncionario/indexfuncionario.php");
        } elseif ($rol == 2) {
            header("Location: rolPersona/indexpersona.php");
        }elseif ($rol == 3) {
            header("Location: rolPersona/indexbrigadista.php");
        }elseif ($rol == 4) {
            header("Location: rolFuncionario/indexadministrador.php");
        }
    } else {
        echo "Credenciales incorrectas. Por favor, intenta nuevamente.";
    }

    $conexion->close();
?>
