<?php
require_once("ingresos-egresosModel.php");
    class reporteIngresos{
          
        public function obtenerIngresosPorMes($mes_inicial, $mes_final){
            $retorno = array();
            $tab = DAOFactory::getIngresosDAO()->queryByMeses($mes_inicial, $mes_final);
            
            for($i=0;$i<count($tab);$i++){
                $retorno[$i] = new ingresos_egresos();
                $retorno[$i]->mes = $this->setMeses($tab[$i]["mes"]);
                $retorno[$i]->valor = $tab[$i]["valor"];
            }		
            
            return $retorno;
        }
        
        public function obtenerEgresosPorMes($mes_inicial, $mes_final){
            $retorno = array();
            
            $tab = DAOFactory::getEgresosDAO()->queryByMes($mes_inicial, $mes_final);
            
            for($i=0;$i<count($tab);$i++){
                $retorno[$i] = new ingresos_egresos();
                $retorno[$i]->mes = $this->setMeses($tab[$i]["mes"]);
                $retorno[$i]->valor = $tab[$i]["valor"];
            }		
            
            return $retorno;
        }
        
        public function generarReporte($mes_inicial, $mes_final){
            $ingresos = $this->obtenerIngresosPorMes($mes_inicial, $mes_final);
            $egresos = $this->obtenerEgresosPorMes($mes_inicial, $mes_final);         
            
            
            $reporte = array();
            
            $cont = 0;
            for($i = 0; $i<count($ingresos); $i++){
                //if(buscarCoincidencias($reporte, $ingresos->mes) == -1){
                    $reporte[$cont] = new reporte_ingresos_egresos();
                    $reporte[$cont]->mes = $ingresos[$i]->mes;                    
                    $reporte[$cont]->ingreso = $ingresos[$i]->valor;
                    $reporte[$cont]->egreso = 0;
                    $cont++;
                //}
            }
            $actual = "";            
            for($i = 0; $i<count($egresos); $i++){
                
                $actual = $this->buscarCoincidencias($reporte, $egresos[$i]->mes); 
                if($actual == -1){
                    $reporte[$cont] = new reporte_ingresos_egresos();
                    $reporte[$cont]->mes = $egresos[$i]->mes;                    
                    $reporte[$cont]->egreso = $egresos[$i]->valor;
                    $reporte[$cont]->ingreso = 0;
                    $cont++;
                }else{
                    $reporte[$actual]->egreso = $egresos[$i]->valor;
                }
            }
            
            return $reporte;
        }
        
        function getDetalleContabilidad($mesInicial,$mesFinal){
            $where = "";
            if($mesInicial != "" && $mesFinal != ""){
                $where = 'fecha BETWEEN STR_TO_DATE("'.$mesInicial.'", "%Y-%m-%d")  AND STR_TO_DATE("'.$mesFinal.'", "%Y-%m-%d") AND MONTH(fecha) BETWEEN MONTH("' . $mesInicial . '") AND MONTH("' . $mesFinal . '")';;                    
            }
            $tab = DAOFactory::getIngresosDAO()->queryByFechasDetalle($where);
            $tab2 = DAOFactory::getEgresosDAO()->queryByFechasDetalle($where);
            $retorno = array();
            $cont = 0;
            for($i = 0; $i < count($tab); $i++){
                $retorno[$cont] = new reporte_ingresos_egresos_detalle();
                $retorno[$cont]->fecha = $tab[$i]["fecha"];
                $retorno[$cont]->beneficiario = $tab[$i]["beneficiario"];
                $retorno[$cont]->concepto = $tab[$i]["concepto_de"];
                $retorno[$cont]->tipo_tx = "Ingresos";
                $retorno[$cont]->valor =$tab[$i]["valor"];
                $cont++;
            }
            
            for($i = 0; $i < count($tab2); $i++){
                $retorno[$cont] = new reporte_ingresos_egresos_detalle();
                $retorno[$cont]->fecha = $tab2[$i]["fecha"];
                $retorno[$cont]->beneficiario = $tab2[$i]["beneficiario"];
                $retorno[$cont]->concepto = $tab2[$i]["concepto_de"];
                $retorno[$cont]->tipo_tx = "Egresos";
                $retorno[$cont]->valor =$tab2[$i]["valor"];
                $cont++;
            }
            return $retorno;
        }
        
        
        function getYearRango(){
            $sql = 'select YEAR(ingresos.fecha) as fecha
                    from ingresos
                    left join egresos
                    on YEAR(ingresos.fecha) =  YEAR(egresos.fecha)
                    union
                    select YEAR(egresos.fecha)
                    from egresos
                    left join ingresos
                    on YEAR(egresos.fecha) =  YEAR(ingresos.fecha)';
            $sql_query = new SqlQuery($sql);
            $tab = QueryExecutor::execute($sql_query);
            print_r($tab);
            if(count($tab)> 0){
                $arreglo = array();
                for($i = 0; $i < count($tab); $i++){
                    $arreglo[$i] = $tab[$i]["fecha"];
                }
                return $arreglo;
            }
            return "";      
        }
        
        function buscarCoincidencias($arreglo, $mes){
            for($i = 0; $i < count($arreglo); $i++){                
                if($arreglo[$i]->mes == $mes){
                    return $i;
                }
            }            
            return -1;
        }
    
        function setMeses($valor){
            
            switch ($valor) {
                case 1:
                    return "Enero";
                case 2:
                    return "Febrero";
                case 3:
                    return "Marzo";
                case 4:
                    return "Abril";                    
                case 5:
                    return "Mayo";
                case 6:
                    return "Junio";
                case 7:
                    return "Julio";
                case 8:
                    return "Agosto";
                case 9:
                    return  "Septiembre";
                case 10:
                    return "Octubre";
                case 11:
                    return "Noviembre";
                case 12:
                    return "Diciembre";
            }
        }
        
    }
?>

