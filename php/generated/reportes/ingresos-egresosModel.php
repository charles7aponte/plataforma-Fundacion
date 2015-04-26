<?php
    class ingresos_egresos{
        var $year;
        var $mes;
        var $valor;
        var $tipo;
    }    
    
    class reporte_ingresos_egresos{
        var $year;
        var $mes;
        var $ingreso;
        var $egreso;
    }
    
    class reporte_ingresos_egresos_detalle{
        var $fecha;
        var $tipo_tx;
        var $valor;
        var $concepto;
        var $beneficiario;
    }
?>
