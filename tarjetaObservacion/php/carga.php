<?php
    include "../db/db.php";
    $regional=$_POST['regional'];
    $centro=$_POST['centro'];
    $direccion=$_POST['direccion'];
    $ciudad=$_POST['ciudad'];
    $lugar=$_POST['lugar'];
    $fecha=$_POST['fecha'];
    $remitente=$_POST['remitente'];
    $cargo=$_POST['cargo'];
    $tipo=$_POST['tipo'];
    $descripcion=$_POST['descripcion'];
    $consul="INSERT INTO `registros`(`id`, `regional`, `centro`, `direccion`, `lugar`, `fecha`, `nombre`, `cargo`, `tipo`, `descripcion`) 
                VALUES ('$regional','$centro','$direccion','$ciudad','$lugar','$fecha','$remitente','$cargo','$tipo','$descripcion') ";
    $resultado = mysqli_query($conex,$consul);
    if ($resultado) {
        ?>
        <h3 class="ok">se ha registrado correctamente</h3>
        <?php
    } else{
        echo" <h1>error al intentar insertar datos</h1>";
    }
?>
