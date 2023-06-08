<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.css">
    <title>SENASST</title>
  </head>
  <body>
    <header>
      <img src="../img/LogoSena.png" alt="logosena">
    </header>
    <div class="contenedor">
      <div class="card">
        <h1>SENASST</h1>
        <form action="iniciarSesion.php" method="POST" autocomplete="off">
          <label for="documento">Usuario</label>
          <input type="text" name="documento" class="documento"   placeholder="Usuario" required>
          <label for="contrasena">Contraseña</label>
          <input type="password" name="contrasena" class="contrasena"  placeholder="Password" required>
          <input type="submit" class="enviar" value="Ingresar">
        </form>
      </div>
    </div>
  </body>
</html>

