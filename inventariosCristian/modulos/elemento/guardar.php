<?php
include("../../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevoElemento = $_POST['nuevoElemento'];
    $nuevaCantidad = $_POST['nuevaCantidad'];

    // Convertir la cantidad a un entero
    $nuevaCantidad = intval($nuevaCantidad);

    if ($nuevaCantidad > 0) {
        try {
            $sqlActualizarElemento = "UPDATE cargo SET cantidad_ele = cantidad_ele + :nuevaCantidad WHERE elemento = :nuevoElemento";
            $stmt = $conexion->prepare($sqlActualizarElemento);
            $stmt->bindParam(':nuevaCantidad', $nuevaCantidad, PDO::PARAM_INT);
            $stmt->bindParam(':nuevoElemento', $nuevoElemento, PDO::PARAM_STR);
            $stmt->execute();

            // Redirigir a la página principal después de la actualización
            header("location: index.php");
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Mostrar mensaje de error específico
        }
    }
}

// Obtener la lista de elementos para el formulario
$consultaElementos = "SELECT * FROM cargo";
$resultadoElementos = $conexion->query($consultaElementos);
$elementos = $resultadoElementos->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Modal para añadir elementos -->
<div class="modal fade" id="guardar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir elemento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="nuevoElemento">Seleccionar Elemento:</label>
                        <select name="nuevoElemento" class="form-control" id="nuevoElemento">
                            <option selected disabled>Elije</option>
                            <?php foreach ($elementos as $elem) { ?>
                                <option value="<?php echo htmlspecialchars($elem['elemento']); ?>"><?php echo htmlspecialchars($elem['elemento']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nuevaCantidad">Cantidad a Añadir:</label>
                        <input type="number" name="nuevaCantidad" class="form-control" min="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
