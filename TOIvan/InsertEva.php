<head>
  <link rel="stylesheet" type="text/css" href="../css//now.css">
</head>
<body>
    <div>
    

<?php
///error_reporting(0);
include("../db/conexion.php");

// Recibimos los datos del formulario
$eva = $_POST['evaluacion'];
$retro = $_POST['retro'];
$ocid = $_POST['ocid'];


$query = "INSERT INTO revision (nombre,Estado, id_observacion) VALUES ('$eva', '$retro', '$ocid');";
$resultado = mysqli_query($conexion, $query);

// Verificamos si el insert fue exitoso
if ($resultado) {
    header("location: ./ProfIni.php");
    } else {
        echo "Error al insertar el registro: " . mysqli_error($conexion);
    }
    

// Cerramos la conexión
mysqli_close($conexion);
echo"<br>";
echo '<a href="ProfIni.php">Volver al inicio</a>';


?>
</div>
</body>