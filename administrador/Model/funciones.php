<?php


if(isset($_POST['funcion'])){
    switch ($_POST['funcion']){
        //Tipos de registros
        case 'editar_registro';
            editar_registro();
        break;

        case 'eliminar_registro';
            eliminar_registro();
        break;
    }
}

function editar_registro(){
    require_once ("../../db/conexion.php");
    extract($_POST);
    $consulta = "UPDATE user SET nombre = '$nombre', correo = '$correo',
    telefono = '$telefono', password = '$password', rol = '$rol' WHERE id = '$id'";
                                                                                                    
    mysqli_query($conexion, $consulta);

    header('Location: ../View/user.php');
}

function eliminar_registro(){
    require_once ("../../db/conexion.php");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM user WHERE id = $id";
    mysqli_query($conexion, $consulta);
    header('Location: ../View/user.php');
}
