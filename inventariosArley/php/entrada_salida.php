<?php
include('conexion.php');

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$productos = array();
$query_products = "SELECT id, Nombre FROM inventario";
$resultado_productos = $conexion->query($query_products);

while ($fila = $resultado_productos->fetch_assoc()) {
    $productos[] = $fila;
}

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    
    $query_entrada = "SELECT id, Nombre, cantidad, imagen FROM inventario WHERE id = $product_id";
    $result_entrada = $conexion->query($query_entrada);

    if ($result_entrada->num_rows > 0) {
        $product_info_entrada = $result_entrada->fetch_assoc();
    } else {
        $product_info_entrada['id'] = "Producto no encontrado";
    }

    $result_entrada->free();
    
    $query_salida = "SELECT id, Nombre, cantidad, imagen FROM inventario WHERE id = $product_id";
    $result_salida = $conexion->query($query_salida);

    if ($result_salida->num_rows > 0) {
        $product_info_salida = $result_salida->fetch_assoc();
    } else {
        $product_info_salida['id'] = "Producto no encontrado";
    }

    $result_salida->free();

    if (isset($_POST['operation']) && $_POST['operation'] === 'entrada') {
        $quantity_entrada = $_POST['quantity_entrada'];

        // Insertar un registro de entrada en la tabla entrada_inventario
        $insert_query = "INSERT INTO entrada_inventario (fecha_entrada, cantidad_entrada, inventario_id) 
                         VALUES (NOW(), $quantity_entrada, $product_id)";
        
        if ($conexion->query($insert_query)) {
            // Actualizar la cantidad en la tabla inventario
            $update_query = "UPDATE inventario SET cantidad = cantidad + $quantity_entrada WHERE id = $product_id";
            $conexion->query($update_query);

            $mensaje = "Se ha registrado una entrada de $quantity_entrada unidades del producto.";

        } else {
            $mensaje = "Error al registrar la entrada.";
        }
    } elseif (isset($_POST['operation']) && $_POST['operation'] === 'salida') {
        $quantity_salida = $_POST['quantity_salida'];

        // Insertar un registro de salida en la tabla salida_inventario
        $insert_query = "INSERT INTO salida_inventario (fecha_salida, cantidad_salida, inventario_id) 
                         VALUES (NOW(), $quantity_salida, $product_id)";
        
        if ($conexion->query($insert_query)) {
            // Actualizar la cantidad en la tabla inventario
            $update_query = "UPDATE inventario SET cantidad = cantidad - $quantity_salida WHERE id = $product_id";
            
            // Verificar si hay suficiente cantidad antes de realizar la actualización
            $check_query = "SELECT cantidad FROM inventario WHERE id = $product_id";
            $result_check = $conexion->query($check_query);

            if ($result_check->num_rows > 0) {
                $row_check = $result_check->fetch_assoc();
                $cantidad_disponible = $row_check['cantidad'];
                
                if ($quantity_salida <= $cantidad_disponible) {
                    $conexion->query($update_query);
                    $mensaje = "Se ha registrado una salida de $quantity_salida unidades del producto.";

                } else {
                    $mensaje = "No hay suficiente cantidad disponible para la salida.";
                }
            }
            
            $result_check->free();
        } else {
            $mensaje = "Error al registrar la salida.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Entrada y Salida de Inventario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #5eb319;
        }

        .info-producto {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .imagen-producto {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Entrada y Salida de Inventario</h1>
        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $mensaje; ?>
            </div>
            <?php
           
            header("refresh:3;url=../index.php");
            exit();
            ?>
        <?php endif; ?>
        
        <form method="post">
            <label for="product_id">Selecciona un Producto:</label>
            <select name="product_id" required>
                <option value="">Seleccione un producto</option>
                <?php foreach ($productos as $producto): ?>
                    <option value="<?php echo $producto['id']; ?>"><?php echo $producto['Nombre']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Filtrar Producto</button>
        </form>
        
        <?php if (!empty($product_info_entrada['id'])): ?>
        <div class="info-producto">
            <h2>Información del Producto (Entrada)</h2>
            <p>Nombre: <?php echo $product_info_entrada['Nombre']; ?></p>
            <form method="post">
                <label for="quantity_entrada">Cantidad de Entrada:</label>
                <input type="number" name="quantity_entrada" required>
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <input type="hidden" name="operation" value="entrada">
                <button type="submit">Registrar Entrada</button>
            </form>
            <img src="data:image/jpg;base64,<?php echo base64_encode($product_info_entrada['imagen']); ?>" alt="Producto" class="imagen-producto">
        </div>
        <?php endif; ?>
        
        <?php if (!empty($product_info_salida['id'])): ?>
        <div class

        <div class="info-producto">
            <h2>Información del Producto (Salida)</h2>
            <p>Nombre: <?php echo $product_info_salida['Nombre']; ?></p>
            <form method="post">
                <label for="quantity_salida">Cantidad de Salida:</label>
                <input type="number" name="quantity_salida" required>
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <input type="hidden" name="operation" value="salida">
                <button type="submit">Registrar Salida</button>
            </form>
            <img src="data:image/jpg;base64,<?php echo base64_encode($product_info_salida['imagen']); ?>" alt="Producto" class="imagen-producto">
        </div>
        <?php endif; ?>
        
    </div>
</body>
</html>
