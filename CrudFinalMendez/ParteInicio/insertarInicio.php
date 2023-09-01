<?php
require "conexionPDO.php";

session_start();

if (isset($_POST['Registrar']) ){
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['contraseña']) >= 1 && strlen($_POST['contraseña2']) >= 1 && strlen($_POST['rolee']) >= 1){


        $nombre=trim($_POST['nombre']);
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
        $contraseña2 = password_hash($_POST['contraseña2'], PASSWORD_BCRYPT);
        $documen = $_SESSION['documento'];


        if(isset($_POST['Registrar'])){
            $rol=$_POST['rolee'];

            switch($rol){
                case 'Aprendiz':
    
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

                break;

                case 'Instructor':
    
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
    
                break;
    
                default: echo"No se encontraron datos";
    
                break;
    
            }
        }
        }
    }
?>