<!DOCTYPE html>
<html>
<head>
    <title>Señales de SST</title>
    <link rel="stylesheet" href="../css/header.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        
        .senales-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .senal {
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            max-width: 350px;
        }

        .senal:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .senal-imagen {
            text-align: center;
            margin-top: 10px;
            position: relative;
            width: 200px;
            height: 200px;
            overflow: hidden;
        }

        .senal-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .descripcion {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s;
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            line-height: 1.4;
        }

        .senal-imagen:hover .descripcion {
            opacity: 1;
        }

        .descripcion p {
            margin: 0;
        }
    </style>
</head>
<body>

<!-- Menu de navegacion-->

<div class="container__menu">

<div class="menu">

    <input type="checkbox" id="check__menu">
    <label for="check__menu" class="lbl-menu">
        <span id="spn1"></span>
        <span id="spn2"></span>
        <span id="spn3"></span>
    </label>

    <a href="../php/rolPersona/indexpersona.php"><img id="logoResponsive" src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></a>
    

    <nav>
        <ul>
            
            <li><a href="../php/rolPersona/indexpersona.php"><img src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></a></li>

            <li><a href="../php/rolPersona/indexpersona.php" id="selected">Inicio</a></li>
            <li><a href="quiz/index.php">Juego</a></li>
        </ul>
    </nav>
</div>
</div>

    <h1>Señales de Seguridad</h1>
    
    <div class="senales-container">
        <?php
        $senalesSST = array(
            "Salida de Emergencia" => array(
                "descripcion" => "Una salida de emergencia es una estructura de salida <br> especial para emergencias tales como un temblor.",
                "imagen" => "emerg.jpg"
            ),
            "Extintor " => array(
                "descripcion" => "Esta señal indica que en esa zona se encuentra un extintor <br> para usarse en caso de una emergencia como un incendio.",
                "imagen" => "extin.jpg"
            ),
            "Riesgo Electrico" => array(
                "descripcion" => "Esta señal indica que se puede generar una lesión <br> en el cuerpo provocada por el contacto <br> directo con una fuente de alta tensión.",
                "imagen" => "elec.jpg"
            ),
            "Camilla de Emergencia" => array(
                "descripcion" => "Esta señal indica que en esa zona se encuentra una camilla <br> que podemos usar en caso de que necesitemos <br> mover a la persona herida.",
                "imagen" => "camilla.jpg"
            ),
            "Botiquin" => array(
                "descripcion" => "Esta señal indica que en esa zona se encuentra un <br> Botiquin para usarlo en caso de que se necesite.",
                "imagen" => "botiquin.jpg"
            ),
            "Enfermeria" => array(
                "descripcion" => "Esta señal indica que en esa zona spodemos encontrar una <br> enfermeria donde remitir a la persona herida para <br> que le presten los auxilios que necesita",
                "imagen" => "enfermeria.jpg"
            ),
            "Precaucion en la Escalera" => array(
                "descripcion" => "Esta señal nos indica que debemos tener cuidado <br> en las escaleras en especial si hay una emergencia para <br> no provocar un accidente.",
                "imagen" => "escaleras.jpg"
            ),
        );
        
        foreach ($senalesSST as $senal => $datos) {
            echo "<div class='senal'>";
            echo "<h2>$senal</h2>";
            $imagenURL = $datos['imagen'];
            echo "<div class='senal-imagen'>";
            echo "<img src='$imagenURL' alt='$senal'>";
            echo "<div class='descripcion'>";
            echo "<p>{$datos['descripcion']}</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
