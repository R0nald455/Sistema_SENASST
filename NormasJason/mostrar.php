<?php
class normass{
    public function Consultar_normas(){        
        $conexion=connect();
        $sql="SELECT norma,Descripcion_Norm FROM tb_normatividad";
        $consulta=$conexion->query($sql);
        $consulta->execute();
        return $consulta;
        $con=null;
    }
}
?>