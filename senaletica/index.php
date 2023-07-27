<!DOCTYPE html>
<html>
<head>

    <style>

        *{
        margin: 0px;
        padding: 0px;
        border: 0px;
        font-family: Arial, Helvetica, sans-serif;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        
        header{
        width:100%;
        background-color: #ffffff;
        height: 120px;
        position: sticky;
        border:0px;
        border-bottom: 20px;
        border-style: solid;
        border-color: #45d100;
        }

        header img {
        height: 70px;
        margin-left: 20px;
        margin-top: 10px;
        }

        header h1 {
        float: right;

        font-weight: bold;
        font-size: 30px;
        margin-top: 10px;
        margin-right: 5%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        
        h2 {
            color: #666;
            margin-bottom: 10px;
        }
        
        p {
            margin-bottom: 20px;
            text-align: justify;
        }
        
        .senal {
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }
        
        .senal-imagen {
            text-align: center;
        }

        .senal-imagen img {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <header>
    <a href="../php/rolPersona/indexPersona.php"><img src="../img/LogoSena.png" alt="logosena"></a>
    <h1>Señales de Seguridad</h1>
    </header>
    <?php
    $senalesSST = array(
        "Salida de Emergencia" => array(
            "descripcion" => "Una salida de emergencia es una estructura de salida <br> especial para emergencias tales como un temblor.",
            "imagen" => "../img/emerg.jpg"
        ),
        "Extintor " => array(
            "descripcion" => "Esta señal indica que en esa zona se encuentra un extintor <br> para usarse en caso de una emergencia como un incendio.",
            "imagen" => "../img/extin.jpg"
        ),
        "Riesgo Electrico" => array(
            "descripcion" => "Esta señal indica que se puede generar una lesión <br> en el cuerpo provocada por el contacto <br> directo con una fuente de alta tensión.",
            "imagen" => "../img/elec.jpg"
        ),
        "Camilla de Emergencia" => array(
            "descripcion" => "Esta señal indica que en esa zona se encuentra una camilla <br> que podemos usar en caso de que necesitemos <br> mover a la persona herida.",
            "imagen" => "../img/camilla.jpg"
        ),
        "Botiquin" => array(
            "descripcion" => "Esta señal indica que en esa zona se encuentra un <br> Botiquin para usarlo en caso de que se necesite.",
            "imagen" => "../img/botiquin.jpg"
        ),
        "Enfermeria" => array(
            "descripcion" => "Esta señal indica que en esa zona spodemos encontrar una <br> enfermeria donde remitir a la persona herida para <br> que le presten los auxilios que necesita",
            "imagen" => "../img/enfermeria.jpg"
        ),
        "Precaucion en la Escalera" => array(
            "descripcion" => "Esta señal nos indica que debemos tener cuidado <br> en las escaleras en especial si hay una emergencia para <br> no provocar un accidente.",
            "imagen" => "../img/escaleras.jpg"
        ),
    );
    
    foreach ($senalesSST as $senal => $datos) {
        echo "<div class='senal'>";
        echo "<h2>$senal</h2>";
        echo "<p>{$datos['descripcion']}</p>";
        
        $imagenURL = $datos['imagen'];
        echo "<div
        class='senal-imagen'>";
        echo "<img src='$imagenURL' alt='$senal'>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</body>
</html>    