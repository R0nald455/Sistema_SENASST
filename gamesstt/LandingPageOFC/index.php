<?php
session_start();
if (empty($_SESSION["idSe"])){
    header("location: ../index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./indexcc.css">
    <title>Inicio Aprendiz</title>
</head>

<body>


    <!-- Contenedor principal inicio  -->

    <div class="cont-prin">

        <section class="cont-all">

            
            <div class="cont-text">
                <h1 id="logo"></h1>
                <h1>Bienvenid@ <?php echo $_SESSION["nombre"] ?> </h1>
            </div>
            
            <form class="cont-juegos" method="POST">

                <h1>Elije un juego</h1>

                <select name="cont-juego">
                    <option value="" disabled selected>Juegos disponibles</option>
                    <option value="memoryGame">Memory Game</option>
                    <option value="juego360">Juego 360°</option>
                    <option value="testJuego">Test videojuego</option>
                    <option value="escenarioRiego">Escenarios de riesgos</option>
                </select>
                
                <input type="submit" value="JUGAR" name="btn-jugar">

            </form>

            <section class="cont-menu">
                <header>
                    <div class="btn-menu">
                        <a href="#">¿Cómo usar?</a>
                        <a href="../conexion/cerrar_sesion.php" style="text-decoration: none; color: greenyellow;">Salir</a>
                    </div>
                </header>
            </section>
        </section>

    </div>

</body>

<?php

    if(isset($_POST['btn-jugar'])){

        $elijeJuego = $_POST['cont-juego'];

        switch($elijeJuego){
            case 'memoryGame':
                header("location: ../PracticaBotiquin/index.php");
            
            break;
        
            case 'juego360':
                header("location: ../pagina360/index.php");
            break;

            case 'testJuego':
                header("location: ./paginaPruebasAprendiz/indexInicioPreg.php");
            break;

            case 'escenarioRiego':
                header("location: ./PaguinaSimulador/");
            break;

            default: echo"No se encontraron datos";
            
            break;

        }
    }

?>


</html>