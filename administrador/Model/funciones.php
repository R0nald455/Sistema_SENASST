<?php

require_once ("../../db/conexion.php");

if(isset($_POST['funcion'])){
    switch ($_POST['funcion']){
        //Tipos de registros
        case 'editar_registro';
            editar_registro();
            break;

            case 'eliminar_registro';
                eliminar_registro();
                break;

                case 'acceso_user';
                    acceso_user();
                    break;

    }
}

function editar_registro(){
    extract($_POST);
    $consulta = "UPDATE user SET nombre = '$nombre', correo = '$correo',
    telefono = '$telefono', password = '$password', rol = '$rol' WHERE id = '$id'";
                                                                                                    
    mysqli_query($conexion, $consulta);

    header('Location: ../View/user.php');
}

function eliminar_registro(){
    
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM user WHERE id = $id";

    mysqli_query($conexion, $consulta);

    header('Location: ../View/user.php');
}

function acceso_user(){

    $nombre=$_POST['nombre'];
    $password=$_POST['password'];

    session_start();

    $_SESSION ['nombre']=$nombre;


    $conexion=new mysqli("localhost:3307", "root", "", "SSTCBA");
    $consulta = "SELECT * FROM user WHERE nombre = '$nombre' AND password = '$password'";
    $resultado = mysqli_query($conexion , $consulta);

    $filas = mysqli_fetch_array($resultado);

    //Administrador
    if($filas['rol'] == 1 ){

        header('Location: ../View/user.php');
     //Lector
    }else if($filas['rol'] == 2 ){

        header('Location: ../View/lector.php');
    }

    else{

        header('Location: login.php');
        session_destroy();
    }
}