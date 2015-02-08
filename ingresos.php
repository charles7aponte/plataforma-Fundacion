<?php


include_once "php/generated/GeneraHTMLIngresos.php";
include_once "php/generated/ingresos/controlIngreso.php";
include_once "header.php";

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
						url:"php/generated/ingresos/eliminarIngreso.php",
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
      
      


     
  function editar(ciudad, fecha, valor, recibidoDe, conceptoDe, modalidad, beneficiario, cc, aprobado, miid){
				//procedimiento = "editar";
			

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
                ////$('#descripcion').val(descripcion);
								//$('#precio').val(precio);
								
								
								
								
								
								
								$("#btnProcesar").html("Editar");
								
								
								$("#miaccion").val("editar");

								
								//cambioCategoriById(categoria);
								
														
			}
			


 
  function nuevoElemento(){
		
		
		document.getElementById('frmRegistrar').reset();
		$("#btnProcesar").html("Agregar");
		
		$("#miaccion").val("agregar");
		
		return false;
	}	
 





</script>



<ul class="nav nav-pills">
    <li id="b_ingreso"  onclick="valorPest('Ingreso')" data-contenido="Ingreso" class="active"><a href="#">Ingreso</a></li>
    <li id="b_egreso"   onclick="valorPest('Egreso')" data-contenido="Egreso"><a href="egresos.php">Egreso</a></li>
</ul>


<fieldset><legend><h1 id="titulo" style="text-align: center;">Registrar ingreso</h1></legend>
  <form name="frmRegistrar" id="frmRegistrar" action="guardarIngreso.php" method="POST" class="form-horizontal">
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
                          <input type="text"  name="ciudad" class="form-control" id="ciudad" placeholder="ciudad">
                        </div>
                  </div>
                  
                  
                    <div class="form-group">                    
                       <label for="concepto" class="col-sm-3 control-label">Por concepto:</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="concepto" name="concepto" placeholder="Por concepto de">
                        </div>
                  </div>
                  
                  
                  <div class="form-group">                    
                       <label for="beneficiario" class="col-sm-3 control-label">Beneficiario:</label>
                    
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="beneficiario" name="beneficiario" placeholder="Beneficiario">
                        </div>
                  </div>
                  
                  
                  
                  
                <div class="form-group">                    
                       <label for="modalidad" class="col-sm-3 control-label">Modalidad</label>
                    
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="modalidad" name="modalidad" placeholder="Modalidad">
                        </div>
                  </div>
              
			  
			  
			  <div class="form-group">                    
                       <label for="aprobado" class="col-sm-3 control-label">Aprobado por:</label>
                    
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="aprobado" name="aprobado" placeholder="Aprobado por" >
                        </div>
                  </div>
              </div>
			  
              
              
              <!-- columna dere-->
              <div class="col-md-6">
                   <div class="form-group">                    
                       <label for="valor" class="col-sm-3 control-label">Valor:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="valor" class="form-control" id="valor" placeholder="Valor" >
                        </div>
                  </div>
                  
                  
                    <div class="form-group">                    
                       <label for="recibido" class="col-sm-3 control-label">Recibido de:</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="recibido" name="recibido" placeholder="Recibido de">
                        </div>
                  </div>
                  
                  
                  <div class="form-group">                    
                       <label for="cc" class="col-sm-3 control-label">CC o NIT:</label>
                    
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="cc" name="cc" placeholder="CC">
                        </div>
                  </div>
                
                
                <div class="form-group" id="fecha">                    
                       <label for="fec_nacimiento" class="col-sm-3 control-label">Fecha:</label>
                    
                        <div class="col-sm-9">
                          <input type="date"  name="fecha" class ="form-control" id="fecha" placeholder="Fecha">
                        </div>
                </div>

                  
                <!--otro tipo de fecha
                
                  <div class="form-group">                    
                       <label for="fecha" class="col-sm-3 control-label">Fecha:</label>
                    
                        <div class="col-sm-5">
                            
                            <input type="" style="cursor:pointer" 
                                            readonly id="fecha-proyecto" class="date form-control" data-format="dd/MM/yyyy" name="fecha" value="dd/mm/aaaa"  /> 

                            
                        
                        </div>
                  </div>
                  
                  -->
                
              </div>
              
              
          </div>
          
          
          <button 
				
				onclick="enviarDatos()"
				type="button" class="btn btn-primary" style="margin-left: 100px;">
					
					
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Agregar</b>
				</button>	
          
				<a  class="btn btn-primary" onclick="nuevoElemento()" >Nuevo
				</a>
          
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
							
							<th rowspan="1" colspan="1">Ciudad</th>
							<th rowspan="1" colspan="1">Fecha</th>
							
							<th rowspan="1" colspan="1">Valor</th>
							<th rowspan="1" colspan="1">Recibido de</th>
							<th rowspan="1" colspan="1">Por concepto</th>
							<th rowspan="1" colspan="1">Modalidad</th>
							<th rowspan="1" colspan="1">Beneficiario</th>
							<th rowspan="1" colspan="1">CC o NIT</th>
							<th rowspan="1" colspan="1">Aprobado por</th>
              
							<th rowspan="1" colspan="1">Acciones</th>
						</tr>
					</thead>
					<tbody>

					<?php
					$g =new GeneraHTMLIngresos();

					$g->crearTabla_ingresos();
					?>
			

					

					</tbody>
					<tfoot>
						
					</tfoot>


		</table>

	
	
	
	
	
	
	
	
	
	

<script>
$("#frmRegistrar").validationEngine();
 
$('.date').datepicker({language:"es"});







</script>

 
 <?php

include_once "footer.php";

?>