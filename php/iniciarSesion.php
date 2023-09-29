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
    $_SESSION["rol"] = $row["rol"];

    // redireccion
    if ($_SESSION["rol"] == 1) {
        header("Location: rolFuncionario/indexfuncionario.php");
    } elseif ($_SESSION["rol"] == 2) {
        header("Location: rolPersona/indexpersona.php");
    } elseif ($_SESSION["rol"] == 3) {
        header("Location: rolPersona/indexbrigadista.php");
    } elseif ($_SESSION["rol"] == 4) {
        header("Location: rolFuncionario/indexadministrador.php");
    }
} else {
    $_SESSION['incorrecto'] = true;
    header('Location:login.php');
}

$conexion->close();
?>