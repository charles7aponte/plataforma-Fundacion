<?php    
    $accion = $_GET["accion"];

    if(isset($accion)){
        require_once('../include_dao.php');
        
        if($_GET["accion"] == 'inventarios'){
            require_once("inventarios.php");   
            $reporte = new reporte_inventarios();
            $f_inicial = isset($_GET['fecha_inicial']) ? $_GET['fecha_inicial'] : "";
            $f_final = isset($_GET['fecha_final']) ? $_GET['fecha_final'] : "";
            $activo = isset($_GET['activo']) ? $_GET['activo'] : "";
            $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : "";
            
            echo json_encode($reporte->generarReporte($f_inicial, $f_final, $activo, $categoria))   ;            
        }
        
        if($_GET["accion"] == 'ingresos-egresos'){
            require_once("ingresos-egresos.php");
            $reporte = new reporteIngresos();            
            $mes_inicial = "";
            $mes_final = "";            
            if(isset($_GET["mes_inicial"]))
            {
                $mes_inicial = $_GET["mes_inicial"];
                if(isset($_GET["mes_final"]) && $_GET["mes_final"] > $_GET["mes_inicial"]){
                    $mes_final = $_GET["mes_final"];
                }                    
            }
            
            echo json_encode($reporte->generarReporte($mes_inicial, $mes_final));           
        }
        if($_GET["accion"] == 'ingresos-egresosDetalle'){
            require_once("ingresos-egresos.php");
            $reporte = new reporteIngresos();            
            $mes_inicial = "";
            $mes_final = "";            
            if(isset($_GET["mes_inicial"]))
            {
                $mes_inicial = $_GET["mes_inicial"];
                if(isset($_GET["mes_final"]) && $_GET["mes_final"] > $_GET["mes_inicial"]){
                    $mes_final = $_GET["mes_final"];
                }                    
            }
            
             echo json_encode($reporte->getDetalleContabilidad($mes_inicial, $mes_final));
        }
    }    
?>

