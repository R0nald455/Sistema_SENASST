<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Administracion | Inventarios</title>
</head>
<body>
<center>
             <form action="../php/script_crud.php" method="post" class="container">

            <center> <a href="index.php"><img src="../img/LogoSena.png" alt="" style="width: 90px; margin-top: 20px; "></a> </center> 

            <h1>Administracion de implementos.</h1>

            <div class="form-group">
                <label for="id_implementos">ID: </label>
                <input type="text" name="id_implementos" class="form-control" id="id_implementos" placeholder="Ingrese el ID del implemento...">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre del implemento... ">
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" style="resize: vertical;" placeholder="Ingrese la descripcion del implemento... " ></textarea>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria: </label>
                <input type="text" name="categoria" class="form-control" id="categoria" placeholder="Ingrese a que categoria pertenece el implemento...">
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad: </label>
                <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Ingrese la cantidad de implementos...">
            </div>

            <div class="form-group">
                <label for="ubicacion">Ubicacion: </label>
                <input type="text" name="ubicacion" class="form-control" id="ubicacion" placeholder="Ingrese la ubicacion del implemento...">
            </div>

            <center>
                <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
                <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
                <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
                <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
            </center>
            <br>
</body>
</html>