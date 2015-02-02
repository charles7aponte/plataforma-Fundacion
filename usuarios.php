<?php

include_once "php/generated/usuarios/GeneraHTMLUsuarios.php";
include_once "php/generated/inventarios/controlInventario.php";
include_once "header.php";
include_once "php/generated/include_dao.php"


?>

<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>


<script>

 function enviarDatos(){
 
 
 if($("#frmRegistrar").validationEngine('validate'))
 {
	document.getElementById("frmRegistrar").submit();
 
 }
 
 
 return false;
 
 }

 
 
 
  function eliminarUsuario(idusuario, id){
 

				if (confirm("Esta seguro de eliminar?")) {
					//id es igual
					var ced ="id="+idusuario;
					$.ajax({ 
						type: "POST",
						url:"php/generated/usuarios/eliminarUsuario.php",
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
 
 
 
 
</script>
	
	
	
	<fieldset><legend><h1 id="titulo" style="text-align: center;">Registrar</h1></legend>
      <form name="frmRegistrar" id="frmRegistrar"
        action="guardarUsuario.php" method="POST"
	  >
        <input type="hidden" name="accion" id="miaccion" value="agregar">
		
		
		
		
		<div class="row" style="">
		
				
			<!---columnaizquierda-->
			<div class="col-md-6">
			
			
				<div class="form-group">                    
                       <label for="txtNombres" class="col-sm-3 control-label">Nombre:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="txtNombres" class ="form-control validate[required,custom[onlyLetterSp] id="txtNombres" placeholder="Nombre">
                        </div>
                </div>         
				
				
				
                   <div class="form-group">                    
                       <label for="usuario" class="col-sm-3 control-label">Usuario:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="usuario" class="form-control" id="usuario" placeholder="Usuario" >
                        </div>
                  </div>
				
				
				
			
				 
			
			</div> 
			
			<!---columnaderecha-->
			<div class="col-md-6" style="">
			
				<div class="form-group">                    
                       <label for="txtApellidos" class="col-sm-3 control-label">Apellidos:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="txtApellidos" class ="form-control validate[required,custom[onlyLetterSp] id="txtApellidos" placeholder="Apellidos">
                        </div>
                </div>  
				
				<div class="form-group">                    
                       <label for="precio" class="col-sm-3 control-label">Clave:</label>
                       <div class="col-sm-9">
                          <input type="password"  name="clave" class="form-control " id="clave" placeholder="Clave">
                       </div>
                  </div>
			
				<div class="form-group">
					<label for="activo" class="col-sm-3 control-label">Activo:</label>
                    <input type="radio" name="activo" value="1"  id="si" checked/>Si
                    &nbsp;&nbsp;&nbsp;<input type="radio" name="activo"  value="0" id="no"/>No<br />	
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
	
	
	<!---tabla--->
	<br />
	<br />
	<br />
	<br />
		<table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
					<thead>
						<tr role="row">
							<th rowspan="1" colspan="1">Nombre</th>
							<th rowspan="1" colspan="1">Apellido</th>
							<th rowspan="1" colspan="1">Usuario</th>
							<th rowspan="1" colspan="1">Clave</th>
							<th rowspan="1" colspan="1">Activo</th>
							
							<th rowspan="1" colspan="1">Acciones</th>
						</tr>
					</thead>
									<tbody>
<?php
	$g =new GeneraHtmlUsuarios();
	$g->crearTabla_usu();
?>
						
			

					

					</tbody>
					<tfoot>
						
					</tfoot>


		</table>







<script>
$("#frmRegistrar").validationEngine();
</script>

 
 <?php

include_once "footer.php";

?>