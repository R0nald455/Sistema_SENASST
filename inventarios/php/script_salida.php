<?php

include '../../db/conexion.php';

$tablaImplementos = "TblImplementos";
$tablaEntradas = "TblEntradas";
$tablaSalidas = "TblSalidas";

if(isset($_POST['btn_consultar']))
{

    $id_salidas = $_POST["id_salidas"];

    $existe=0;

    if($id_salidas == "")
    {
        echo "El id esta vacio, por favor escriba un id";
    } 
    else {
        echo "Presiono el boton consultar <br>";
    $resultados = mysqli_query($conexion, "SELECT id_salidas, id_implementos, fecha, cantidad FROM $tablaSalidas WHERE id_salidas = '$id_salidas'");
        while ($consulta = mysqli_fetch_array($resultados))
        {
            echo $consulta['id_salidas']."<br>";
            echo $consulta['id_implementos']."<br>";
            echo $consulta['fecha']."<br>";
            echo $consulta['cantidad']."<br>";
            $existe++;
        }
        if($existe == 0)
        {
            echo "El ID no exite, por favor ingrese uno que si exista";
        }
    }

    
}

if(isset($_POST['btn_registrar']))
{
    $id_salidas=$_POST["id_salidas"];
    $id_implementos=$_POST["id_implementos"];
    $fecha=$_POST["fecha"];
    $cantidad=$_POST["cantidad"];
    $id_empleado=$_POST["id_empleado"];

    if($id_salidas == "" || $id_implementos == "" || $fecha == "" || $cantidad == "" || $id_empleado == "")
    {
        echo "Los campos anteriores son obligatorios, por favor insertarlos";
    } 
    else {

        echo "Presiono el boton registrar <br>";
        
        mysqli_query($conexion, "INSERT INTO $tablaSalidas (id_salidas, id_implementos, fecha, cantidad, id_empleado) values ('$id_salidas', '$id_implementos', '$fecha', '$cantidad', $id_empleado);");
        $sql = "UPDATE $tablaImplementos SET cantidad = cantidad - $cantidad WHERE id_implementos = $id_implementos";
        if ($conexion->query($sql) === TRUE) {
            echo "El valor de cantidad se ha restado correctamente.";
        } else {
            echo "Error al actualizar el valor: " . $conexion->error;
        }
    }
}

if(isset($_POST['btn_actualizar']))
{
    echo "Presiono el boton actualizar <br>";

    $id_salidas=$_POST["id_salidas"];
    $id_implementos=$_POST["id_implementos"];
    $fecha=$_POST["fecha"];
    $cantidad=$_POST["cantidad"];
    $id_empleado=$_POST["id_empleado"];

    if($id_salidas == "" || $id_implementos == "" || $fecha == "" || $cantidad == "" || $id_empleado == "")
    {
        echo "Los campos anteriores son obligatorios, por favor insertarlos";
    } 
    else { 
        $existe = 0;
        $resultados = mysqli_query($conexion, "SELECT * FROM $tablaSalidas WHERE id_salidas = '$id_salidas'");
        while ($consulta = mysqli_fetch_array($resultados))
        {
            $existe++;
        }
        if($existe == 0)
        {
            echo "El ID no exite, por favor ingrese uno que si exista";
        } else {
            $_UPDATE_SQL = "UPDATE $tablaSalidas SET id_salidas = '$id_salidas', id_implementos = '$id_implementos', fecha = '$fecha', cantidad = '$cantidad', id_empleado = '$id_empleado' WHERE id_salidas = '$id_salidas' ";
            mysqli_query($conexion, $_UPDATE_SQL);

            $sql = "UPDATE $tablaImplementos SET cantidad = cantidad - $cantidad WHERE id_implementos = $id_implementos";
            if ($conexion->query($sql) === TRUE) {
                echo "El valor de cantidad se ha restado correctamente. <br>";
            } else {
                echo "Error al actualizar el valor: " . $conexion->error;
            }
            echo "Actualizacion correcta";
        }

    }

}

if(isset($_POST['btn_eliminar']))
{
    echo "Presiono el boton eliminar <br>";

    $id_salidas=$_POST["id_salidas"];

    $existe=0;

    if($id_salidas == "")
    {
        echo "El id esta vacio, por favor escriba un id";
    }
    else {
    $resultados = mysqli_query($conexion, "SELECT * FROM $tablaSalidas WHERE id_salidas = '$id_salidas'");
        while ($consulta = mysqli_fetch_array($resultados))
        {
            $existe++;
        }
        if($existe == 0)
        {
            echo "El ID no exite, por favor ingrese uno que si exista";

        } else {
            $_DELETE_SQL = "DELETE FROM $tablaSalidas WHERE id_salidas = '$id_salidas'";
            mysqli_query($conexion, $_DELETE_SQL);
        }
    }
}




?>