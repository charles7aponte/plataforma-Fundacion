<?php

include_once "header.php";

?>

<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>



	
	
	
	<fieldset><legend>Registrar </legend>
      <form name="frmRegistrar" id="frmRegistrar">
        <div class="row" style="">
		
			<div class="col-md-6" style="">
				
				<div class="form-group">
					<label for="txtNombres" class="col-sm-3 control-label">Nombre :</label> 
					
					<div class="col-sm-9">
						<input class ="col-sm-8 validate[required,custom[onlyLetterSp] type="text" id="txtNombres" name="txtNombres"/>           
					</div>
				
		
				</div>
		
		<div class="form-group">
				 <label for="txtCantidad" class="col-sm-3 control-label">Cantidad :</label>
				 <div class="col-sm-9">
				<input class ="col-sm-8 type="text" id="txtCantidad" name="txtCantidad"/>  
				</div>
			</div>
			
			<div class="form-group">	
				<label for="txtDescripcion" class="col-sm-3 control-label">Descripcion :</label>
				<div class="col-sm-9">
				<input class ="col-sm-8 type="text" id="txtDescripcion" name="txtDescripcion"/>
				</div>
			</div>
			</div>
			
			
			<!---columnaderecha-->
			<div class="col-md-6" style="">
				<div class="form-group">
				<label>Activo:</label>
                        <input type="radio" name="activo" value="si" />Si
                        <input type="radio" name="activo" value="no" />No<br />	
				</div>
				
			<div class="form-group">
            <label>Precio : </label>
            <input type="text" id="txtPrecio" name="txtPrecio"/>  
			</div>		
			
			<div class="form-group">
			<label>Categoria : </label>
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
		
		
          <tr>
            <td>
              <button id="btnProcesar" name="btnProcesar">Procesar 
              </button>
            </td>
            
          </tr>
          <tr colspan ="2" align="center">
            
          </tr>
        

      </form>
    </fieldset>






<script>
$("#frmRegistrar").validationEngine();
</script>

 
 <?php

include_once "footer.php";

?>