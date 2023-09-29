<head>
  <link rel="stylesheet" type="text/css" href="../css//now.css">
</head>

<body>
  <div>

    <?php
    //error_reporting(0);
    include("../db/conexion.php");


    // Recibimos los datos del formulario
    $names = $_POST['names'];
    $condicion = $_POST['condicion'];
    $mision = $_POST['contexto'];
    $situacion = $_POST['situacion'];

    $laimagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $query = "INSERT INTO observacion (nombre,Condicion, Lugar, Foto, contexto) 
VALUES ('$names', '$condicion', '$mision','$laimagen', '$situacion')";

    $resultado = mysqli_query($conexion, $query);

    // Verificamos si el insert fue exitoso
    if ($resultado) {

    ?>

      <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
      <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">

      <style>
        .alerta-popper {
          font-family: "Popper", sans-serif;
        }
      </style>

      <script type="text/javascript">
        Swal.fire({
          imageUrl: 'https://i.imgur.com/y733h8m.gif',
          imageHeight: 200,
          imageAlt: 'SST Confirmacion',
          title: '<strong>¡Registro exitoso!</strong>',
          html: '<b>¡La tarjeta de observacion se ha registrado exitosamente!, pronto nuestros funcionarios/brigadistas se encargaran de mitigar el riesgo.</b> ',
          focusConfirm: false,
          confirmButtonText: '<a href="crear.php"><button style="text-decoration: none; color: white; background-color: #7066e0; border: none; width: 100px; height: 50px;""">Entendido!</button></a> ',
          confirmButtonAriaLabel: 'Thumbs up, great!',
          allowOutsideClick: false,
          allowEscapeKey: false,
          allowEnterKey: false,
          customClass: {
            container: "alerta-popper"
          }
        })
      </script>

    <?php

    } else {
      echo "Error al insertar el registro: " . mysqli_error($conexion);
    }



    // Cerramos la conexión
    mysqli_close($conexion);


    ?>
  </div>
</body>