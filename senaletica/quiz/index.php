<!DOCTYPE html>
<html>
<head>
    <title>Quiz Señaletica</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        img {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
        } 
    </style>
</head>
<body>

<a href="../index.php"><img style="width: 100px;" src="../../img/logoSena.png" alt=""></a>

<h1>Quiz Señaletica</h1>

<?php
$questions = array(
    array(
        'question' => 'Que significa la siguiente señal?',
        'image' => 'electrico.png',
        'options' => array(
            'a' => 'Riesgo electrico',
            'b' => 'Salida de emergencia',
            'c' => 'Botiquin',
            'd' => 'Prohibido el paso'
        ),
        'correct_option' => 'a'
    ),
    array(
        'question' => 'Con que forma geometrica se representan las señales de prevencion?',
        'image' => 'prevencion.png',
        'options' => array(
            'a' => 'Cuadrado o rectangulo',
            'b' => 'Circulo',
            'c' => 'Triangulo'
        ),
        'correct_option' => 'c'
    ),
    array(
        'question' => 'Cuales son los colores en los que se dividen las señales?',
        'image' => 'colores.png',
        'options' => array(
            'a' => 'Amarillo, Azul, Naranja, Rojo',
            'b' => 'Amarillo, Rojo, Rosado, Verde',
            'c' => 'Amarillo, Azul, Rojo, Verde',
            'd' => 'Amarillo, Blanco, Rojo, Verde'
        ),
        'correct_option' => 'c'
    ),
    array(
        'question' => 'Que significa la siguiente señal?',
        'image' => 'emergencia.png',
        'options' => array(
            'a' => 'Salida de emergencia',
            'b' => 'Riesgo biologico',
            'c' => 'Camilla',
            'd' => 'Riesgo de incendio'
        ),
        'correct_option' => 'a'
    ),
    array(
        'question' => 'Con que forma geometrica se representan las señales de prohibicion?',
        'image' => 'prevencion.png',
        'options' => array(
            'a' => 'Cuadrado o rectangulo',
            'b' => 'Circulo',
            'c' => 'Triangulo'
        ),
        'correct_option' => 'b'
    ),
    array(
        'question' => 'Cuál de los siguientes es el color y la forma de las señales SST de peligro?',
        'image' => 'peligro.png',
        'options' => array(
            'a' => 'Verde con forma cuadrada',
            'b' => 'Rojo con forma circular',
            'c' => 'Amarillo con forma triangular',
            'd' => 'Blanco con forma circular'
        ),
        'correct_option' => 'c'
    ),
    array(
        'question' => 'Cuál de los siguientes es el color y la forma de las señales SST de auxilio?',
        'image' => 'auxilio.png',
        'options' => array(
            'a' => 'Blanco con forma cuadrada',
            'b' => 'Rojo con forma circular',
            'c' => 'Verde con forma cuadrada',
            'd' => 'Azul con forma triangular'
        ),
        'correct_option' => 'd'
    ),
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    $allAnswered = true;

    foreach ($questions as $index => $question) {
        $selected_option = isset($_POST['question_' . $index]) ? $_POST['question_' . $index] : '';
        
        if (empty($selected_option)) {
            $allAnswered = false;
            break;
        }

        if ($selected_option === $question['correct_option']) {
            $score++;
        }
    }

    if ($allAnswered) {
        echo "<p>Tu puntuación es: $score / " . count($questions) . ". ¡Muy bien!</p>";
    } else {
        echo "<p>Es importante contestar todas las preguntas del quiz. ¡Vamos, tú puedes!</p>";
        echo '<form method="POST" action="">';

        foreach ($questions as $index => $question) {
            echo '<p>' . $question['question'] . '</p>';
            echo '<img src="' . $question['image'] . '" alt="Imagen de la pregunta">';
            foreach ($question['options'] as $optionKey => $option) {
                echo '<label>';
                echo '<input type="radio" name="question_' . $index . '" value="' . $optionKey . '">';
                echo $option;
                echo '</label><br>';
            }
        }

        echo '<br><input type="submit" value="Ver respuestas correctas">';
        echo '</form>';
    }
} else {
    echo '<form method="POST" action="">';

    foreach ($questions as $index => $question) {
        echo '<p>' . $question['question'] . '</p>';
        echo '<img src="' . $question['image'] . '" alt="Imagen de la pregunta">';
        foreach ($question['options'] as $optionKey => $option) {
            echo '<label>';
            echo '<input type="radio" name="question_' . $index . '" value="' . $optionKey . '">';
            echo $option;
            echo '</label><br>';
        }
    }

    echo '<br><input type="submit" value="Ver respuestas correctas">';
    echo '</form>';
}
?>
</body>
</html>