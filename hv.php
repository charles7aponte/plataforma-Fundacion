<?php

include_once "php/generated/include_dao.php";
include_once "php/generated/GeneraHTMLAsistentes.php";
include_once "php/generated/GeneraHTMLhv.php";
include_once "php/generated/asistentes/controlAsistente.php";
include_once "php/generated/hojas_de_vida/controlHv.php";
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
      //$("#telefono").show();
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
	
	
	
	 function enviarDatos(){
 
		 
		 if($("#frmRegistrar").validationEngine('validate'))
		 {
			document.getElementById("frmRegistrar").submit();
		 
		 }
		 
		 
		 return false;
		 
	 }
	 
	 
	 
  function eliminarHv(id, Id){
 

				if (confirm("Esta seguro de eliminar?")) {
					//id es igual
					var ced ="id="+id;
					$.ajax({ 
						type: "POST",
						url:"php/generated/hojas_de_vida/eliminarHv.php",
						data: ced,
						success:function(respuesta)
								{
									console.log(respuesta);
									
									
									if(respuesta=="1")
									{
										
									 $("#"+Id).remove();
									 
									}
								//	location.reload(true);
								}
					});
				    
				}	
			}
      
      
      
      
      function editar(nombres, apellidos, fechaNac, edad, email, direccion, cc, godson, telefono, miid){
				//procedimiento = "editar";
			
                
								$('#txtNombres').val(nombres);
                $('#txtApellidos').val(apellidos);
                $('#p_fecha_nacimiento').val(fechaNac);
								$('#edad').val(edad);
                $('#email').val(email);
                $('#direccion').val(direccion);
                $('#cc').val(cc);
                $('#godson').val(godson);
                $('#telefono').val(telefono);
								$("#miid").val(miid);
                ////$('#descripcion').val(descripcion);
								//$('#precio').val(precio);
								
								
								
								/*console.log(activo);
								if(activo==1){
								
									document.getElementById("si").checked=true;
								
								
								}
								
								else if(activo==0){
									
									document.getElementById("no").checked=true;
								
								}*/
								
								
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
    <li id="b_hv"   data-contenido="hv"  class="active" ><a href="#">HV</a></li>
    <li id="b_asistente"   data-contenido="Asistente"><a href="hv_asistentes.php">Asistentes</a></li>
</ul>


<fieldset><legend><h1 id="titulo" style="text-align: center;">Registrar</h1></legend>
  
  <?php  if(isset($_GET['e']))
    {
    ?>
  <label>el correo no puede repetir </label>
 
   <?php
    }
    ?>
      <form name="frmRegistrar" id="frmRegistrar"  action="guardarHv.php" method="POST" class="form-horizontal">
          <input type="hidden" id="accion" value="hv">
          
          <input type="hidden" name="accion" id="miaccion" value="agregar">
          <input type="hidden" name="miid" id="miid" value="">
          
          		<input type="hidden" name="organizacion_idorganizacion"  value="0">
          
          <div class="row">
              
              <!-- columna iz1-->
              <div class="col-md-6">
					
					<div class="form-group">                    
                       <label for="txtNombres" class="col-sm-3 control-label">Nombre:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="txtNombres" class ="form-control validate[required,custom[onlyLetterSp]" id="txtNombres" placeholder="Nombres">
                        </div>
                </div>
				
				<div class="form-group" id="p_fecha_nacimiento">                    
                       <label for="fec_nacimiento" class="col-sm-3 control-label">Fecha de nacimiento:</label>
                    
                        <div class="col-sm-9">
                          <input type="date"  name="p_fecha_nacimiento" class ="form-control" id="p_fecha_nacimiento" placeholder="Fecha de nacimiento">
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
                          <input type="text" class="form-control" id="cc" name="cc" placeholder="CC">
                        </div>
                 </div>
				  
				 <div class="form-group" id="p_telefono">                    
                       <label for="telefono" class="col-sm-3 control-label">Telefono:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="telefono" class="form-control" id="telefono" placeholder="Telefono">
                        </div>
				</div>

				<!---	
				<div class="form-group" id="p_ciudad">                    
                       <label for="ciudad" class="col-sm-3 control-label">Ciudad:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="ciudad" class ="form-control validate[required,custom[onlyLetterSp]" id="ciudad" placeholder="Ciudad">
                        </div>
                </div>
        -->
					
				
                
              </div>
              
              
              <!-- columna dere-->
			   
			  
					<div class="col-md-6">
					   <div class="form-group">                    
						   <label for="txtApellidos" class="col-sm-3 control-label">Apellidos:</label>
						
							<div class="col-sm-9">
							  <input type="text"  name="txtApellidos" class ="form-control validate[required,custom[onlyLetterSp]" id="txtApellidos" placeholder="Apellidos">
							</div>
					</div>

					<div class="form-group">                    
                       <label for="edad" class="col-sm-3 control-label">Edad:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="edad" class="form-control" id="edad" placeholder="Edad">
                        </div>
					</div>
				
					
                  
                  
                    <div class="form-group" id="p_direccion">                    
                       <label for="direccion" class="col-sm-3 control-label">Direccion:</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
                        </div>
                  </div>
                  
                  <div class="form-group" id="p_godson">                    
						   <label for="godson" class="col-sm-3 control-label">Ahijado:</label>
						
							<div class="col-sm-9">
							  <input type="text"  name="godson" class ="form-control validate[required,custom[onlyLetterSp]" id="godson" placeholder="Ahijado">
							</div>
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
							
							<th rowspan="1" colspan="1">Nombres</th>
							<th rowspan="1" colspan="1">Apellidos</th>
							<th rowspan="1" colspan="1">Fecha Nacimiento</th>
              <th rowspan="1" colspan="1">Edad</th>
              <th rowspan="1" colspan="1">Email</th>
              <th rowspan="1" colspan="1">direccion</th>
							<th rowspan="1" colspan="1">CC</th>
							<th rowspan="1" colspan="1">Ahijado</th>
							<th rowspan="1" colspan="1">Telefono</th>
              <th rowspan="1" colspan="1">Acciones</th>
						</tr>
					</thead>
									<tbody>
<?php
	$g =new GeneraHTMLhv();
	$g->crearTabla_hv();
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