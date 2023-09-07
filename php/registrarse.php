<?php
    $documento = $_POST["documento"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $contrasena = $_POST["contrasena"];

    include_once("../db/conexion.php");


  
    //se verifiac que sea correo institucional del sena 
    $partesEmail=explode("@",$email);
    if($partesEmail[1]=="soy.sena.edu.co"){
        echo"bienvenido";


        $fechaActual = date("Y-m-d"); // Formato: Año-Mes-Día

        // Consulta
        $sql = "INSERT INTO `user`( `nombre`, `correo`, `telefono`, `password`, `fecha`, `rol`) 
                        VALUES ('$nombre','$email','$telefono','$contrasena','$fechaActual','2')";

        if ($conexion->query($sql) === TRUE) {
            header("Location: ../php/login.php");
        } 
    }else{
        header("Location: registro.php?mensaje=falta");
        exit();
    }

    $conexion->close();
?>
