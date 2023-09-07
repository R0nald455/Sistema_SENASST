<?php 
    include("../conexion/connection.php");
    
    $id=$_GET['id'];

    $sql="SELECT * FROM inventariosalon WHERE id='$id'";
    $query=mysqli_query($conexion, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/style1.css" rel="stylesheet">
        <title>Editar articulo</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id']?>">
            <input type="text" name="articulo" id="articulo" placeholder="Articulo" value="<?= $row['articulo']?>">
            <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" value="<?= $row['cantidad']?>">

                <input type="submit" value="Actualizar" class="Actualizar">
            </form>
        </div>
    </body>
</html>