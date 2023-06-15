<?php

include '../../db/conexion.php';

$tablaImplementos = "TblImplementos";
$tablaEntradas = "TblEntradas";
$tablaSalidas = "TblSalidas";

if(isset($_POST['btn_consultar']))
{

    $id_implementos = $_POST["id_implementos"];

    $existe=0;

    if($id_implementos == "")
    {
        echo "El id esta vacio, por favor escriba un id";
    } 
    else {
        echo "Presiono el boton consultar <br>";
    $resultados = mysqli_query($conexion, "SELECT id_implementos, nombre, descripcion, categoria, cantidad, ubicacion FROM $tablaImplementos WHERE id_implementos = '$id_implementos'");
        while ($consulta = mysqli_fetch_array($resultados))
        {
            echo $consulta['id_implementos']."<br>";
            echo $consulta['nombre']."<br>";
            echo $consulta['descripcion']."<br>";
            echo $consulta['categoria']."<br>";
            echo $consulta['cantidad']."<br>";
            echo $consulta['ubicacion']."<br>";
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
    $id_implementos=$_POST["id_implementos"];
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $categoria=$_POST["categoria"];
    $cantidad=$_POST["cantidad"];
    $ubicacion=$_POST["ubicacion"];

    if($id_implementos == "" || $nombre == "" || $descripcion == "" || $categoria == "" || $cantidad == "" || $ubicacion == "")
    {
        echo "Los campos anteriores son obligatorios, por favor insertarlos";
    } 
    else {
        echo "Presiono el boton registrar <br>";
        
        mysqli_query($conexion, "INSERT INTO $tablaImplementos (id_implementos, nombre, descripcion, categoria, cantidad, ubicacion) values ('$id_implementos', '$nombre', '$descripcion', '$categoria', '$cantidad', '$ubicacion')");
       
    }
}

if(isset($_POST['btn_actualizar']))
{
    echo "Presiono el boton actualizar <br>";

    $id_implementos=$_POST["id_implementos"];
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $categoria=$_POST["categoria"];
    $cantidad=$_POST["cantidad"];
    $ubicacion=$_POST["ubicacion"];

    if($id_implementos == "" || $nombre == "" || $descripcion == "" || $categoria == "" || $cantidad == "" || $ubicacion == "")
    {
        echo "Los campos anteriores son obligatorios, por favor insertarlos";
    } 
    else { 
        $existe = 0;
        $resultados = mysqli_query($conexion, "SELECT * FROM $tablaImplementos WHERE ID_Implementos = '$id_implementos'");
        while ($consulta = mysqli_fetch_array($resultados))
        {
            $existe++;
        }
        if($existe == 0)
        {
            echo "El ID no exite, por favor ingrese uno que si exista";
        } else {
            $_UPDATE_SQL = "UPDATE $tablaImplementos SET ID_Implementos = '$id_implementos', Nombre = '$nombre', Descripcion = '$descripcion', Categoria = '$categoria', Cantidad = '$cantidad', Ubicacion = '$ubicacion' WHERE ID_Implementos = '$id_implementos' ";
            mysqli_query($conexion, $_UPDATE_SQL);
            echo "Actualizacion correcta";
        }

    }

}

if(isset($_POST['btn_eliminar']))
{
    echo "Presiono el boton eliminar <br>";

    $id_implementos=$_POST["id_implementos"];

    $existe=0;

    if($id_implementos == "")
    {
        echo "El id esta vacio, por favor escriba un id";
    } 
    else {
    $resultados = mysqli_query($conexion, "SELECT id_implementos, nombre, descripcion, categoria, cantidad, ubicacion FROM $tablaImplementos WHERE id_implementos = '$id_implementos'");
        while ($consulta = mysqli_fetch_array($resultados))
        {
            $existe++;
        }
        if($existe == 0)
        {
            echo "El ID no exite, por favor ingrese uno que si exista";

        } else {
            $_DELETE_SQL = "DELETE FROM $tablaImplementos WHERE id_implementos = '$id_implementos'";
            mysqli_query($conexion, $_DELETE_SQL);
        }
    }
}




?>