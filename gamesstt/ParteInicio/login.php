
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/registroRegistee.css">
    <title>Login</title>
</head>

<body>

<h1 class="text-top"> LOGIN! </h1>
    
    <form method="POST">

        <h1>¡LLena los datos para iniciar sesión!</h1>

        <input autocomplete="off" type="text" name="nombre" placeholder="Digite su nombre" >

        <input type="password" name="contraseña" placeholder="Digite su contraseña" >

        <select name="role">
            <option disabled selected=""> Seleccione un Rol </option>
            <option> Aprendiz </option>
            <option> Instructor </option>
        </select>

        <div class="btn-submit">
    
            <input class="btn-input" type="submit" value="Volver" name="volver">
            <input class="btn-input" type="submit" value="Iniciar sesión" name="iniciar">
   
        </div>
    
    </form>


    <?php

        if(isset($_POST['volver'])){
            header("location: ../index.php");
        }

    ?>

    <script src="./js/sweetAlert.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    include("insertarLogin.php");
?>

</body>
</html>

