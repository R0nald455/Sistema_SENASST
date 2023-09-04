<?php
include("../conexion/conexion.php");

session_start();

if (isset($_POST['Registrar']) ){
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['contraseña']) >= 1 && strlen($_POST['contraseña2']) >= 1 && strlen($_POST['rolee']) >= 1){


        $nombre=trim($_POST['nombre']);
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
        $contraseña2 = password_hash($_POST['contraseña2'], PASSWORD_BCRYPT);

        $existeNombreA = "SELECT UsuName FROM aprendiz WHERE UsuName = '$nombre'";
        $existeNombreI = "SELECT InsName FROM instructor WHERE InsName = '$nombre'";

        $resultadoExisteA = $conex->query($existeNombreA);
        $resultadoExisteI = $conex->query($existeNombreI);

        if(isset($_POST['Registrar'])){
            $rol=$_POST['rolee'];

            switch($rol){
                case 'Aprendiz':

                    if($resultadoExisteA->num_rows > 0){
                        ?>
                            <script>
                                Swal.fire({
                                    title: `<h2 style="color: white;">El nombre de usuario ya existe.</h2>`,
                                    html: '<h2 style="color: white;">Intenta registrarte con otro nombre.</h2>',
                                    background: '#00000053',
                                    icon: 'warning',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Intentar con otro nombre',
                                    BackDrop: true,
                                    allowEscapeKey : false,
                                    allowOutsideClick: false,
                                    allowSideClick: false,
                                    allowEnterKey: false
                                })
                            </script>
                        <?php
                    } else { 

                        if ($_POST['contraseña'] == $_POST['contraseña2']){

                        $sql = "INSERT INTO Aprendiz (UsuName, UsuContraseña) values ('$nombre', '$contraseña')";
                        $query = mysqli_query($conex, $sql);

                            if ($query){
                                ?><script>
                                    const {value: enviar} = Swal.fire({
                                    title:'Se registro correctamente!',
                                    text: 'Presione login para iniciar su aventura!',
                                    icon: 'success',
                                    })
                                </script><?php
                            }else{
                                ?><script>
                                alert("¡Upsss, algo salio mal...!")
                                </script><?php
                            }
                        } else {
                            ?><script>
                                alert("Las contraseñas no coninciden");
                            </script><?php
                        }
                    }
                break;

                case 'Instructor':
    
                    if($resultadoExisteI->num_rows > 0){
                        ?>
                            <script>
                                Swal.fire({
                                    title: `<h2 style="color: white;">El nombre de usuario ya existe.</h2>`,
                                    html: '<h2 style="color: white;">Intenta registrarte con otro nombre.</h2>',
                                    background: '#00000053',
                                    icon: 'warning',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Intentar con otro nombre',
                                    BackDrop: true,
                                    allowEscapeKey : false,
                                    allowOutsideClick: false,
                                    allowSideClick: false,
                                    allowEnterKey: false
                                })
                            </script>
                        <?php

                    } else {
                        if ($_POST['contraseña'] == $_POST['contraseña2']){

                            $sql = "INSERT INTO instructor (InsName, InsContraseña) values ('$nombre', '$contraseña')";
                            $resultado = mysqli_query($conex, $sql);
    
                            if ($resultado){
                                ?><script>
                                    Swal.fire({
                                    title:'Se registro correctamente!',
                                    text: 'Presione login para iniciar su aventura!',
                                    icon: 'success',
                                    })  
                                </script><?php
                            }else{
                                ?><script>
                                    alert("¡Upsss, algo salio mal...!")
                                </script><?php
                            }
    
                        }else{ 
                            ?><script>
                                alert("Las contraseñas no coninciden");
                            </script><?php
                        }
                    }

                break;
    
                default: echo"No se encontraron datos";
    
                break;
    
            }
        }
        }
    }
?>