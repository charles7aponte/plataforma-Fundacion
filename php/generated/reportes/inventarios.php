<?php
    class reporte_inventarios{
        
        function generarReporte($f_inicial, $f_final, $activo, $categoria){
            $retorno = array();
            
            $where = "";
            if($activo != "")
                $where = "activo = ".$activo;                
            if($categoria != ""){
                if(strlen($where) > 0)
                    $where = $where." AND categoria = ".$categoria;
                else
                    $where = " categoria = ".$categoria;                
            }
            if($f_inicial != "" && $f_final != ""){
                if(strlen($where)> 0)
                    $where = $where. " AND fecha_ingreso BETWEEN STR_TO_DATE('".$f_inicial."', '%Y-%m-%d') AND STR_TO_DATE('".$f_final."', '%Y-%m-%d')";
                else
                    $where = " fecha_ingreso BETWEEN ".$f_inicial. " AND ".$f_final;
            }
            $tab = DAOFactory::getElementosDAO()->queryByActivoFechaCategoria($where);
            return $tab;
        }
    }
?>
