<?php

session_start();
error_reporting(0);

require_once("../../db/conexion.php");

/* $validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ../Model/login.php");
    die();

} */

//solucion para verificar el login

$id = $_GET['id'];
$consulta = "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/usuarios.css">

</head>

<body>
    <?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 4): ?>



        <!-- Menu de navegacion-->

        <div class="container__menu">

            <div class="menu">

                <input type="checkbox" id="check__menu">
                <label for="check__menu" class="lbl-menu">
                    <span id="spn1"></span>
                    <span id="spn2"></span>
                    <span id="spn3"></span>
                </label>

                <img id="logoResponsive" src="../../img/LogoSenaBlanco.png" width="70px" alt="logoSena">


                <nav>
                    <ul>
                        <li><img src="../../img/LogoSenaBlanco.png" width="70px" alt="logoSena"></li>
                        <li><a href="user.php" id="selected">Inicio</a></li>
                        <li><a onclick="window.location.href='../../php/rolFuncionario/indexadministrador.php'"><span
                                    class="material-symbols-outlined">Salir</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="container">
            <form action="../Model/funciones.php" method="POST">

                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column">
                        <div id="login-box">
                            <br>
                            <br>
                            <h3 class="text-center">Editar Usuario</h3>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <br>
                                <input type="text" id="nombre" name="nombre" class="form_control"
                                    value="<?php echo $usuario['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label>
                                <br>
                                <input type="email" name="correo" id="correo" class="form_control" placeholder=""
                                    value="<?php echo $usuario['correo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Telefono *</label>
                                <br>
                                <input type="tel" id="telefono" name="telefono" class="form-control"
                                    value="<?php echo $usuario['telefono']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <br>
                                <input type="password" name="password" id="password" class="form-control"
                                    value="<?php echo $usuario['password']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="rol" class="form-label">Rol de Usuario *</label>
                                <br>
                                <input type="number" id="rol" name="rol" class="form-control"
                                    placeholder="Escribe el rol 1 para Admin, 2 para Lector"
                                    value="<?php echo $usuario['rol']; ?>" required>
                                <input type="hidden" name="funcion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>

                            <br>

                            <div class="mb-3">

                                <button type="submit" class="btnEnviar">Editar</button>
                                <a href="user.php" class="btnCancelar">Cancelar</a>
                            </div>
                        </div>
                    </div>
            </form>

        </div>
        </form>
        </div>
    <?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../../php/login.php";
        </script>

    <?php endif; ?>

</body>

</html>