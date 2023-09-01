<?php

//se verifica el boton
if(isset($_POST["submit"])){


    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));

        //se obtienen los datos de los campos
        $titulo=$_POST['txtTitulo'];
        $descripcion=$_POST['txtDescripcion'];
        echo $titulo.$descripcion;

        include_once '../db/conexion.php';
        
        // Cerciorar la conexion
        if($conexion->connect_error){
            die("Connection failed: " . $conexion->connect_error);
        }
        
        
        //Insertar imagen en la base de datos
        $insertar = $conexion->query("INSERT into publicaciones (titulo,descripcion,imagen, creado) VALUES ('$titulo','$descripcion','$imgContenido', now())");
        // COndicional para verificar la subida del fichero
        if($insertar){
            header('Location: index.php?mensaje=registrado');
        }else{
            header('Location: index.php?mensaje=error');
            exit();
        } 
    }else{
        header('Location: index.php?mensaje=error');
        exit();
    }
}
?>