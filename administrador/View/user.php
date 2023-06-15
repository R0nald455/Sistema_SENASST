<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar == ""){

  header("Location: ../Model/login.php");
  die();

}

require_once ("../../db/conexion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/fontawesome-all.min.css">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <title>Usuarios</title>
</head>

  <div class="container is-fluid">
      <div class="col-xs-12">
        <h1>Bienvenido Administrador <?php echo $_SESSION['nombre']; ?> </h1>
        <br>
        <br>
        <h1>Lista de Usuarios</h1>
        <br>
        <br>
        <div>
          
          <a class="btn btn-success" href="../Model/sesion/cerrarSesion.php">Cesion Cerrada
          <i class="fa fa-power-off" aria-hidden="true"></i></a> 
        </div>
        <br>
        <br>
        
        <table class="table table-striped table-dark " id= "table_id">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Telefono</th>
                <th>Fecha</th>
                <th>Rol</th>
                <th>Funciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // $conexion = mysqli_connect("localhost:3307","root","","SSTCBA");
              $SQL = "SELECT user.id, user.nombre, user.correo, user.password, user.telefono,
              user.fecha, permisos.rol FROM user LEFT JOIN permisos 
              ON user.rol = permisos.id";
              $dato = mysqli_query($conexion, $SQL);

              if($dato -> num_rows >0){
                while($fila = mysqli_fetch_array($dato)){
              ?>
              <tr>
                <td><?php echo $fila['nombre']; ?>  </td>
                <td><?php echo $fila['correo']; ?>  </td>
                <td><?php echo $fila['password']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['fecha']; ?>   </td>
                <td><?php echo $fila['rol']; ?>     </td>
              
              <td>
                <a class="btn btn-success" href="editar_user.php?id=<?php echo $fila['id']?> ">
                <i class="fa fa-edit"></i> </a>

                <a class="btn btn-danger" href="eliminar_user.php?id=<?php echo $fila['id']?>">
                <i class="fa fa-trash"></i></a>
              </td>              
              </tr>

              <?php
              }
              }else{
                ?>
                <tr class="text-cente">
                  <td colspan="16">No existen registros</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script src="../js/user.js"></script>
</html>
