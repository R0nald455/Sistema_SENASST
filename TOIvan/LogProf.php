<head>
  <link rel="stylesheet" type="text/css" href="../css//now.css">
</head>
<body>
    <div>

<?php
//error_reporting(0);
include("../db/conexion.php");


// Recibimos los datos del formulario
$names = $_POST['names'];
$condicion = $_POST['condicion'];
$mision = $_POST['contexto'];
$situacion = $_POST['situacion'];

$laimagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "INSERT INTO observacion (nombre,Condicion, Lugar, Foto, contexto) 
VALUES ('$names', '$condicion', '$mision','$laimagen', '$situacion')";
$resultado = mysqli_query($conexion, $query);

// Verificamos si el insert fue exitoso
if ($resultado) {
header("location: ./ProfIni.php");
} else {
    echo "Error al insertar el registro: " . mysqli_error($conexion);
}

// Cerramos la conexión
mysqli_close($conexion);


?>
</div>
</body>