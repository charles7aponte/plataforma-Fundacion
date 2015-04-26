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
      cursor:pointer !important;
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
    $(this).each (function() { this.reset(); });
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



  function enviarDatos(){


       if($("#frmRegistrar").validationEngine('validate'))
       {
        document.getElementById("frmRegistrar").submit();

       }


       return false;

     }
	 
	 


  function eliminarIngreso(idingresos, id){
 

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
      }
      
      


     
  function editar(ciudad, fecha, valor, pagadoA, conceptoDe, modalidad, beneficiario, cc, formaPago, aprobado, miid){
				//procedimiento = "editar";
			
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
			
                        

 
  function nuevoElemento(){
      
		
		document.getElementById('frmRegistrar').reset();
		$("#btnProcesar").html("Agregar");
		$("#titulo").html("Agregar egreso");
		$("#miaccion").val("agregar");
		
		return false;
	}	
 


$('.dropdown-toggle').dropdownHover(options);




</script>



<ul class="nav nav-pills">  
    <li id="b_ingreso"  onclick="valorPest('Ingreso')" data-contenido="Ingreso"><a href="ingresos.php">Ingreso</a></li>
    <li id="b_egreso"   onclick="valorPest('Egreso')" data-contenido="Egreso" class="active"><a href="#">Egreso</a></li>
</ul>


<fieldset><legend><h1 id="titulo" style="text-align: center;">Registrar egreso</h1></legend>
  <form name="frmRegistrar" id="frmRegistrar" action="guardarEgreso.php" method="POST" class="form-horizontal">
          <input type="hidden" id="accion" value="ingreso">
          
          <input type="hidden" name="accion" id="miaccion" value="agregar">
          <input type="hidden" name="miid" id="miid" value="">
          <input type="hidden" name="organizacion_idorganizacion"  value="0">
          
          <div class="row">
              
              <!-- columna iz1-->
              <div class="col-md-6">
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
                
                  
                  <div class="form-group">
                    <label for="activo" class="col-sm-3 control-label">Forma de pago:</label><p></p>
                    <input type="radio" name="activo" value="1"  id="si" checked/>Efectivo
                    <input type="radio" name="activo"  value="0" id="no"/>Cheque<br />	
                  </div>
                
                  
                  <div class="form-group" >                    
                    <label for="fec_nacimiento" class="col-sm-3 control-label">Fecha:</label>
                        <div class="col-sm-9">
                          <input type="text"  name="fecha"
                                 readonly="readonly"    class ="form-control validate[required] mifecha" id="fecha" placeholder="Fecha">
                        </div>
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
          
          
          <button onclick="enviarDatos()"
          type="button" class="btn btn-primary" style="margin-left: 100px;">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
          <b id="btnProcesar">Agregar</b>
          </button>	
          
          <a class="btn btn-primary" onclick="nuevoElemento()" >Nuevo</a>
          
      </form>
    </fieldset>
	
	
	<!---tabla--->
	<br />
	<br />
	<br />
	<br />
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

				$g->crearTabla_egresos();
			?>
			

					

		</tbody>
		<tfoot>
				
		</tfoot>


            </table>



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