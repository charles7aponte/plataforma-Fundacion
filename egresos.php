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
    
</script>



<ul class="nav nav-pills">
    <li id="b_ingreso"  onclick="valorPest('Ingreso')" data-contenido="Ingreso" class="active"><a href="#">Ingreso</a></li>
  <li id="b_egreso"   onclick="valorPest('Egreso')" data-contenido="Egreso"><a href="#">Egreso</a></li>
</ul>


<fieldset><legend><h1 id="titulo" style="text-align: center;">Registrar</h1></legend>
      <form name="frmRegistrar" id="frmRegistrar" class="form-horizontal">
          <input type="hidden" id="accion" value="ingreso">
          
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
                       <label for="concepto" class="col-sm-3 control-label">Concepto:</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="concepto" placeholder="">
                        </div>
                  </div>
                  
                  
                  <div class="form-group">                    
                       <label for="beneficiario" class="col-sm-3 control-label">Beneficiario:</label>
                    
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="beneficiario" name="beneficiario" placeholder="">
                        </div>
                  </div>
                  
                  
                  
                  
                <div class="form-group">                    
                       <label for="modalidad" class="col-sm-3 control-label">Modalidad</label>
                    
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="modalidad" name="modalidad" >
                        </div>
                  </div>
              </div>
              
              
              <!-- columna dere-->
              <div class="col-md-6">
                   <div class="form-group">                    
                       <label for="valor" class="col-sm-3 control-label">Valor:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="valor" class="form-control" id="valor" >
                        </div>
                  </div>
                  
                  
                    <div class="form-group">                    
                       <label for="recibido" class="col-sm-3 control-label">Recibido de:</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="recibido" name="recibido" placeholder="">
                        </div>
                  </div>
                  
                  
                  <div class="form-group">                    
                       <label for="cc" class="col-sm-3 control-label">CC o NIT:</label>
                    
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="cc" name="cc" placeholder="12345">
                        </div>
                  </div>
                  
                  <div class="form-group">                    
                       <label for="fecha" class="col-sm-3 control-label">Fecha:</label>
                    
                        <div class="col-sm-5">
                            
                            <input type="" style="cursor:pointer" 
                                            readonly id="fecha-proyecto" class="date form-control" data-format="dd/MM/yyyy" name="fecha" value="dd/mm/aaaa"  /> 

                            
                        
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