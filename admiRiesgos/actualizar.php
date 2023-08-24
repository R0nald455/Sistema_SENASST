<?php
session_start();
error_reporting(0);
require_once ("../db/conexion.php");
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Registro Materiales</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../css/admiRiesgos.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
  </head>
  <body>
  <?php if(isset($_SESSION["id"]) ): ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Diligencia todos los campos!!!.
            </div>
            <?php 
                }
            ?>

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Publicado!</strong> Estado actulizado perfectamente!!!!.
            </div>
            <?php 
                }
            ?>   
            
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentarlo!!!!.
            </div>
            <?php 
                }
            ?>   

            <!-- fin alerta -->
        </div>



        <?php

            include( '../db/conexion.php');


            // Consulta para obtener los datos de la tabla "usuarios".
            $id=$_GET['id'];
            $sql = 'SELECT * FROM tobservacion WHERE id='.$id;
            $resultado = mysqli_query($conexion, $sql);
            $x=1;
            // Mostrar los datos en la tabla.
            while ($fila = mysqli_fetch_assoc($resultado)) {?>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center><b>Actualizar tarjeta de observación</b></center></div>
                    <form name="p-4" id="p-4" method="post" action="actualizarEstado.php" autocomplete="off" enctype="multipart/form-data">
                        <div class="mb-3">
                            
                            <label class="form-label">Fecha: </label>
                            <p><?php echo $fila['fecha']?></p>
                        </div>
                        <div class="mb-3"> 
                            <label class="form-label"> Lugar:</label>
                            <p><?php echo $fila['lugar']?></p>
                        </div>
                        <div class="mb-3"> 
                            <label class="form-label"> Tipo:</label>
                            <p><?php echo $fila['tipo']?></p>
                        </div>
                        <div class="mb-3"> 
                            <label class="form-label"> Descripción:</label>
                            <p><?php echo $fila['descripcion']?></p>
                        </div>
                        <div class="mb-3"> 
                            <label class="form-label"> Foto del riesgo:</label>
                            <?php echo "
                            <input type='hidden' name='riesgo_id' value='".$fila['id']."'>
                            <img src='http://localhost/SISTEMA_SENASST/admiRiesgos/consultarImagen.php?id=".$fila['id']."'  width='400px' class='img-responsive'  alt='Imagen'>"?>
                            
                        </div>
                        <div class="mb-3"> 
                            <label class="form-label"> Estado:</label>
                            <select name="estado" id="estado">
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="Mitigado">Mitigado</option>
                            </select>
                        </div>   
                                <button name="submit" class="botonActualizar">Actualizar</button>
                </form>
                <a href="index.php"><button class="botonVolver">Volver</button></a>
            </div>
        </div>
    </div>
</div>


    <?php 
 $x++;
}
            // Liberar el resultado y cerrar la conexión.
            mysqli_free_result($resultado);
            mysqli_close($conexion);
else:?>

    <h1>No has iniciado sesion.</h1>

    <?php endif; ?>

        </body>
</html>