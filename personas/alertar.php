<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brigadistas</title>
  <!-- custom css file link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/alertar.css">
  <link rel="stylesheet" href="../css/header.css">
</head>

<body>



  <!-- Menu de navegacion-->

  <div class="container__menu">

    <div class="menu">

      <input type="checkbox" id="check__menu">
      <label for="check__menu" class="lbl-menu">
        <span id="spn1"></span>
        <span id="spn2"></span>
        <span id="spn3"></span>
      </label>

      <img id="logoResponsive" src="../img/LogoSenaBlanco.png" width="70px" alt="logoSena">


      <nav>
        <ul>
          <li><img src="../img/LogoSenaBlanco.png" width="70px" alt="logoSena"></li>
          <li><a href="../index.php" id="selected">Inicio</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="container mt-5" id="maestro">
    <?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Alertados!</strong> Alerta Enviada!!!!.
      </div>
      <?php
    }
    ?>

    <?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentarlo!!!!.
      </div>
      <?php
    }
    ?>



    <div class="row justify-content-center">
      <div class="col-md-10" id="container">
        <div class="card">
          <form name="p-4" id="p-4" method="post" action="enviarAlerta.php" autocomplete="off"
            enctype="multipart/form-data">
            <div class="mb-3 text-center">
              <h1 class="heading">Envianos tu ubicación, para poder ayudarte!!!</h1>
            </div>
            <div class="mb-3">
              <select id="contexto" name="contexto" onchange="mostrarOtro()">
                <option selected>Seleccione</option>
                <option value="Auditorio">Auditorio</option>
                <option value="Administración">Administración</option>
                <option value="Bloque A">Bloque A</option>
                <option value="Bloque B">Bloque B</option>
                <option value="Bloque C">Bloque C</option>
                <option value="Biblioteca">Biblioteca</option>
                <option value="Coliseo">Coliseo</option>
                <option value="Cafetería">Cafetería</option>
                <option value="otro">Otro</option>
              </select>
              <div id="otroRiesgo" style="display: none;">
                <label for="otroRiesgoInput">Cual:</label>
                <input type="text" id="otroRiesgoInput" name="otroRiesgoInput">
              </div>
              </p>
            </div>
            <div class="d-grid">
              <button name="submit" class="btn" id="BotonAlertar">Alertar!</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="script2.js"></script>
</body>

</html>