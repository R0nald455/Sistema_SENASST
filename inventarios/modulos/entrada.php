<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Entrada | Inventarios</title>
</head>
<body>
<center>
            <form action="../php/script_entrada.php" method="post" class="container">

            <center> <a href="index.php"><img src="../img/LogoSena.png" alt="" style="width: 90px; margin-top: 20px; "></a> </center> 

            <h1>Entrada de implementos.</h1>

            <div class="form-group">
                <label for="id_entradas">ID_Entradas: </label>
                <input type="number" name="id_entradas" class="form-control" id="id_entradas" placeholder="Ingrese el ID de la entrada del implemento... ">
            </div>

            <div class="form-group">
                <label for="id_implementos">ID_Implementos: </label>
                <input type="number" name="id_implementos" class="form-control" id="id_implementos" placeholder="Ingrese el ID del implemento...">
            </div>

            <div class="form-group">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" name="fecha" class="form-control" id="fecha">
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad: </label>
                <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Ingrese la cantidad de implementos...">
            </div>

            <center>
                <input type="submit" value="Consultar entrada" class="btn btn-primary" name="btn_consultar">
                <input type="submit" value="Registrar entrada" class="btn btn-success" name="btn_registrar">
                <input type="submit" value="Actualizar entrada" class="btn btn-info" name="btn_actualizar">
                <input type="submit" value="Eliminar entrada" class="btn btn-danger" name="btn_eliminar">
            </center>
            <br>
</body>
</html>