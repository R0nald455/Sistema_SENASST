
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/registroRegiste.css">
    <title>Login administrador</title>
</head>

<body>

<h1 class="text-top"> LOGIN! </h1>
    
    <form method="POST">

        <h1>Llena los datos para iniciar como administrador</h1>

        <input autocomplete="off" type="text" name="documento" placeholder="Digite su N° documento" >

        <input autocomplete="off" type="text" name="nombre" placeholder="Digite su nombre">

        <input type="password" name="contraseña" placeholder="Digite su contraseña">

        <div class="btn-submit">
    
            <input class="btn-input" type="submit" value="Atrás" name="atras">
            <input class="btn-input" type="submit" value="Iniciar sesión" name="iniciar">
   
        </div>
    
    </form>


    <?php

        if(isset($_POST['atras'])){
            header("location: ../index.php");
        }

    ?>



    
    <script src="./js/sweetAlert.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
    include("conexion.php");
    include("insertarAdminLogin.php");
?>

</body>
</html>

