<?php

//se verifica el boton
if(isset($_POST["submit"])){




        //se obtienen los datos de los campos
        $id=$_POST['riesgo_id'];
        $estado=$_POST['estado'];
        echo $id.$estado;

        include_once '../db/conexion.php';
        
        // Cerciorar la conexion
        if($conexion->connect_error){
            die("Connection failed: " . $conexion->connect_error);
        }
        
        
        //Insertar imagen en la base de datos
        $insertar = $conexion->query("UPDATE `tobservacion` SET `estado`='".$estado."' WHERE id=".$id);
        // COndicional para verificar la subida del fichero
        if($insertar){
            header('Location: index.php?mensaje=registrado');
        }else{
            header('Location: index.php?mensaje=error');
            exit();
        } 
}
?>