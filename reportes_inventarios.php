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
include_once "php/generated/GeneraHTML.php";
include_once "header.php";

$data_reporte = new reporteIngresos();
$tabla_reporte = $data_reporte->generarReporte("", "", "");
?>  

<style>
    div.datepicker{
        z-index: 99999 !important;

    }
    
     .mifecha{
        cursor:text !important;
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
        if ($("#frmRegistrar").validationEngine('validate'))
        {
            document.getElementById("frmRegistrar").submit();
        }
        return false;
    }

    function changeCategoria(id, nombre)
    {
        $("#nombre_categoria").html("" + nombre);

        $("#id_categoria").val(id);
    }

    function nuevoElemento() {


        document.getElementById('frmRegistrar').reset();
        $("#titulo").html("Agregar asistente");
        $("#btnProcesar").html("Agregar");

        $("#miaccion").val("agregar");

        return false;
    }

    $(document).ready(function () {
        cargarTabla();
    });

    function cargarTabla() {
        var fechaInicial = $("#fecha_inicial").val();
        var fechaFinal = $("#fecha_final").val();
        var estado = $("#estado").val();
        var categoria = $("#id_categoria").val();
        
        var data = "";
        if(fechaInicial != "")
            data += "&fecha_inicial="+fechaInicial;
        if(fechaFinal != "")
            data += "&fecha_final="+fechaFinal;
        if(estado != "")
            data += "&activo="+estado;
        if(categoria != "")
            data += "&categoria="+categoria;
        console.log(data);
        
        $.get("php/generated/reportes/reporte_service.php?accion=inventarios" + data,function(data){
                    actualizarTabla(data);
                }); 
    }
    
    function actualizarTabla(dato) {
        if (dato.length > 0) {
            var data = JSON.parse(dato);
            var xx = $("#cuerpoTabla > tr").remove();
            var htmll = "";
            for (var i = 0; i < data.length; i++) {
                htmll += '<tr role="row" class="odd">'
                        + '<td class="sorting_1">' + data[i].nombre + '</td>'
                        + '<td>' + data[i].activo + '</td>'
                        + '<td>' + data[i].cantidad + '</td>'
                        + '<td>' + data[i].precio + '</td>'
                        + '<td>' + data[i].fechaIngreso + '</td>'                
                        + '</tr>';
            }
            $("#cuerpoTabla").html(htmll);
        }
    }


</script>





<fieldset><legend><h1  style="text-align: center;"></h1></legend>

    <input type="hidden" name="accion" id="miaccion" value="generar">



    <div class="row">
        <div class="form-horizontal">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><h4 id="titulo">Generar reporte</h4></center></h3>
                </div>
                <div class="panel-body" style="background-color: rgb(197, 225, 250); ">
        
        
        <div class="col-md-6 col-xs-8">
            <div class="form-group">   
                <div class="col-sm-9">
                    <label>Seleccione la fecha inicial de ingreso:</label>
                    <div class="col-sm-9">
                        
                        <input type="text"  name="fecha_inicial" id="fecha_inicial"   class ="form-control mifecha" placeholder="AAAA-MM-DD">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-2">
            <div class="form-group">                    
                <div class="col-sm-9">
                    <label for="fec_nacimiento" class="control-label">Seleccione la fecha final de ingreso::</label>
                    <div class="col-sm-9">
                        <input type="text"  name="fecha_inicial" id="fecha_final"   class ="form-control mifecha" placeholder="AAAA-MM-DD">
                    </div>
                </div>
            </div>
        </div>            

        <div class="col-md-6 col-xs-2">
            <div class="form-group">                    
                <div class="col-sm-9">
                    <label for="precio" class="col-sm-3 control-label">Categoria:</label>
                    <!--<label>Seleccione la categoria de los elementos:</label>-->
                    <div class="col-sm-5">
                        <div id="seleccion_cat">
                            <div class="dropdown">
                                <?php
                                    $g = new GeneraHTML();
                                    $g->generarSelecCategoria();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-xs-2">
            <div class="form-group">                    
                <div class="col-sm-7">
                    <label>Selecciona estado de los elementos:</label>
                    <select class ="form-control" name="estado" id="estado" >
                        <option value="0">Inactivo</option>
                        <option value="1">Activo</option>
                    </select>
                </div>
            </div>
        </div>
                

    <br />
    
    <center><div style="margin-top:130px;"><button 
        onclick="cargarTabla()"
        type="button" class="btn btn-primary" style="margin-left: 100px;">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Generar</b>
            </button></div></center>	
        </div>
        </div>
       </div>
      </div>
</fieldset>



<!---tabla #1--->

<br />
<br />

    <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><h4 id="titulo">Reporte</h4></center></h3>
                </div>
                <div class="panel-body" style="background-color: rgb(197, 225, 250); ">
                    <table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th rowspan="1" colspan="1">Nombre</th>
                                <th rowspan="1" colspan="1">Activo</th>
                                <th rowspan="1" colspan="1">Cantidad</th>
                                <th rowspan="1" colspan="1">Precio</th>
                                <th rowspan="1" colspan="1">Fecha de ingreso</th>

                            </tr>
                        </thead>
                        <tbody id="cuerpoTabla"> 

                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
        </div>


<button 
    id="generar_asistente" onclick="generar()"
    type="button" class="btn btn-primary" style="margin-left: 100px;">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnGenerar">Generar reporte</b>
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

