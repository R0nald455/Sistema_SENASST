<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles_inventarios.css">
    <title>Entrada | Inventarios</title>
</head>
<body>


        <?php
        
        session_start();
        error_reporting(0);

        require_once ("../../db/conexion.php");

       ?>

        <header id="header-administrador">
            <a href="../index.php"><img src="../../img/LogoSena.png" alt="logosena"></a>
            <h1>Entrada de implementos</h1>
        </header>

        <div class="container-form-table">
            <form action="../php/script_entrada.php" method="post" class="container">

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

                    <input type="submit" value="Registrar entrada" class="btn btn-success" name="btn_registrar">
                    <input type="submit" value="Actualizar entrada" class="btn btn-info" name="btn_actualizar">
                    <input type="submit" value="Eliminar entrada" class="btn btn-danger" name="btn_eliminar">

            </form>

        <div class="container-tabla table-responsive-lg">
                <table class="table table-striped table-dark " id= "table_id">
                    <thead>
                        <tr>
                            <th class="bg-success">ID_Entradas</th>
                            <th class="bg-success">ID_Implementos</th>
                            <th class="bg-success">Fecha</th>
                            <th class="bg-success">Cantidad</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        $SQL = "SELECT * FROM tblentradas";
                        $dato = mysqli_query($conexion, $SQL);

                        if($dato -> num_rows > 0){
                            while($fila = mysqli_fetch_array($dato)){
                        ?>
                            <tr>
                                <td><?php echo $fila['ID_Entradas']; ?></td>
                                <td><?php echo $fila['ID_Implementos']; ?></td>
                                <td><?php echo $fila['Fecha']; ?>  </td>
                                <td><?php echo $fila['Cantidad']; ?></td>            
                            </tr>

                        <?php
                            }
                        } else{
                        ?>
                        <tr class="text-center">
                            <td colspan="16">No existen registros</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        
    </body>
</html>