<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/registro.css">
    <link rel="icon" href="../img/LogoSena.png">
    <title>SENASST</title>
  </head>
  <body>
    <header>
      <a href="../index.php"><img src="../img/LogoSena.png" alt="logosena"></a>
      
    </header>
    <div class="contenedor">

    <!-- inicio alerta -->


            
      <div class="card">
        <h1>Formulario de registro</h1>
        <form action="registrarse.php" method="POST" autocomplete="on">
        <?php 
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alerta">
            <strong>Error!</strong> Diligencia un correo institucional.
            </div>
            <?php 
            }
            ?>




          <label for="documento">Documento</label>
          <input type="text" name="documento" class="documento"   placeholder="Ej: 1987665452" required>

          <label for="documento">Nombre</label>
          <input type="text" name="nombre" class="nombre"   placeholder="Ej: Juan Rincon" required>

          <label for="documento">email</label>
          <input type="email" name="email" class="email"   placeholder="Ej: Jrincon@soy.sena.edu.co" required>

          <label for="documento">Telefono</label>
          <input type="text" name="telefono" class="telefono"   placeholder="Ej: 3123234565" required>

          <label for="contrasena">Contraseña</label>
          <input type="password" name="contrasena" class="contrasena"  placeholder="Ej: JuanRincon312*" required> 
        
          <div class="botonEnviar">
          <input type="submit" class="enviar" value="Registrarse">
          </div>
          
        </form>
      </div>
    </div>
  </body>
</html>

