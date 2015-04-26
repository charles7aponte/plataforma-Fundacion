<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
} else {
    require_once('funciones/login/iniciar_sesion.php');
    $sesion = new sesiones();

    $valor = $sesion->validarAccesoModulos($_SESSION["idUsuario"], "inventarios");
    if (count($valor) == 0) {
        header("location: pagina_error.php");
    }
}

include_once "php/generated/include_dao.php";
include_once "/php/generated/reportes/ingresos-egresos.php";
include_once "header.php";

$data_reporte = new reporteIngresos();
$tabla_reporte = $data_reporte->generarReporte("", "", "");
?>


<style>
    div.datepicker{
        z-index: 99999 !important;

    }


</style>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap-datepicker.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap-datepicker.es.js" type="text/javascript" charset="utf-8"></script>


<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/datepicker.css" type="text/css"/>


<script>

    jQuery.fn.reset = function () {
        $(this).each(function () {
            this.reset();
        });
    }


    function enviarDatos() {

        cargarTabla();
        //if($("#frmRegistrar").validationEngine('validate'))
        //{
        //document.getElementById("frmRegistrar").submit();

        //} 

        return false;

    }


    var mesInicialActual = "";
    var mesFinalActual = "";
    function cargarTabla() {        
        var mes_inicial = $("#mesInicial").val();
        var mes_final = $("#mesFinal").val();

        if (mes_inicial != "undefined" && mes_final != "undefined") {
            mesInicialActual = mes_inicial;
            mesFinalActual= mes_final;
            $.get("php/generated/reportes/reporte_service.php?accion=ingresos-egresos&mes_inicial=" + mes_inicial + "&mes_final=" + mes_final, function (data) {
                actualizarTabla(data);
            });
        }
    }

    function actualizarTabla(dato) {
        if (dato.length > 0) {
            var data = JSON.parse(dato);
            var xx = $("#cuerpoTabla > tr").remove();
            var htmll = "";
            for (var i = 0; i < data.length; i++) {
                htmll += '<tr role="row" class="odd">'                        
                        + '<td class="sorting_1">' + data[i].mes + '</td>'
                        + '<td>' + data[i].ingreso + '</td>'
                        + '<td>' + data[i].egreso + '</td>'
                        + '<td><img src=\'images/reload.png\' onclick="verDetalles()" alt=\'\' title="Ver detalle" "style=\'cursor: pointer;\' ></td>'
                        
                        + '</tr>';
            }
            $("#cuerpoTabla").html(htmll);
        }
    }
    
    function verDetalles(){        
        $.get("php/generated/reportes/reporte_service.php?accion=ingresos-egresosDetalle&mes_inicial=" + mesInicialActual + "&mes_final=" + mesFinalActual, function (data) {
                actualizarTablaDetalles(data);
            });
    }
    
    function actualizarTablaDetalles(dato) {
        if (dato.length > 0) {
            var data = JSON.parse(dato);
            var xx = $("#cuerpoTablaDetalle > tr").remove();
            var htmll = "";
            for (var i = 0; i < data.length; i++) {
                htmll += '<tr role="row" class="odd">'                        
                        + '<td class="sorting_1">' + data[i].fecha + '</td>'
                        + '<td>' + data[i].tipo_tx + '</td>'
                        + '<td>' + data[i].valor + '</td>'
                        + '<td>' + data[i].concepto + '</td>'
                        + '<td>' + data[i].beneficiario+ '</td>'                     
                        + '</tr>';
            }
            $("#cuerpoTablaDetalle").html(htmll);
        }
    }

</script>





<fieldset><legend><h1 id="titulo" style="text-align: center;">Generar reporte</h1></legend>

    <form name="frmRegistrar" id="frmRegistrar"  action="xxxx" method="GET" class="form-horizontal">

        <input type="hidden" name="accion" id="miaccion" value="generar">

        <div class="row">
            <!-- columna iz1-->            

            <div class="col-md-6 col-xs-2">

                <div class="form-group">                    


                    <div class="col-sm-9">
                        <label for="mesInicial" class="control-label">Selecciona mes inicial:</label>
                        <div class="col-sm-9">
                            <input type="text"  name="fecha_inicial" id="mesInicial"  readonly="readonly" class ="form-control mifecha" placeholder="Fecha final">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-xs-2">

                <div class="form-group">                    


                    <div class="col-sm-9">
                        <label for="mesFinal" class="control-label">Selecciona mes final:</label>
                        <div class="col-sm-9">
                            <input type="text"  name="fecha_inicial" id="mesFinal"  readonly="readonly" class ="form-control mifecha" placeholder="Fecha final">
                        </div>
                    </div>
                </div>

            </div>



        </div>

        <br />
        <button 
            onclick="enviarDatos()"
            type="button" class="btn btn-primary" style="margin-left: 100px;">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Filtrar</b>
        </button>	

    </form>
</fieldset>



<!---tabla #1--->
<br />
<br />
<br />
<br />

<table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
    <thead>
        <tr role="row">
            <th rowspan="1" colspan="1">Mes</th>
            <th rowspan="1" colspan="1">Ingreso(valor)</th>
            <th rowspan="1" colspan="1">Egreso(valor)</th>
            <th rowspan="1" colspan="1">Editar</th>
        </tr>
    </thead>
    <tbody id="cuerpoTabla"> 
        <?php
        for ($i = 0; $i < count($tabla_reporte); $i++) {
            echo '<tr role="row" class="odd">                                
                                <td class="sorting_1">' . $tabla_reporte[$i]->mes . '</td>
                                <td>' . $tabla_reporte[$i]->ingreso . '</td>
                                <td>' . $tabla_reporte[$i]->egreso . '</td>  
                                <td><img src=\'images/reload.png\' onclick="verDetalles()" alt=\'\' title="Ver detalle" "style=\'cursor: pointer;\' ></td>'.  						
                              '</tr>';
        }
        ?>

    </tbody>
    <tfoot>

    </tfoot>
</table>

<table id="detalleContabilidad" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
    <thead>
        <tr role="row">
            <th rowspan="1" colspan="1">fecha</th>
            <th rowspan="1" colspan="1">Tipo transacción</th>
            <th rowspan="1" colspan="1">Valor</th>
            <th rowspan="1" colspan="1">Concepto de</th>
            <th rowspan="1" colspan="1">Beneficiario</th>
        </tr>
    </thead>
    <tbody id="cuerpoTablaDetalle"> 
    </tbody>
    <tfoot>

    </tfoot>
</table>



<button 
    id="generar_asistente" onclick="generar()"
    type="button" class="btn btn-primary" style="margin-left: 100px;">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnGenerar">Imprimir reporte</b>
</button>
</br></br></br></br>        


<script>
    $("#frmRegistrar").validationEngine();

    $('.date').datepicker({language: "es"});
    $('.mifecha').datepicker({language: "es", format: 'yyyy-mm-dd'});
</script>


<?php
include_once "footer.php";
?>