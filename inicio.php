<?php
    session_start();   
        if(!isset($_SESSION["usuario"])){
            header("location: login.php");
        }else{
            require_once('funciones/login/iniciar_sesion.php');
            $sesion = new sesiones();

            $valor = $sesion->validarAccesoModulos($_SESSION["idUsuario"], "usuarios");
            if(count($valor) == 0){
                header("location: pagina_error.php"); //TODO: pagina de error
            }
        } 

include_once "header.php";

?>

<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap-datepicker.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap-datepicker.es.js" type="text/javascript" charset="utf-8"></script>

<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>



<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/datepicker.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="css/estilo.css" type="text/css"/>


<!---MOdificado-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css"/>




  
<div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-interval="4000" data-ride="carousel">
    	<!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Carousel items -->
        <div class="carousel-inner">
          <div class="active item"><img  src="images/banner/image-1.jpg" alt="banner1" />
                <h2>Slide 1</h2>
         		<div class="carousel-caption">
                  <h3>Fundacion hogar familia de Nazareth</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>Dejanos ser parte de tu vida
            </div>
            <div class="item"><img  src="images/banner/image-2.jpg" alt="banner1" />
                <h2>Slide 2</h2>
                <div class="carousel-caption">
                  <h3>Dejanos ser parte de tu vida</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="item"><img  src="images/banner/image-3.jpg" alt="banner1" />
                <h2>Slide 3</h2>
                <div class="carousel-caption">
                  <h3>Gracias por tu labor administrativa</h3>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>

<div class="page-header">
	<h3>Nace el 23 de octubre de 1996, como una entidad jurídica de derecho privado, de organización civil y sin ánimo de lucro, identificado con el NIT 8220045327 que desea imprimir el carácter cristiano en la sociedad, regida por el derecho la ley y los estatutos, procurando el bien común en forma integral, desde el alma, fin de nuestra existencia a lo exterior, lo material como medios para subsistir.</h3>
</div>

  
  
  
  
  
	
	
	        
      

 <?php

include_once "footer.php";

?>