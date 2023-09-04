
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/registroRegiste.css">
    <title>Registro</title>
</head>

<body>

<h1 class="text-top"> ¡Genial¡ Estás a un paso de registrarte y disfrutar de los simuladores </h1>
    
    <form method="POST">

        <h1>LLena los datos para registrarte!</h1>

        <input autocomplete="off" type="text" name="nombre" placeholder="Digite su nombre" >

        <input type="password" name="contraseña" placeholder="Digite su contraseña" >
        
        <input type="password" name="contraseña2" placeholder="Confirme su contraseña">

        <select name="rolee">
            <option disabled selected=""> Seleccione un Rol </option>
            <option> Aprendiz </option>
            <option> Instructor </option>
        </select>

        <div class="btn-submit">
    
            <input class="btn-input" type="submit" value="Login" name="Login">
            <input class="btn-input" type="submit" value="Registrarme" name="Registrar">

        </div>
        
    </form>

    <?php
    
    if (isset($_POST['Login']) ){
                    
    header("location: login.php");
                
    }
    ?>

    <script src="./js/sweetAlert.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
    require "insertarInicio.php";
?>


</body>
</html>

