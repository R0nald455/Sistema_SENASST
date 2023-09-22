<?php
      include '../../db/conexion.php';
        error_reporting(0);
        if(isset($_POST['btn_registrar']))
        {      
          $id=$_POST['id'];
          $opcion=$_POST['miCombo'];
          $num_resol=$_POST['num_resol'];
          $concepto=$_POST['concepto'];
          $descripcion=$_POST['descripcion'];
            

          switch ($opcion) {
            case "trabajo":
                $tablaName="normas_trab";
                break;
            case "invima":
                $tablaName="normas_hig";
                break;
            case "agricultura":
                $tablaName="normas_ica";
                break;
            case "aprendiz":
                $tablaName="normas_apren";
                break;
        }



        $query = "INSERT INTO `$tablaName`( `num_resol`, `concepto`, `descripcion`) 
        values ('$num_resol','$concepto','$descripcion')";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            echo "<center><h1>Registro insertado correctamente</h1></center>";
            header('Location:../index.php');
        exit();
        } else {
            header('Location:../index.php');
        }

            
          }
          
        
        ?>