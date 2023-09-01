<?php

require "conexionPDO.php";

session_start();

if (isset($_POST['iniciar']) ){
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['contraseña']) >= 1 && strlen($_POST['role']) >= 1){

        $nombre=trim($_POST['nombre']);
        $contraseña=trim($_POST['contraseña']);
        $rol=trim($_POST['role']);
        $contador = 0;

        /*Verificar roles*/

        if(isset($_POST['iniciar'])){

            $rol = $_POST['role'];
            switch($rol){
                case 'Aprendiz':

                    $records = $conn->prepare("SELECT cod_estudiante, UsuName, UsuContraseña FROM aprendiz WHERE UsuName = '$nombre'");
                    $records->execute();
                    $results = $records->fetch(PDO::FETCH_ASSOC);
                    $sql=$conn->query("SELECT * FROM aprendiz WHERE UsuName = '$nombre' AND UsuContraseña = '$contraseña' ");

                    if($nombre == $results['UsuName'] && password_verify($_POST['contraseña'], $results['UsuContraseña'])){

                            $_SESSION["idSe"] = $results['cod_estudiante'];
                            $_SESSION["nombre"] = $results['UsuName'];
                            
                            header("location: ../LandingPageOFC/index.php");
                            
                        } else {                       
                            ?><script>
                                Swal.fire({
                                    title:'Error en usuario o contraseña!',
                                    text: 'Verifique e intente nuevamente!',
                                    icon: 'error',
                                })  
                            </script><?php
                        }

                break;
            
                case 'Instructor':

                    $registros = $conn->prepare("SELECT InsCode, InsName, InsContraseña FROM instructor WHERE InsName = '$nombre'");
                    $registros->execute();
                    $resultado = $registros->fetch(PDO::FETCH_ASSOC);
                    $sql=$conn->query("SELECT * FROM instructor WHERE InsName = '$nombre' AND InsContraseña = '$contraseña' ");

                    if($nombre == $resultado['InsName'] && password_verify($_POST['contraseña'], $resultado['InsContraseña'])){
                            $_SESSION["idInst"] = $resultado['InsCode'];
                            $_SESSION["nombreIns"] = $resultado['InsName'];

                            header("location: ../LandingPageOFC/indexInstruc.php");
                            
                        } else {                       
                            ?><script>
                                Swal.fire({
                                    title:'Error en usuario o contraseña!',
                                    text: 'Verifique e intente nuevamente!',
                                    icon: 'error',
                                })  
                            </script><?php
                        }

                break;
    
                default: echo"No se encontraron datos";
    
                break;
    
                }
            }
    }

    
    }

?>