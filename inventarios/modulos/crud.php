<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles_inventarios.css">
    <title>Administracion | Inventarios</title>
</head>
    <body>

        <?php
        
         session_start();
         error_reporting(0);

         require_once ("../../db/conexion.php");

        ?>

        <div class="container_administracion">
                <form action="../php/script_crud.php" method="post" class="container_form">

                <a href="index.php"><img src="../img/LogoSena.png" alt="" style="width: 90px; margin-top: 20px; "></a>

                <h1>Administracion de implementos.</h1>

                <div class="form-group">
                    <label for="id_implementos">ID: <input type="text" name="id_implementos" class="form-control campos" id="id_implementos" placeholder="Ingrese el ID del implemento..."></label>
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre: <input type="text" name="nombre" class="form-control campos" id="nombre" placeholder="Ingrese el nombre del implemento... "></label>   
                </div>

                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripción: <textarea name="descripcion" id="descripcion" class="form-control campos" style="min-height:50px; max-height:200px; resize: vertical;" placeholder="Ingrese la descripcion del implemento... " ></textarea></label>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria:
                    <select name="categoria" class="form-control campos" id="categoria">
                        <option value="Seguridad" selected>Seguridad</option>
                        <option value="Salud">Salud</option>
                        <option value="Herramienta">Herramienta</option>
                        <option value="Otro">Otro</option>
                    </select>
                </label>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad: <input type="number" name="cantidad" class="form-control campos" id="cantidad" placeholder="Ingrese la cantidad de implementos..."></label>
                </div>

                <div class="form-group">
                    <label for="ubicacion">Ubicacion:
                        <select name="ubicacion" class="form-control campos" id="ubicacion">
                            <option value="Almacen" selected>Almacen</option>
                            <option value="Auditorio">Auditorio</option>
                            <option value="Enfermeria">Enfermeria</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </label>
                </div>

                    <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
                    <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
                    <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">

            </form>

            <div class="container-tabla table-responsive-lg">
                <table class="table table-striped table-dark " id= "table_id">
                    <thead>
                        <tr>
                            <th class="bg-success">ID_Implementos</th>
                            <th class="bg-success">Nombre</th>
                            <th class="bg-success">Descripcion</th>
                            <th class="bg-success">Categoria</th>
                            <th class="bg-success">Cantidad</th>
                            <th class="bg-success">Ubicacion</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        $SQL = "SELECT * FROM tblimplementos";
                        $dato = mysqli_query($conexion, $SQL);

                        if($dato -> num_rows > 0){
                            while($fila = mysqli_fetch_array($dato)){
                        ?>
                            <tr>
                                <td><?php echo $fila['ID_Implementos']; ?></td>
                                <td><?php echo $fila['Nombre']; ?>  </td>
                                <td><?php echo $fila['Descripcion']; ?>  </td>
                                <td><?php echo $fila['Categoria']; ?></td>
                                <td><?php echo $fila['Cantidad']; ?></td>
                                <td><?php echo $fila['Ubicacion']; ?></td>             
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