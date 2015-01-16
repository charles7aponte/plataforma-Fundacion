<?php

include_once "header.php";

?>

<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>



	
	
	
	<fieldset><legend><h1 id="titulo" style="text-align: center;">Registrar</h1></legend>
      <form name="frmRegistrar" id="frmRegistrar">
        
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
                       <label for="cantidad" class="col-sm-3 control-label">Cantidad:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="cantidad" class="form-control validate[required,custom[onlyNumberSp]" id="cantidad" placeholder="Cantidad" >
                        </div>
                  </div>
				
				
				
			
				<div class="form-group">                    
                       <label for="descripcion" class="col-sm-3 control-label">Descripcion:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="descripcion" class ="form-control validate[required,custom[onlyLetterSp] id="descripcion" placeholder="Descripcion">
						  
                        </div>
                </div>   
			
			</div> 
			
			<!---columnaderecha-->
			<div class="col-md-6" style="">
				<div class="form-group">
					<label for="precio" class="col-sm-3 control-label">Activo:</label>
                    <input type="radio" name="activo" value="si" />Si
                    &nbsp;&nbsp;&nbsp;<input type="radio" name="activo" value="no" />No<br />	
				</div>
				
				<div class="form-group">                    
                       <label for="precio" class="col-sm-3 control-label">Precio:</label>
                       <div class="col-sm-9">
                          <input type="text"  name="precio" class="form-control validate[required,custom[onlyNumberSp]" id="precio" placeholder="Precio">
                       </div>
                  </div>	
				
				<div class="form-group">
					<label for="precio" class="col-sm-3 control-label">Categoria:</label>
						<div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
								Dropdown
								<span class="caret"></span>
							  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
								  </ul>
						</div>          
				</div>
				
				
			
			</div>
		
		</div>
		
				<button type="button" class="btn btn-primary" style="margin-left: 100px;">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Agregar</b>
				</button>	
          
				<button id="btnProcesar" name="btnProcesar" >Procesar 
				</button>
            
            
          
          
        

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
							<th rowspan="1" colspan="1">Cedula</th>
							<th rowspan="1" colspan="1">Nombres</th>
							<th rowspan="1" colspan="1">Apellidos</th>
							<th rowspan="1" colspan="1">Fecha De Nacimiento</th>
							<th rowspan="1" colspan="1">Telefono</th>
							
							<th rowspan="1" colspan="1"></th>
						</tr>
					</thead>
					<tbody>

						
			

						<tr role="row" class="odd">
							<td class="sorting_1">1121878910</td>
							<td>victor alfonso</td>
							<td>betancourt sanchez</td>
							<td>31-03-1991</td>
							<td>3107928018</td>
							
							<td>
								<img src="images/reload.png" alt="" style="cursor: pointer;" >
								<img src="images/delete-item.png" alt="" style="cursor: pointer;">

							</td>
						</tr>
			

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