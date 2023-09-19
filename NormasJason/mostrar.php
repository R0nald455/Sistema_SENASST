<?php
class normass{
    public function Consultar_normas(){        
        $con=connect();
        $sql="SELECT norma,Descripcion_Norm FROM tb_normatividad";
        $consulta=$con->query($sql);
        $consulta->execute();
        return $consulta;
        $con=null;
    }
}
?>