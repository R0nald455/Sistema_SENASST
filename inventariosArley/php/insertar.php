<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['oculto'])) {
        $codigo = $_POST['codigo'];
        $cantidad = $_POST['cantidad'];
        $nombre = $_POST['nombre'];
        $imagen = $_FILES['imagen'];
        $fechaVencimiento = $_POST['fech_ven']; 

        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($check !== false) {
            $image = $_FILES['imagen']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $instruccion = "INSERT INTO inventario(codigo, imagen, cantidad, Nombre, fech_ven)
                            VALUES ('$codigo', '$imgContent', '$cantidad', '$nombre', '$fechaVencimiento')";
            $ejecutar = mysqli_query($conexion, $instruccion);
            if ($ejecutar) {
                echo "Inserción correcta";
            } else {
                echo "Error al insertar en la base de datos";
            }
        } else {
            echo "Archivo de imagen no válido";
        }
    }
    header("Location: ../php/index.php");
    exit;
}
?>
