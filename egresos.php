<?php
    session_start();   
    if(!isset($_SESSION["usuario"])){
        header("location: login.php");
    }else{
        require_once('funciones/login/iniciar_sesion.php');
        $sesion = new sesiones();
        
        $valor = $sesion->validarAccesoModulos($_SESSION["idUsuario"], "Ingresos/Egresos");
        if(count($valor) == 0){
            header("location: pagina_error.php"); //TODO: pagina de error
        }
    } 


include_once "php/generated/GeneraHTMLIngresos.php";
include_once "php/generated/ingresos/controlIngreso.php";
include_once "php/generated/GeneraHTMLEgresos.php";
include_once "php/generated/egresos/controlEgreso.php";
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
    
    
    function valorPest(valor){
        
        $("#frmRegistrar").reset();
        
        if(valor == 'Ingreso')
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
        
        $("#text_bt_guardo").html("Agregar "+valor);
        
    }



  function enviarDatos(p_crear,p_editar){

        if(p_crear == 1){
            if($("#frmRegistrar").validationEngine('validate'))
            document.getElementById("frmRegistrar").submit();
            }else{
            alert("No tiene permiso");
        }
            
       return false;

     }
	 
	 


  function eliminarIngreso(idingresos, id, p_eliminar){
        if(p_eliminar == 1){

            if (confirm("Esta seguro de eliminar?")) {
              //id es igual
              var ced ="id="+idingresos;
              $.ajax({ 
              type: "POST",
              url:"php/generated/egresos/eliminarEgreso.php",
              data: ced,
              success:function(respuesta)
                {
                   console.log(respuesta);


                  if(respuesta=="1")
                  {

                    $("#"+id).remove();

                  }
                  //	location.reload(true);
                }
                });

            }	
               }else 
            alert("No tiene permisos");
        
    }


      


     
  function editar(ciudad, fecha, valor, pagadoA, conceptoDe, modalidad, beneficiario, cc, formaPago, aprobado, miid, permiso){
				//procedimiento = "editar";
		if(permiso == 1){	
                    $("#titulo").html("Editar egreso");
                    $('#ciudad').val(ciudad);
                    $('#fecha').val(fecha);
                    $('#valor').val(valor);
                    $('#pagado_a').val(pagadoA);
                    $('#concepto').val(conceptoDe);
                    $('#modalidad').val(modalidad);
                    $('#beneficiario').val(beneficiario);
                    $('#cc').val(cc);
                    $('#aprobado').val(aprobado);
                    $("#miid").val(miid);
                                ////$('#descripcion').val(descripcion);
                    //$('#precio').val(precio);

                     if(formaPago==1){
                      document.getElementById("si").checked=true;
                    }
                    else if(formaPago==0){
                      document.getElementById("no").checked=true;
                    }




                    $("#btnProcesar").html("Editar");	
                    $("#miaccion").val("editar");								
                    //cambioCategoriById(categoria);
                    }
            else{
                alert("No tiene permiso para la acción");
            }
               

														
    }
			
                        

 
  function nuevoElemento(p_agregar){
      if(p_agregar == 1){
		
		document.getElementById('frmRegistrar').reset();
		$("#btnProcesar").html("Agregar");
		$("#titulo").html("Agregar egreso");
		$("#miaccion").val("agregar");
		}else{
                    alert("no tiene permiso para la acción");
                    }
		return false;
	}	
 


//$('.dropdown-toggle').dropdownHover(options);



  function setChange(valor) {
        if (valor == "Cheque") {
            $("#datos_cheque").show();
            $("#cheque_1").show();
        } else {
            $("#datos_cheque").hide();
            $("#cheque_1").hide();
        }
    }
    
    
    function addValor(tipo){
        var divObjetivo = "";
        if(tipo == "debito"){
            divObjetivo = $('#lista-debitos');
            var nuevoValor = $("#cheque_debito");                       
        }else{
            divObjetivo = $('#lista-Creditos');
            var nuevoValor = $("#cheque_credito");                       
        }
        if(nuevoValor.val() != ""){
            var html = "<li class='list-group-item' >\n\
                            <div class=row>\n\
                                <div class=col-md-10>\n\
                                <input class=' form-control' value='"+nuevoValor.val() +"' name='"+tipo+"[]' readonly/></div>\n\
                                <div class='col-md-2'><input type='button'  class='borrarDiv form-control btn btn-warning' value='X' /></div>\n\
                            </div>    \n\
                        </li>";
            divObjetivo.append(html);
        }else{
            alert("Debe escribir un valor de " + tipo);
        }        
        nuevoValor.val("");
    }
    
    

    $(document).ready(function () {
        setChange("Efectivo");
    });

</script>



<ul class="nav nav-pills">  
    <li id="b_ingreso"  onclick="valorPest('Ingreso')" data-contenido="Ingreso"><a href="ingresos.php">Ingreso</a></li>
    <li id="b_egreso"   onclick="valorPest('Egreso')" data-contenido="Egreso" class="active"><a href="#">Egreso</a></li>
</ul>


<fieldset><legend><h1 style="text-align: center;"></h1></legend>
  <form name="frmRegistrar" id="frmRegistrar" action="guardarEgreso.php" method="POST" class="form-horizontal">
          <input type="hidden" id="accion" value="ingreso">
          
          <input type="hidden" name="accion" id="miaccion" value="agregar">
          <input type="hidden" name="miid" id="miid" value="">
          <input type="hidden" name="organizacion_idorganizacion"  value="0">
          
          <div class="row">
            
              <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><h4 id="titulo">Registrar egresos</h4></center></h3>

                </div>
                    <div class="panel-body" style="background-color: rgb(197, 225, 250); ">
            
              
              
              <!-- columna iz1-->
              <div class="col-md-6">
                  <br />
                  <div class="form-group">                    
                       <label for="ciudad" class="col-sm-3 control-label">Ciudad:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="ciudad" class="form-control validate[required,custom[onlyLetterSp]" id="ciudad" placeholder="ciudad">
                        </div>
                  </div>
                
                
                
                    <div class="form-group">                    
                       <label for="pagado_a" class="col-sm-3 control-label">Pagado a:</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control validate[required,custom[onlyLetterSp]" id="pagado_a" name="pagado_a" placeholder="Pagado a">
                        </div>
                  </div>
                  
                  <!--
                    <div class="form-group">                    
                       <label for="concepto" class="col-sm-3 control-label">Por concepto:</label>
                    
                        <div class="col-sm-9">
                          <!---<input type="text" class="form-control validate[required,custom[onlyLetterSp]" id="concepto" name="concepto" placeholder="Por concepto de">
                          <textarea type="text" rows="2"  class="form-control validate[required,custom[onlyLetterSp]" id="concepto" name="concepto" placeholder="Por concepto de"></textarea>
                        </div>
                  </div>
                  -->
                  
                  
                  <div class="form-group">                    
                       <label for="beneficiario" class="col-sm-3 control-label">Beneficiario:</label>
                    
                        <div class="col-sm-9">
                          <input type="email" class="form-control validate[required,custom[onlyLetterSp]" id="beneficiario" name="beneficiario" placeholder="Beneficiario">
                        </div>
                  </div>
                  
                  
                  
                  
                <div class="form-group">                    
                       <label for="modalidad" class="col-sm-3 control-label">Elaborado por:</label>
                    
                        <div class="col-sm-9">
                            <input type="text" class="form-control validate[required, custom[onlyLetterSp]" id="modalidad" name="modalidad" placeholder="Elaborado por">
                        </div>
                  </div>
              
			  
			  
			  <div class="form-group">                    
                       <label for="aprobado" class="col-sm-3 control-label">Aprobado por:</label>
                    
                        <div class="col-sm-9">
                            <input type="textarea" class="form-control validate[required,custom[onlyLetterSp]" id="aprobado" name="aprobado" placeholder="Aprobado por" >
                        </div>
                  </div>
              </div>
			  
              
              
              <!-- columna dere-->
              <div class="col-md-6">
                  <br />
                   <div class="form-group">                    
                       <label for="valor" class="col-sm-3 control-label">Valor:</label>
                    
                        <div class="col-sm-9">
                          <input type="number"  name="valor" class="form-control validate[required, custom[onlyNumberSp]]" id="valor" placeholder="Valor" >
                        </div>
                  </div>
                  
                    
                    <div class="form-group">                    
                       <label for="concepto" class="col-sm-3 control-label">Por concepto:</label>
                    
                        <div class="col-sm-9">
                          <!---<input type="text" class="form-control validate[required,custom[onlyLetterSp]" id="concepto" name="concepto" placeholder="Por concepto de">-->
                          <textarea type="text" rows="2"  class="form-control validate[required,custom[onlyLetterSp]" id="concepto" name="concepto" placeholder="Por concepto de"></textarea>
                        </div>
                  </div>
                
                  <!--
                    <div class="form-group">                    
                       <label for="pagado_a" class="col-sm-3 control-label">Pagado a:</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control validate[required,custom[onlyLetterSp]" id="pagado_a" name="pagado_a" placeholder="Pagado a">
                        </div>
                  </div>-->
                  
                  
                  <div class="form-group">                    
                       <label for="cc" class="col-sm-3 control-label">CC o NIT:</label>
                    
                        <div class="col-sm-9">
                          <input type="email" class="form-control validate[required]" id="cc" name="cc" placeholder="CC">
                        </div>
                  </div>
                
                  <!--<div class="form-group" >                    
                    <label for="fec_nacimiento" class="col-sm-3 control-label">Fecha:</label>
                        <div class="col-sm-9">
                          <input type="text"  name="fecha"
                                     class ="form-control validate[required] mifecha" id="fecha" placeholder="AAAA-MM-DD">
                        </div>
                </div>-->
                  
                  <div class="form-group">
                    <label for="activo" class="col-sm-3 control-label">Forma de pago:</label><p></p>
                    <input type="radio" name="activo" value="1"  id="si" onchange="setChange('Efectivo')"checked/>Efectivo
                    <input type="radio" name="activo"  value="0" id="no" onchange="setChange('Cheque')"/>Cheque<br />	
                  </div>
                
                  
                  
                
                  <!---
                  <div class="form-group" id="fecha">                    
                         <label for="fec_nacimiento" class="col-sm-3 control-label">Fecha:</label>

                          <div class="col-sm-9">
                            <input type="date"  name="fecha" class ="form-control validate[required]" id="fecha" placeholder="Fecha">
                          </div>
                  </div>
                  
                  -->
                
                  
                  
                </div>
              </div>
             </div>
            </div>  
          
          
            <div class="panel panel-primary" id="cheque_1">
            <div class="panel-heading">
                <h3 class="panel-title"><center><h4>Cheque</h4></center></h3>
            </div>
                <div class="panel-body" style="background-color: rgb(197, 225, 250); ">
              
              <div class="row" id="datos_cheque">
                        <div class="col-sm-6">
                            <div class="form-group" >                    
                                <label for="cheque_numero" class="col-sm-3 control-label">Número de cheque:</label>
                                <div class="col-sm-9">
                                    <input type="text"  name="cheque_numero" class ="form-control" id="cheque_numero" placeholder="Número de cheque">
                                </div>
                            </div>
                            <div class="form-group" >                    
                                <label for="cheque_banco" class="col-sm-3 control-label">Banco:</label>
                                <div class="col-sm-9">
                                    <input type="text"  name="cheque_banco" class ="form-control" id="cheque_banco" placeholder="Banco">
                                </div>
                            </div>
                            <div class="form-group" >                    
                                <label for="cheque_sucursal" class="col-sm-3 control-label">Sucursal:</label>
                                <div class="col-sm-9">
                                    <input type="text"  name="cheque_sucursal" class ="form-control" id="cheque_sucursal" placeholder="Sucursal">
                                </div>
                            </div>
                            <div class="form-group" >                    
                                <label for="cheque_sucursal" class="col-sm-3 control-label">Código:</label>
                                <div class="col-sm-9">
                                    <input type="text"  name="cheque_codigo" class ="form-control" id="cheque_codigo" placeholder="Código">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group" >                    
                                <label for="cheque_cuenta" class="col-sm-3 control-label">Cuenta:</label>
                                <div class="col-sm-9">
                                    <input type="text"  name="cheque_cuenta" class ="form-control" id="cheque_cuenta" placeholder="Cuenta">
                                </div>
                            </div>
                           
                            <div class="form-group" >                    
                                <label for="cheque_debito" class="col-sm-3 control-label">Débito:</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text"  name="cheque_debito" class ="form-control" id="cheque_debito" placeholder="Valor en débito">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="button" class="form-control btn btn-success" onclick="addValor('debito')" value=" + "/>
                                        </div>
                                    </div>         
                                    <ul class="list-group" id="lista-debitos">                            
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group" >                    
                                <label for="cheque_credito" class="col-sm-3 control-label">Crédito:</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text"  name="cheque_credito" class ="form-control" id="cheque_credito" placeholder="Valor en crédito">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="button" class="form-control btn btn-success" onclick="addValor('credito')" value=" + "/>
                                        </div>
                                    </div>         
                                    <ul class="list-group" id="lista-Creditos">                            
                                    </ul>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    </div>
                </div>
            
              
              
          
          
          
         <?php
         echo'<button onclick="enviarDatos('.$valor[0]["permiso_agregar"].','.$valor[0]["permiso_editar"].')"
          type="button" class="btn btn-primary" style="margin-left: 100px;">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
          <b id="btnProcesar">Agregar</b>
          </button>	
          
          <a class="btn btn-primary" onclick="nuevoElemento('.$valor[0]["permiso_agregar"].','.$valor[0]["permiso_editar"].')" >Nuevo</a>';
         ?> 
      </form>
    </fieldset>
	
	
	<!---tabla--->
	
	<br />
	<br />
        
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><h4>Egresos</h4></center></h3>
                </div>
                    <div class="panel-body" style="background-color: rgb(197, 225, 250); ">

                    <table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                        <thead>
                            <tr role="row">

                                <!--<th rowspan="1" colspan="1">Ciudad</th>-->
                                <th rowspan="1" colspan="1">Fecha</th>

                                <th rowspan="1" colspan="1">Valor</th>
                                <th rowspan="1" colspan="1">Por concepto</th>
                                <th rowspan="1" colspan="1">Pagado a</th>
                                <!--<th rowspan="1" colspan="1">Modalidad</th>-->
                                <th rowspan="1" colspan="1">CC o NIT</th>
                                <!--<th rowspan="1" colspan="1">Beneficiario</th>-->
                                <th rowspan="1" colspan="1">Forma de pago</th>
                                <!--<th rowspan="1" colspan="1">Aprobado por</th>-->

                                <th rowspan="1" colspan="1">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                        $g =new GeneraHTMLEgresos();

                                        $g->crearTabla_egresos($valor[0]["permiso_editar"], $valor[0]["permiso_eliminar"]);
                                ?>




                        </tbody>
                        <tfoot>

                        </tfoot>


                    </table>
        </div>
      </div>



<button 
	id="generar_egreso" onclick="generar()"
	type="button" class="btn btn-primary" style="margin-left: 100px;">
	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnGenerar">Generar reporte</b>
	</button>
        </br></br></br></br>        
        
        
        
        
<script>
$("#frmRegistrar").validationEngine();
 
$('.mifecha').datepicker({language:"es", format: 'yyyy-mm-dd'});






</script>

 
 <?php

include_once "footer.php";

?>