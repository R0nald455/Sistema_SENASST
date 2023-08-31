<?php include("template/header.php"); ?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Crud Inventario</h1>
        <p class="col-md-8 fs-4">En esta página, podrás insertar datos y visualizar la información de un inventario. Nuestro objetivo es proporcionarte una herramienta sencilla y eficiente para gestionar tus activos.</p>
        <br>
        <label>
            <h2>Buscar Persona</h2>
            <br>
            <p>Detalles Generales de la Persona y su Asignación Correspondiente</p>
        </label>
        <form class="d-flex mb-3" action="buscar.php" method="GET">
            <input class="form-control me-2" type="search" name="term" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
    </div>
</div>

<?php include("template/footer.php"); ?>