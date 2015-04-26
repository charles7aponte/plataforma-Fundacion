
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
<link rel="stylesheet" href="css/estilo.css" type="text/css"/>

<!---MOdificado-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>

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
  <br /><br /><br />
  <div class="row">
      <div class="col-md-7">
          <img  src="images/banner/banner-fhofna6.jpg" alt="banner1"  />
      </div>
      <div class="col-md-4">
            <div class="panel panel-default">
                <div  class="panel-body">
                        <div class="page-header" align="center">
                                <h3>Sistema administrativo FHOFNA</h3>
                        </div>
                        <form role="form" name="frmRegistrar" id="frmRegistrar" action="funciones/login/iniciar_sesion.php" method="POST">
                                <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input type="text" class="form-control validate[required]"  name="usuario" id="usuario" placeholder="Usuario">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                                <input type="password" name="password" class="form-control validate[required]" id="password" placeholder="Contraseña">
                                        </div>
                                </div>
                                <hr/>
                                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Volver</button>
                                <button type="submit" onclick="enviarDatos()" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Iniciar sesion</button>
                                <p><br/></p>
                        </form>
                </div>
            </div>
      </div>      
  </div>        
        
<script>
$("#frmRegistrar").validationEngine();
 
$('.date').datepicker({language:"es"});







</script>
<br />
 

<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>

 <?php

include_once "footer.php";

?>