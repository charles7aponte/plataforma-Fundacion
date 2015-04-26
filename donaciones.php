<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
} else {
    require_once('funciones/login/iniciar_sesion.php');
    $sesion = new sesiones();

    $valor = $sesion->validarAccesoModulos($_SESSION["idUsuario"], "donaciones");
    if (count($valor) == 0) {
        header("location: pagina_error.php"); //TODO: pagina de error
    }
}


include_once "php/generated/GeneraHTMLIngresos.php";
include_once "php/generated/ingresos/controlIngreso.php";
include_once "header.php";
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
<link rel="stylesheet" href="css/style.css" type="text/css"/>

<script>

    jQuery.fn.reset = function () {
        $(this).each(function () {
            this.reset();
        });
    }

    function valorPest(valor) {

        $("#frmRegistrar").reset();

        if (valor == 'Ingreso')
        {
            $("#b_ingreso").addClass('active');
            $("#b_egreso").removeClass('active');
            $("#accion").val('ingreso');
        }
        else {

            $("#b_ingreso").removeClass('active');
            $("#b_egreso").addClass('active');
            $("#accion").val('egreso');

        }

        $("#text_bt_guardo").html("Agregar " + valor);

    }



    function enviarDatos() {
        if ($("#frmRegistrar").validationEngine('validate'))
            document.getElementById("frmRegistrar").submit();
        return false;
        
    }




    function eliminarIngreso(idingresos, id) {


        if (confirm("Esta seguro de eliminar?")) {
            //id es igual
            var ced = "id=" + idingresos;
            $.ajax({
                type: "POST",
                url: "php/generated/ingresos/eliminarIngreso.php",
                data: ced,
                success: function (respuesta)
                {
                    console.log(respuesta);
                    if (respuesta == "1")
                    {
                        $("#" + id).remove();

                    }
                    //	location.reload(true);
                }
            });

        }
    }





    function editar(ciudad, fecha, valor, recibidoDe, conceptoDe, modalidad, beneficiario, cc, formaPago, aprobado, miid) {
        //procedimiento = "editar";

        $("#titulo").html("Editar ingreso");
        $('#ciudad').val(ciudad);
        $('#fecha').val(fecha);
        $('#valor').val(valor);
        $('#recibido').val(recibidoDe);
        $('#concepto').val(conceptoDe);
        $('#modalidad').val(modalidad);
        $('#beneficiario').val(beneficiario);
        $('#cc').val(cc);
        $('#aprobado').val(aprobado);
        $("#miid").val(miid);

        if (formaPago == 1) {
            document.getElementById("si").checked = true;
        }
        else if (formaPago == 0) {
            document.getElementById("no").checked = true;
        }

        ////$('#descripcion').val(descripcion);
        //$('#precio').val(precio);






        $("#btnProcesar").html("Editar");


        $("#miaccion").val("editar");


        //cambioCategoriById(categoria);


    }




    function nuevoElemento() {


        document.getElementById('frmRegistrar').reset();
        $("#btnProcesar").html("Agregar");
        $("#titulo").html("Agregar ingreso");

        $("#miaccion").val("agregar");

        return false;
    }

    function setChange(valor) {
        if (valor == "Cheque") {
            $("#datos_cheque").show();
            $("#cheque_1").show();
        } else {
            $("#datos_cheque").hide();
            $("#cheque_1").hide();
        }
    }
    
    function setTipoPago(val){
        if(val == 1){
            $('#bloqueDebito').show();
            $('#lista-Creditos').empty();
            $('#bloqueCredito').hide();
        }else{
            $('#bloqueCredito').show();
            $('#lista-debitos').empty();
            $('#bloqueDebito').hide();
        }
    }
    
    
    var cont_debito = 0;
    var cont_credito = 0;
    function addValor(tipo){
        var divObjetivo = "";
        var valor = 0;
        if(tipo == "debito"){
            divObjetivo = $('#lista-debitos');            
            var nuevoValor = $("#cheque_debito");                       
            valor = 100 +cont_debito;
        }else{
            divObjetivo = $('#lista-Creditos');
            var nuevoValor = $("#cheque_credito");                       
            valor = 200 + cont_credito;
        }
        if(divObjetivo.children().length == 4){
            alert("No esta permitido agregar mas registro del cheque");
            return;
        }            
        if(nuevoValor.val() != ""){
            
            var html = "<li class='list-group-item' id = '" + tipo+valor +"'>\n\
                            <div class='row'>\n\
                                <div class=col-md-10>\n\
                                <input class=' form-control' value='"+nuevoValor.val() +"' name='"+tipo+"[]' readonly/></div>\n\
                                <div class='col-md-2'><input type='button'  class='borrarDiv form-control btn btn-warning' value='X' onclick='borrarValorCheque("+valor+")'/></div>\n\
                            </div>    \n\
                        </li>";
            divObjetivo.append(html);
            
            cont_debito = tipo == "debito" ? cont_debito+ 1 : cont_debito;
            cont_credito = tipo == "credito" ? cont_credito+ 1 : cont_credito;
        }else{
            alert("Debe escribir un valor de " + tipo);
        }        
        nuevoValor.val("");
    }      
    
    function borrarValorCheque(data){
        if(data/ 100 == 1){
            $("#debito"+data).remove();               
        }else{
            $("#credito"+data).remove();            
        }
    }
    
    $(document).ready(function () {
        setChange("Efectivo");
       $('#bloqueCredito').hide();
    });
</script>



<ul class="nav nav-pills">  
    <li id="b_ingreso"  onclick="valorPest('Ingreso')" data-contenido="Ingreso"><a href="inscripcion_padrinos.php">Padrinos</a></li>
    <li id="b_egreso"   onclick="valorPest('Egreso')" data-contenido="Egreso" class="active"><a href="#">Donacion de padrinos</a></li>
</ul>


<fieldset><legend><h1 style="text-align: center;"></h1></legend>
    <form name="frmRegistrar" id="frmRegistrar" action="guardarIngreso.php" method="POST" class="form-horizontal">
        <input type="hidden" id="accion" value="ingreso">

        <input type="hidden" name="accion" id="miaccion" value="agregar">
        <input type="hidden" name="miid" id="miid" value="">
        <input type="hidden" name="organizacion_idorganizacion"  value="0">

        <div class="row">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><h4 id="titulo">Registrar donaciones</h4></center></h3>

                </div>
                    <div class="panel-body" style="background-color: rgb(197, 225, 250); ">
            
            

            <!-- columna iz1-->
            <div class="col-md-6">
                <br />
                
                <div class="form-group" >                    
                    <label for="fec_nacimiento" class="col-sm-3 control-label">Fecha:</label>
                    <div class="col-sm-9">
                        <input type="text"  name="fecha"
                                   class ="form-control validate[required] mifecha" id="fecha" placeholder="AAAA-MM-DD">
                    </div>
                </div>
                
                <div class="form-group">                    
                    <label for="txtNombres" class="col-sm-3 control-label">Nombres:</label>
                    <div class="col-sm-9">
                        <input type="text"  name="txtNombres" class ="form-control validate[required,custom[onlyLetterSp]" id="txtNombres" placeholder="Nombres">
                    </div>
                </div>
                
                
                
                <div class="form-group">                    
                    <label for="ciudad" class="col-sm-3 control-label">Ciudad:</label>

                    <div class="col-sm-9">
                        <input type="text"  name="ciudad" class="form-control validate[required,custom[onlyLetterSp]" id="ciudad" placeholder="ciudad">
                    </div>
                </div>


                <div class="form-group">                    
                    <label for="email" class="col-sm-3 control-label">Email:</label>
                    
                    <div class="col-sm-9">
                        <input type="email"  name="email" class="form-control validate[required,custom[email]" id="email" placeholder="Email">
                    </div>
                </div>


                <!--
                    <div class="form-group">                    
                       <label for="concepto" class="col-sm-3 control-label">Por concepto:</label>
                    
                        <div class="col-sm-9">
                          <!---<input type="text" class="form-control validate[required,custom[onlyLetterSp]" id="concepto" name="concepto" placeholder="Por concepto de">
                          <textarea type="text" rows="2" class="form-control validate[required,custom[onlyLetterSp]" id="concepto" name="concepto" placeholder="Por concepto de"></textarea>
                        </div>
                  </div>
                -->


                <div class="form-group">                    
                    <label for="intencion" class="col-sm-3 control-label">Intenciones:</label>

                    <div class="col-sm-9">
                      <!---<input type="text" class="form-control validate[required,custom[onlyLetterSp]" id="concepto" name="concepto" placeholder="Por concepto de">-->
                        <textarea type="text" rows="2" class="form-control validate[required,custom[onlyLetterSp]" id="intencion" name="intencion" placeholder="Intenciones/Detalle"></textarea>
                    </div>
                </div>




                <div class="form-group">                    
                    <label for="servidor" class="col-sm-3 control-label">Servidor a cargo:</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control validate[required,custom[onlyLetterSp]" id="servidor" name="servidor" placeholder="Servidor a cargo">
                    </div>
                </div>



                
            </div>



            <!-- columna dere-->
            <div class="col-md-6">
                <br />
                <div class="form-group">                    
                    <label for="valor" class="col-sm-3 control-label">Valor:</label>

                    <div class="col-sm-9">
                        <input type="text"  name="valor" class="form-control validate[required,custom[onlyNumberSp]" id="valor" placeholder="Valor donado" >
                    </div>
                </div>
                
                <div class="form-group">                    
                    <label for="txtApellidos" class="col-sm-3 control-label">Apellidos:</label>
			
			<div class="col-sm-9">
                            <input type="text"  name="txtApellidos" class ="form-control validate[required,custom[onlyLetterSp]" id="txtApellidos" placeholder="Apellidos">
			</div>
		</div>

                <div class="form-group" id="p_direccion">                    
                    <label for="direccion" class="col-sm-3 control-label">Direccion:</label>
                    
                        <div class="col-sm-9">
                            <input type="text" class="form-control validate[required]" id="direccion" name="direccion" placeholder="Direccion">
                        </div>
                </div>
                
                <div class="form-group" id="p_telefono">                    
                    <label for="telefono" class="col-sm-3 control-label">Telefono:</label>
                   
                    <div class="col-sm-9">
                        <input type="text"  name="telefono" class="form-control validate[required,custom[onlyNumberSp]" id="telefono" placeholder="Telefono">
                    </div>
		</div>

                <div class="form-group">                    
                    <label for="concepto" class="col-sm-3 control-label">Por concepto:</label>

                    <div class="col-sm-9">
                      <!---<input type="text" class="form-control validate[required,custom[onlyLetterSp]" id="concepto" name="concepto" placeholder="Por concepto de">-->
                        <textarea type="text" rows="2" class="form-control validate[required,custom[onlyLetterSp]" id="concepto" name="concepto" placeholder="Por concepto de"></textarea>
                    </div>
                </div>



                <!--
                <div class="form-group">                    
                   <label for="recibido" class="col-sm-3 control-label">Recibido de:</label>
                
                    <div class="col-sm-9">
                      <input type="text" class="form-control validate[required,custom[onlyLetterSp]" id="recibido" name="recibido" placeholder="Recibido de">
                      <!--<textarea type="text" rows="2" class="form-control validate[required,custom[onlyLetterSp]" id="recibido" name="recibido" placeholder="Recibido de"></textarea>
                    </div>
              </div>-->


                <div class="form-group">                    
                    <label for="cc" class="col-sm-3 control-label">CC o NIT:</label>

                    <div class="col-sm-9">
                        <input type="email" class="form-control validate[required]" id="cc" name="cc" placeholder="CC">
                    </div>
                </div>

                
                
                                

                
            </div>
            
                <button 

            onclick="enviarDatos()"
            type="button" class="btn btn-primary" style="margin-left: 100px;">


            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Agregar</b>
        </button>	

        <a  class="btn btn-primary" onclick="nuevoElemento()" >Nuevo
        </a>
            
            </div>
       </div>
      </div>
        
        
        


    

    </form>
</fieldset>







<!---tabla--->

<br />
<br />
    <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><h4>Donaciones</h4></center></h3>

                </div>
                    <div class="panel-body" style="background-color: rgb(197, 225, 250); ">



<table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
    <thead>
        <tr role="row">

<!--<th rowspan="1" colspan="1">Ciudad</th>-->
            <th rowspan="1" colspan="1">Fecha</th>

            <th rowspan="1" colspan="1">Valor</th>
            <th rowspan="1" colspan="1">Por concepto</th>
            <th rowspan="1" colspan="1">Recibido de</th>
                                                      <!--<th rowspan="1" colspan="1">Elaborado por</th>-->
            <th rowspan="1" colspan="1">CC o NIT</th>
<!--<th rowspan="1" colspan="1">Beneficiario</th>-->
            <th rowspan="1" colspan="1">Forma de pago</th>
            <!--<th rowspan="1" colspan="1">Aprobado por</th>-->

            <th rowspan="1" colspan="1">Acciones</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $g = new GeneraHTMLIngresos();

        $g->crearTabla_ingresos();
        ?>




    </tbody>
    <tfoot>

    </tfoot>


</table>

   </div>
</div>




<button  
    id="generar_ingreso" onclick="generar()"
    type="button" class="btn btn-primary" style="margin-left: 100px;">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnGenerar">Generar reporte</b>
</button>
</br></br></br></br>	








<script>
    $("#frmRegistrar").validationEngine();

    $('.mifecha').datepicker({language: "es", format: 'yyyy-mm-dd'});







</script>


<?php
include_once "footer.php";
?>