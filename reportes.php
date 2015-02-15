<?php

include_once "php/generated/include_dao.php";
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
   	
	
	 function enviarDatos(){
 
		 
		 if($("#frmRegistrar").validationEngine('validate'))
		 {
			document.getElementById("frmRegistrar").submit();
		 
		 }
		 
		 
		 return false;
		 
	 }
	 
	 
	 
  		
	
      
      
   	function nuevoElemento(){
		
		
		document.getElementById('frmRegistrar').reset();
                $("#titulo").html("Agregar asistente");
		$("#btnProcesar").html("Agregar");
		
		$("#miaccion").val("agregar");
		
		return false;
	}	
	
      
 
    
</script>





<fieldset><legend><h1 id="titulo" style="text-align: center;">Generar reporte</h1></legend>
  
      <form name="frmRegistrar" id="frmRegistrar"  action="guardarAsistente.php" method="POST" class="form-horizontal">
          
          <input type="hidden" name="accion" id="miaccion" value="generar">
          
          
          
          <div class="row">
              
              <!-- columna iz1-->
                <div class="col-md-6">
					
                    <div class="form-group">                    
                    
                    
                        <div class="col-sm-9">
                          <label>Selecciona fecha inicial:</label>
                            <input type="text" class ="form-control" name="pais" id="pais" list="paises"/>
                              <datalist id="paises">
                              <option value="España" />
                              <option value="México" />
                              <option value="Argentina" />
                              <option value="Perú" />
                              <option value="Colombia" />
                              <option value="Otro país" /> 
                              </datalist>
                        </div>
                    </div>
				
                    
                
                </div>
              
              
              <!-- columna dere-->
			   
			  
                <div class="col-md-6">
                    
                  <div class="form-group">                    
                    
                    
                        <div class="col-sm-9">
                          <label>Selecciona fecha final:</label>
                            <input type="text" class ="form-control" name="pais" id="pais" list="paises"/>
                              <datalist id="paises">
                              <option value="España" />
                              <option value="México" />
                              <option value="Argentina" />
                              <option value="Perú" />
                              <option value="Colombia" />
                              <option value="Otro país" /> 
                              </datalist>
                        </div>
                    </div>
                  
                </div>
              
              
            </div>
          
          
            <button 
            onclick="enviarDatos()"
            type="button" class="btn btn-primary" style="margin-left: 100px;">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Generar</b>
            </button>	
          
            <a  class="btn btn-primary" onclick="nuevoElemento()" >Nuevo</a>
          
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
                        <th rowspan="1" colspan="1">Fecha</th>
                        <th rowspan="1" colspan="1">Beneficiario</th>
                        <th rowspan="1" colspan="1">Forma pago</th>
                        <th rowspan="1" colspan="1">Aprobado por</th>
                        <th rowspan="1" colspan="1">valor</th>
                        <th rowspan="1" colspan="1">Por concepto</th>
                    </tr>
		</thead>
		      <tbody>


           

                      <tr role="row" class="odd">
                        <td class="sorting_1">2015-07-23</td>
                        <td>pablo perez</td>
                        <td>cheque</td>
                        <td>victor sanchez</td>
                        <td>300000</td>
                        <td>deuda anterior</td>

                        
                      </tr>
           

      </tbody>
		<tfoot>
						
		</tfoot>


            </table>
	


<button 
	id="generar_asistente" onclick="generar()"
	type="button" class="btn btn-primary" style="margin-left: 100px;">
	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnGenerar">Generar reporte</b>
	</button>
        </br></br></br></br>        
        
        
<script>
$("#frmRegistrar").validationEngine();
 
$('.date').datepicker({language:"es"});

</script>

 
<?php

    include_once "footer.php";

