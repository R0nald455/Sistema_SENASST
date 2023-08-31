<!DOCTYPE html>
<html lang="Es">
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }

        .nav-bar {
            background-color: #5eb319;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .container {
            padding: 20px;
            background-color: #fff;
            border: 2px solid #5eb319;
            border-radius: 10px;
            max-width: 500px;
            margin: 20px auto;
        }

        h1 {
            color: #000;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #5eb319;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #5eb319;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #5eb319;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header class="container">
        <ul class="nav-bar">
            <a href="../php/index.php" class="nav-link">Inicio</a>
            <a href="agregar.html" class="nav-link">Agregar Producto</a>
            <a href="#" class="nav-link">Editar Producto</a>
            <a href="../php/entrada_salida.php" class="nav-link">entradas y salidas</a>
        </ul>
        <div class="white-darkmode-toggler-container">
            <i class="bx bx-sun"></i>
            <i class="bx bx-moon"></i>
        </div>
    </header>
    <main>
        <div class="container">
            <section id="Images" class="images-cards">
                <h1 class="one-week-more-title period-title">Editar Producto</h1><br>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="buscar_producto" value="1">
                    <h1 class="one-week-more-title period-title">Buscar Producto por Codigo</h1>
                    <input type="number" name="codigo">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </form>
                <?php
include '../php/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['buscar_producto'])) {
        $codigo = $_POST['codigo'];
        $instruccion = "SELECT * FROM inventario WHERE codigo='$codigo'";
        $resultado = mysqli_query($bd, $instruccion);
        $producto = mysqli_fetch_assoc($resultado);
        if ($producto) {
            echo '<form action="../html/editar.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="actualizar_producto" value="1">
                    <input type="hidden" name="codigo" value="' . $producto['codigo'] . '">
                    <h1 class="one-week-more-title period-title">Cual es el Codigo del producto</h1>
                    <input type="number" name="codigo" value="' . $producto['codigo'] . '" readonly>
                    <br><br>
                    <h1 class="one-week-more-title period-title">Cuantas unidades disponibles</h1>
                    <input type="number" name="cantidad" value="' . $producto['cantidad'] . '">
                    <br><br>
                    <h1 class="one-week-more-title period-title">Nombre del Producto</h1>
                    <input type="text" name="Nombre" value="' . $producto['Nombre'] . '">
                    <br><br>';
            echo '<h1 class="one-week-more-title period-title">Fecha de Vencimiento</h1>';
            echo '<input type="date" name="fecha_ven" value="' . $producto['fech_ven'] . '">';
            if ($producto['imagen']) {
                echo '<h1 class="one-week-more-title period-title">Imagen Actual</h1>';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($producto['imagen']) . '" width="100" height="100">';
            }
            echo '<br><br>
                    <h1 class="one-week-more-title period-title">Cambiar Imagen</h1>
                    <input type="file" class="form-control" name="imagen">
                    <input type="hidden" name="imagen_actual" value="' . base64_encode($producto['imagen']) . '">
                    <br><br>
                    <div class="d-grid">
                        <center>
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-primary" value="Actualizar Producto">
                        </center>
                    </div>
                </form>';
        } else {
            echo "Producto no encontrado.";
        }
    } elseif (isset($_POST['actualizar_producto'])) {
        $codigo = $_POST['codigo'];
        $cantidad = $_POST['cantidad'];
        $Nombre = $_POST['Nombre'];
        $fechaVencimiento = $_POST['fecha_ven'];
        $imagenActual = $_POST['imagen_actual'];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0) {
            $imageName = $_FILES['imagen']['name'];
            $imageTmp = $_FILES['imagen']['tmp_name'];
            $imagePath = "../imagenes/" . $imageName;
            move_uploaded_file($imageTmp, $imagePath);
            $instruccion = "UPDATE inventario SET cantidad='$cantidad', Nombre='$Nombre', fech_ven='$fechaVencimiento', imagen='" . addslashes(file_get_contents($imagePath)) . "' WHERE codigo='$codigo'";
        } else {
            $instruccion = "UPDATE inventario SET cantidad='$cantidad', Nombre='$Nombre', fech_ven='$fechaVencimiento', imagen='" . addslashes(base64_decode($imagenActual)) . "' WHERE codigo='$codigo'";
        }

        $ejecutar = mysqli_query($bd, $instruccion);
        if ($ejecutar) {
            echo "Actualización correcta";
            header("Location: ../php/index.php");
            exit;
        } else {
            echo "Error al actualizar el producto.";
        }
    }
}
?>

            </section>
        </div>
    </main>
    <!-- Agrega aquí tus enlaces a scripts adicionales si los tienes -->
</body>
</html>
