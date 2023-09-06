

<?php
include_once('../db/conexionPDO.php');
include("template/header.php");

// Verificar si se ha enviado un término de búsqueda
if (isset($_GET['term'])) {
    $term = $_GET['term'];

    // Realizar la consulta para obtener toda la información relacionada con la persona
    $query = "
        SELECT *
        FROM asignacion
        WHERE nom_per LIKE :term OR ape_per LIKE :term OR doc_per LIKE :term
           OR nom_cargo LIKE :term
    ";
    $stmt = $conexion->prepare($query);
    $stmt->bindValue(':term', '%' . $term . '%', PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container mt-5">
    <h2>Resultados de la búsqueda</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Cargo</th>
                <th>Elemento</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <!-- Agrega más columnas aquí según tus necesidades -->
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($results)) {
                foreach ($results as $row) {
                    echo "<tr>";
                    echo "<td>{$row['id_per']}</td>";
                    echo "<td>{$row['nom_per']}</td>";
                    echo "<td>{$row['ape_per']}</td>";
                    echo "<td>{$row['doc_per']}</td>";
                    echo "<td>{$row['nom_cargo']}</td>";
                    echo "<td>{$row['Dotacion']}</td>";
                    echo "<td>{$row['Cantidad']}</td>";
                    echo "<td>{$row['Fecha']}</td>";
                    // Agrega más celdas aquí según tus necesidades
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php include("template/footer.php"); ?>