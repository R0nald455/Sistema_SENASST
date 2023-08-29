<?php
session_start();
error_reporting(0);
require_once ("../../db/conexion.php");
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>

      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/27e58a102f.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <link rel="stylesheet" href="../../css/header.css">
      <title>Usuarios</title>
      
    </head>

    <?php if(isset($_SESSION["id"]) ): ?>

          <!-- Menu de navegacion-->

      <div class="container__menu">

      <div class="menu">

        <input type="checkbox" id="check__menu">
        <label for="check__menu" class="lbl-menu">
          <span id="spn1"></span>
          <span id="spn2"></span>
          <span id="spn3"></span>
        </label>

        <img id="logoResponsive" src="../../img/LogoSenaBlanco.png"  width="70px" alt="logoSena">


        <nav>
          <ul>
            <li><img src="../../img/LogoSenaBlanco.png"  width="70px" alt="logoSena"></li>
            <li><a href="../../php/rolFuncionario/indexadministrador.php" id="selected">Inicio</a></li>
            <li><a onclick="window.location.href='../../php/rolFuncionario/indexadministrador.php'"><span class="material-symbols-outlined">Salir</span></a></li>
          </ul>
        </nav>
      </div>
      </div>
      <div class="container is-fluid">
          <div class="col-xs-12">
            <h1>Bienvenido</h1>
            <br>
            <br>
            <h1>Lista de Usuarios</h1>
            <br>
            <br>
            <div>
              
              <a class="btn btn-success" href="../index.php">Agregar Nuevo  
              <i class="fa-solid fa-plus" style="color: #ffffff;"></i></a> 
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
                    <a class="btn btn-success" href="editarUsuario.php?id=<?php echo $fila['id']?> ">
                    <i class="fa-solid fa-pen-to-square" style="color: #f2eded;"></i> </a>

                    <a class="btn btn-danger" href="../Model/eliminar.php?id=<?php echo $fila['id']?>">
                    <i class="fa-solid fa-trash-can" style="color: #f2eded;"></i></i></i></a>
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

<?php else:?>
  <script>
      alert("No has iniciado sesión, por favor inicia a continuación.");
      window.location.href = "../../../php/login.php";
  </script>
<?php endif; ?>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
            <script src="../js/user.js"></script>
</html>
