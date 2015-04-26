<?php
    session_start();   
        if(!isset($_SESSION["usuario"])){
            header("location: login.php");
        }else{
            require_once('funciones/login/iniciar_sesion.php');
            $sesion = new sesiones();

            //$valor = $sesion->validarAccesoModulos($_SESSION["idUsuario"], "usuarios");
            //if(count($valor) == 0){
                //header("location: pagina_error.php"); //TODO: pagina de error
           // }
        } 

include_once "header.php";

?>


<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>




<br /><br /><br /><br />

<div class="row">

<div class="col-md-7">
          <img  src="images/banner/banner-fhofna6.jpg" alt="banner1"  />
      </div>

  


<div class="page-header">
  <h3><p align="center"><strong><i>Bienvenido a nuestra Fundación</i></strong></p></h3>
	<h3><p align="justify">FHOFNA nace el 23 de octubre de 1996, como una entidad jurídica de derecho privado, de organización civil y sin ánimo de lucro, identificado con el NIT 8220045327 que desea imprimir el carácter cristiano en la sociedad.</p></h3>
</div>

  
 </div> 
  
  
  
<br /><br /><br /><br /><br />	
	
	        
      

 <?php

include_once "footer.php";

?>