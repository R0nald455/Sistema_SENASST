<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body id="page-top">

    <form action="./Model/registrar.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <h1 class="text-center">Nuevo Registro</h1>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <br>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label>
                                <br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Telefono *</label>
                                <br>
                                <input type="tel" id="telefono" name="telefono" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="rol" class="form-label">Rol de usuario *</label>
                                <br>
                                <input type="number" id="rol" name="rol" class="form-control" placeholder="Escribe el rol: 1 admin, 2 lector">
                            </div>
                            <br>
                            <br>
                            <div class="mb-3">

                                <input type="submit" value="Guardar" class="btn btn-success" name="registrar">
                                <a href="./View/user.php" class="btn btn-danger">Cancelar</a>

                            </div>
                        
                        </div>

                    </div>

                </div>

            </div>

        </div>


    </form>
</center>
</body>
</html>