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
    <link rel="stylesheet" type="text/css" href="../css/contenidos.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
  </head>
  <body>
  <?php if(isset($_SESSION["id"]) ): ?>

      <div class="container-fluid">
          <div class="row">
              <div class="col-md">
                <header>
                    <a href="index.php"><img src="../img/LogoSena.png" alt="logosena"></a>
                </header>
              </div>
          </div>
      </div>


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
            <strong>Publicado!</strong> Publicacion realziada perfectamente!!!!.
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><b>Nueva Publicación  </b></center></div>
                    <form name="p-4" id="p-4" method="post" action="insertar.php" autocomplete="off" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Titulo: </label>
                            <input type="text" class="form-control"   name="txtTitulo"  autofocus required>
                        </div>
                        <div class="mb-3"> 
                            <label class="form-label"> Descripción</label>
                            <input type="text" class="form-control"   name="txtDescripcion" autofocus required>
                        </div>
                        <h5 >Seleccione imagen a cargar</h5>
                            <div class="mb-3">
                                <input type="file" class="form-control" id="image" name="image" multiple>
                            </div>
                            <div class="d-grid">
                                
                                <button name="submit" class="btn btn-primary" id="BotonPublicar">Publicar</button>
                            </div>
                        
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../Footer/footer.php' ?>

    <?php else:?>

    <h1>No has iniciado sesion.</h1>

    <?php endif; ?>

        </body>
</html>