<?php
include('conexion.php');

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$query = "SELECT id,Nombre, cantidad, imagen, fech_ven FROM inventario";
$result = $conexion->query($query);

function getThemeModeLink()
{
    if (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') {
        return '<a href="?theme=light">Modo Diurno</a>';
    } else {
        return '<a href="?theme=dark">Modo Nocturno</a>';
    }
}

if (isset($_GET['theme']) && ($_GET['theme'] === 'dark' || $_GET['theme'] === 'light')) {
    setcookie('theme', $_GET['theme'], time() + (86400 * 30), "/");
    header('Location: ' . $_SERVER['REQUEST_URI']);
}
?>

<!DOCTYPE html>
<html lang="Es">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta charset="utf-8">
    <style>
        
      .bg-light {
    background-color: #5eb319 !important;
}

   
      body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
      }

      .container {
          max-width: 1200px;
          margin: 0 auto;
          padding: 20px;
      }

     
      body[data-theme="light"] {
          background-color: #fff;
          color: #333;
      }

      body[data-theme="light"] .nav-bar {
          background-color: #f08c00;
      }

   
      body[data-theme="dark"] {
          background-color: #121212;
          color: #f0f0f0;
      }

      body[data-theme="dark"] .nav-bar {
          background-color: #f08c00;
      }

   
      .products-container {
          display: grid;
          grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
          gap: 20px;
          margin-top: 20px;
      }

      .product {
          border: 1px solid #ccc;
          border-radius: 8px;
          padding: 10px;
          text-align: center;
      }

      .image {
          width: 100px;
          height: 100px;
          border-radius: 8px;
          object-fit: cover;
          margin: 0 auto 10px;
      }

      .name {
          font-size: 18px;
          font-weight: bold;
          margin: 0;
          color: #5eb319;
      }

      .quantity {
          margin: 0;
        
      }

    
      .one-week-more-title {
          font-size: 24px;
          margin-top: 40px;
          color: #ff8c00;
      }

      .period-title {
          margin: 0;
      }

      .mode-icon {
          font-size: 24px;
          cursor: pointer;
      }


  </style>
</head>
<body data-theme="<?php echo (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') ? 'dark' : 'light'; ?>">
    <header class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="../../php/rolFuncionario/indexfuncionario.php">INICIO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="../html/agregar.html">agregar producto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../html/editar.php">editar producto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="entrada_salida.php">entrada y salida</a>
              </li>

            </ul>
            <button onclick="toggleTheme()">
              <i class="fas fa-adjust"></i>
            </button>
          </div>
        </div>
      </nav>
    </header>
    <main id="main" class="container">
        <div class="products-container">
            <?php
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $nombre = $row["Nombre"];
                $cantidad = $row["cantidad"];
                $imagen = base64_encode($row["imagen"]);
                $fechaVencimiento = $row["fech_ven"];
                
                $fechaActual = date('Y-m-d');
                $diasRestantes = intval((strtotime($fechaVencimiento) - strtotime($fechaActual)) / (60 * 60 * 24));
                $fechaVencimientoFormateada = date("d/m/Y", strtotime($fechaVencimiento));
            ?>
            <div class="product">
                CODIGO: <?php echo $id; ?>
                <p>Fecha de vencimiento: <?php echo $fechaVencimientoFormateada; ?></p>
                <img src="data:image/jpg;base64,<?php echo $imagen; ?>" alt="" class="image">
                <h2 class="name"><?php echo $nombre; ?></h2>
                <p class="quantity">Cantidad: <?php echo $cantidad; ?></p>
                <p>Días restantes: <?php 
                $dia=0;
                $dia2=2;
                if($dia>$diasRestantes){
                    echo"vencido";
                }else{
                    echo $diasRestantes." "."dias";
                }
                ?></p>
            </div>
            <?php
            }
            $result->free();
            ?>
        </div>
    </main>
    <script>
        function toggleTheme() {
            const currentTheme = document.body.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            document.body.setAttribute('data-theme', newTheme);
            document.cookie = "theme=" + newTheme + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
        }
    </script>
</body>
</html>
