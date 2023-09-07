<?php
include("../../../db/conexionPDO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $elementoRestar = $_POST['elementoRestar'];
    $cantidadRestar = $_POST['cantidadRestar'];

    // Convertir la cantidad a un entero y asegurarse de que sea un valor positivo
    $cantidadRestar = intval($cantidadRestar);
    $cantidadRestar = max(0, $cantidadRestar);

    try {
        $sqlRestarElemento = "UPDATE cargo SET cantidad_ele = cantidad_ele - :cantidadRestar WHERE elemento = :elementoRestar";
        $stmt = $conexion->prepare($sqlRestarElemento);
        $stmt->bindParam(':cantidadRestar', $cantidadRestar, PDO::PARAM_INT);
        $stmt->bindParam(':elementoRestar', $elementoRestar, PDO::PARAM_STR);
        $stmt->execute();

        // Redirigir a la página principal después de la actualización
        header("location: index.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Mostrar mensaje de error específico
    }
}

// Obtener la lista de elementos para el formulario
$consultaElementos = "SELECT * FROM cargo";
$resultadoElementos = $conexion->query($consultaElementos);
$elementos = $resultadoElementos->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Modal para restar elementos -->
<div class="modal fade" id="sacar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restar elemento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="elementoRestar">Seleccionar Elemento:</label>
                        <select name="elementoRestar" class="form-control" id="elementoRestar">
                            <option selected disabled>Elije</option>
                            <?php foreach ($elementos as $elem) { ?>
                                <option value="<?php echo htmlspecialchars($elem['elemento']); ?>"><?php echo htmlspecialchars($elem['elemento']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidadRestar">Cantidad a Restar:</label>
                        <input type="number" name="cantidadRestar" class="form-control" min="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Restar</button>
                </form>
            </div>
        </div>
    </div>
</div>
