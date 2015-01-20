<?php

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
        
        if(valor == 'hv')
        {
            $("#b_hv").addClass('active');
            $("#b_asistente").removeClass('active');
            $("#accion").val('hv');
			
			
			$("#p_cc").show();
			$("#p_fecha_nacimiento").show();
			$("#p_direccion").show();
			$("#p_godson").show();
			$("#p_ciudad").hide();
			
        }
        else {//asistentes
            
            $("#b_hv").removeClass('active');
            $("#b_asistente").addClass('active');
            $("#accion").val('asistencias');
            
			$("#p_cc").hide();
				$("#p_fecha_nacimiento").hide();
				$("#p_direccion").hide();
				$("#p_godson").hide();
				$("#p_ciudad").show();
				$("#p_telefono").hide();
		}
        
        $("#text_bt_guardo").html("Agregar "+valor);
        
    }
    
</script>



<ul class="nav nav-pills">
    <li id="b_hv"  onclick="valorPest('hv')" data-contenido="hv" class="active"><a href="#">HV</a></li>
  <li id="b_asistente"   onclick="valorPest('Asistente')" data-contenido="Asistente"><a href="#">Asistentes</a></li>
</ul>


<fieldset><legend><h1 id="titulo" style="text-align: center;">Registrar</h1></legend>
      <form name="frmRegistrar" id="frmRegistrar" class="form-horizontal">
          <input type="hidden" id="accion" value="hv">
          
          <div class="row">
              
              <!-- columna iz1-->
              <div class="col-md-6">
					
					<div class="form-group">                    
                       <label for="txtNombres" class="col-sm-3 control-label">Nombre:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="txtNombres" class ="form-control validate[required,custom[onlyLetterSp] id="txtNombres" placeholder="Nombre">
                        </div>
                </div>
				
				<div class="form-group" id="p_fecha_nacimiento">                    
                       <label for="fec_nacimiento" class="col-sm-3 control-label">Fecha de nacimiento:</label>
                    
                        <div class="col-sm-9">
                          <input type="date"  name="fec_nacimiento" class ="form-control" id="txtNombres" placeholder="Fecha de nacimiento">
                        </div>
                </div>
				
				<div class="form-group">                    
                       <label for="email" class="col-sm-3 control-label">Email:</label>
                    
                        <div class="col-sm-9">
                          <input type="email"  name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                  </div>

				<div class="form-group" id="p_cc">                    
                       <label for="cc" class="col-sm-3 control-label">CC :</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cc" name="cc" placeholder="12345">
                        </div>
                 </div>
				  
				 <div class="form-group" id="p_telefono">                    
                       <label for="telefono" class="col-sm-3 control-label">Telefono:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="telefono" class="form-control" id="telefono" placeholder="Telefono">
                        </div>
				</div>
					
				<div class="form-group" id="p_ciudad">                    
                       <label for="ciudad" class="col-sm-3 control-label">Ciudad:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="ciudad" class ="form-control validate[required,custom[onlyLetterSp] id="ciudad" placeholder="Ciudad">
                        </div>
                </div>
					
				
                
              </div>
              
              
              <!-- columna dere-->
			   
			  
					<div class="col-md-6">
					   <div class="form-group">                    
						   <label for="txtNombres" class="col-sm-3 control-label">Apellidos:</label>
						
							<div class="col-sm-9">
							  <input type="text"  name="txtNombres" class ="form-control validate[required,custom[onlyLetterSp] id="txtApellidos" placeholder="Apellidos">
							</div>
					</div>

					<div class="form-group">                    
                       <label for="edad" class="col-sm-3 control-label">Edad:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="edad" class="form-control" id="edad" placeholder="Apellidos">
                        </div>
					</div>
				
					
                  
                  
                    <div class="form-group" id="p_direccion">                    
                       <label for="direccion" class="col-sm-3 control-label">Direccion:</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
                        </div>
                  </div>
                  
                  <div class="form-group" id="p_godson">                    
						   <label for="godson" class="col-sm-3 control-label">Godson:</label>
						
							<div class="col-sm-9">
							  <input type="text"  name="godson" class ="form-control validate[required,custom[onlyLetterSp] id="godson" placeholder="Godson">
							</div>
					</div>
					
					
                  
                  
                 
                  
              </div>
              
              
          </div>
          
          
          <div class="row">
              
              <button type="button" class="btn btn-primary" style="margin-left: 69px;">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="text_bt_guardo">Agregar Ingreso</b>
              </button>
          
          </div>
          
      </form>
    </fieldset>

<script>
$("#frmRegistrar").validationEngine();
 
$('.date').datepicker({language:"es"});







</script>

 
 <?php

include_once "footer.php";

?>