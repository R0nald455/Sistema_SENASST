<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="icon" href="../img/LogoSena.png">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <title>SENASST</title>
</head>

<body>
  <header>
    <a href="../index.php"><img src="../img/LogoSena.png" alt="logosena"></a>

  </header>
  <div class="contenedor">
    <div class="card">
      <h1>SENASST</h1>
      <form id="login" action="iniciarSesion.php" method="POST" autocomplete="off">
        <label for="documento">Usuario</label>
        <input type="text" name="documento" class="documento" placeholder="Usuario" required>
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" class="contrasena" placeholder="Password" required>
        <!-- <a href="">has olvidado la contraseña?</a> -->
        <a href="registro.php">Regístrate</a>
        <input type="submit" class="enviar" value="Ingresar">
      </form>
    </div>
  </div>

  <?php
  if (isset($_SESSION['incorrecto']) && $_SESSION['incorrecto']) {
    echo '<script>
                                Swal.fire({
                                    icon: "error",
                                    title: "¡Credenciales incorrectas!",
                                    text: "Por favor, corrige e intenta ingresar nuevamente.",
                                });
                            </script>';
    $_SESSION['incorrecto'] = false; // Reinicia la variable de sesión
  }
  ?>

</body>

</html>