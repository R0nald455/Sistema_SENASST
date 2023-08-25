<head>
  <link rel="stylesheet" type="text/css" href="../css//now.css">
</head>
<body>
    <div>
    

    <?php
require_once("conexion.php");

$pregunta = $_POST['pregunta'];
$respuesta = $_POST['respuesta'];
$falso1 = $_POST['falso1'];
$falso2 = $_POST['falso2'];
$falso3 = $_POST['falso3'];

$query = "INSERT INTO problema (pregunta, respuesta, falsa1, falsa2, falsa3) 
          VALUES ('$pregunta', '$respuesta', '$falso1', '$falso2', '$falso3')";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    echo "<h1>Registro insertado correctamente</h1>";
    // Redirigir automáticamente a subirquiz.php después de 2 segundos
    header("refresh:2;url=subirquiz.php");
} else {
    echo "Error al insertar el registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
</div>
</body>