
<?php

include_once "header.php";

?>

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
  
  
    function enviarDatos(){


       if($("#frmRegistrar").validationEngine('validate'))
       {
        document.getElementById("frmRegistrar").submit();

       }


       return false;

     }
  </script>





<fieldset><legend><h1 id="titulo" style="text-align: center;">Inicio de sesion</h1></legend>
  <form name="frmRegistrar" id="frmRegistrar" action="funciones/login/iniciar_sesion.php" method="POST" class="form-horizontal">
          
          
          <div class="row">
              
              <!-- columna iz1-->
              <div class="col-md-6">
                  <div class="form-group">                    
                       <label for="usuario" class="col-sm-3 control-label">Usuario:</label>
                    
                        <div class="col-sm-9">
                          <input type="text"  name="usuario" class="form-control validate[required]" id="usuario" placeholder="Usuario">
                        </div>
                  </div>
                  
                  
                    <div class="form-group">                    
                       <label for="password" class="col-sm-3 control-label">Contraseña:</label>
                    
                        <div class="col-sm-9">
                          <input type="text" class="form-control validate[required]" id="password" name="password" placeholder="Contraseña">
                        </div>
                  </div>
                  
                  
                 
              
              
             
            </div>  
              
          </div>
          
          
          <button onclick="enviarDatos()"
          type="button" class="btn btn-primary" style="margin-left: 100px;">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
          <b id="btnProcesar">Iniciar sesion</b>
          </button>	
          
          
          
      </form>
    </fieldset>
	
	
	        
        
<script>
$("#frmRegistrar").validationEngine();
 
$('.date').datepicker({language:"es"});







</script>

 
 <?php

include_once "footer.php";

?>