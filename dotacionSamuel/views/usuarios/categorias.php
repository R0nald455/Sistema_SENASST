<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<head>
    <!-- ... Otras etiquetas head ... -->
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <div class="row">
        <div class="col-sm-4">
<a class="catelectronico" href="productosCategoria.php?categoria=<?php echo 'Brigadistas'?>">
Brigadistas
</a>
        </div>
<div class="col-sm-4">
<a class="catcocina" href="productosCategoria.php?categoria=<?php echo 'Análisis y Desarrollo de Software'?>">
Análisis y Desarrollo de Software
</a>
</div>  
<div class="col-sm-4">
<a class="catfarmaceutico" href="productosCategoria.php?categoria=<?php echo 'Agrobiotecnología '?>">
Agrobiotecnología 
</a>
</div>  
</div>
<div class="row">
<div class="col-sm-4">
<a class="catjugueteria" href="productosCategoria.php?categoria=<?php echo 'Asistencia Administrativa'?>">
Asistencia Administrativa</a>
</div>

<div class="col-sm-4">
<a class="catmascotas" href="productosCategoria.php?categoria=<?php echo 'Construcción de edificaciones'?>">
Construcción de edificaciones</a>
</div>
<div class="col-sm-4">
<a class="catautomovilstico" href="productosCategoria.php?categoria=<?php echo 'Control y calidad de alimentos'?>">
Control y calidad de alimentos
</a>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<a class="catvestimenta" href="productosCategoria.php?categoria=<?php echo 'Gestión de talento humano'?>">
Gestión de talento humano
</a>
</div>
<div class="col-sm-4">
<a class="cattelefonia" href="productosCategoria.php?categoria=<?php echo 'Nómina y prestaciones sociales'?>">
Nómina y prestaciones sociales

</a>
</div>
<div class="col-sm-4">
<a class="catdeportes" href="productosCategoria.php?categoria=<?php echo 'Instructores'?>">
Instructores
</a>
</div>
</div>
<div class="row">
    <div class="col-sm-12">
        <input class="soon" type="button" value="Mas categorias proximamente">
    </div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>