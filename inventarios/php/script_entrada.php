<?php

include '../../db/conexion.php';

$tablaImplementos = "TblImplementos";
$tablaEntradas = "TblEntradas";
$tablaSalidas = "TblSalidas";

if(isset($_POST['btn_consultar']))
{

    $id_entradas = $_POST["id_entradas"];

    $existe=0;

    if($id_entradas == "")
    {
        echo "El id esta vacio, por favor escriba un id";
    } 
    else {
        echo "Presiono el boton consultar <br>";
    $resultados = mysqli_query($conexion, "SELECT id_entradas, id_implementos, fecha, cantidad FROM $tablaEntradas WHERE id_entradas = '$id_entradas'");
        while ($consulta = mysqli_fetch_array($resultados))
        {
            echo $consulta['id_entradas']."<br>";
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
    $id_entradas=$_POST["id_entradas"];
    $id_implementos=$_POST["id_implementos"];
    $fecha=$_POST["fecha"];
    $cantidad=$_POST["cantidad"];

    if($id_entradas == "" || $id_implementos == "" || $fecha == "" || $cantidad == "" )
    {
        echo "Los campos anteriores son obligatorios, por favor insertarlos";
    } 
    else {
        echo "Presiono el boton registrar <br>";
        
        mysqli_query($conexion, "INSERT INTO $tablaEntradas (id_entradas, id_implementos, fecha, cantidad) values ('$id_entradas', '$id_implementos', '$fecha', '$cantidad');");
        $sql = "UPDATE $tablaImplementos SET cantidad = cantidad + $cantidad WHERE id_implementos = $id_implementos";
        if ($conexion->query($sql) === TRUE) {
            echo "Valor actualizado correctamente.";
        } else {
            echo "Error al actualizar el valor: " . $conexion->error;
        }
    }
}

if(isset($_POST['btn_actualizar']))
{
    echo "Presiono el boton actualizar <br>";

    $id_entradas=$_POST["id_entradas"];
    $id_implementos=$_POST["id_implementos"];
    $fecha=$_POST["fecha"];
    $cantidad=$_POST["cantidad"];

    if($id_entradas == "" || $id_implementos == "" || $fecha == "" || $cantidad == "" )
    {
        echo "Los campos anteriores son obligatorios, por favor insertarlos";
    } 
    else { 
        $existe = 0;
        $resultados = mysqli_query($conexion, "SELECT * FROM $tablaEntradas WHERE id_entradas = '$id_entradas'");
        while ($consulta = mysqli_fetch_array($resultados))
        {
            $existe++;
        }
        if($existe == 0)
        {
            echo "El ID no exite, por favor ingrese uno que si exista";
        } else {
            $_UPDATE_SQL = "UPDATE $tablaEntradas SET id_entradas = '$id_entradas', id_implementos = '$id_implementos', fecha = '$fecha', cantidad = '$cantidad' WHERE id_entradas = '$id_entradas' ";
            mysqli_query($conexion, $_UPDATE_SQL);
            $sql = "UPDATE $tablaImplementos SET cantidad = cantidad + $cantidad WHERE id_implementos = $id_implementos";
            if ($conexion->query($sql) === TRUE) {
                echo "Valor actualizado correctamente. <br>";
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

    $id_entradas=$_POST["id_entradas"];

    $existe=0;

    if($id_entradas == "")
    {
        echo "El id esta vacio, por favor escriba un id";
    }
    else {
    $resultados = mysqli_query($conexion, "SELECT * FROM $tablaEntradas WHERE id_entradas = '$id_entradas'");
        while ($consulta = mysqli_fetch_array($resultados))
        {
            $existe++;
        }
        if($existe == 0)
        {
            echo "El ID no exite, por favor ingrese uno que si exista";

        } else {
            $_DELETE_SQL = "DELETE FROM $tablaEntradas WHERE id_entradas = '$id_entradas'";
            mysqli_query($conexion, $_DELETE_SQL);
        }
    }
}




?>