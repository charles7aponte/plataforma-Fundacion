<!DOCTYPE html>
<html lang="en">
	<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/jquery.dataTables.css">




	<!-- Latest compiled and minified JavaScript -->
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	
	<script src="js/bootstrap.js"></script>
        <script>       
            $(document).ready(function(){
                document.getElementById("cerrarSesion").addEventListener("click", function(event){
                    event.preventDefault();
                    $.ajax({ 
                      type: "POST",
                      url:"funciones/login/iniciar_sesion.php",
                      data: {sesion: 'Cerrar'}                  
                    }).done(function() {
                        location.reload(); 
                    });
                    
                });
            });
            




            
             $(document).ready(function() {
              $('.navbar a.dropdown-toggle').on('click', function(e) {
                  var elmnt = $(this).parent().parent();
                  if (!elmnt.hasClass('nav')) {
                      var li = $(this).parent();
                      var heightParent = parseInt(elmnt.css('height').replace('px', '')) / 2;
                      var widthParent = parseInt(elmnt.css('width').replace('px', '')) - 10;

                      if(!li.hasClass('open')) li.addClass('open')
                      else li.removeClass('open');
                      $(this).next().css('top', heightParent + 'px');
                      $(this).next().css('left', widthParent + 'px');

                      return false;
                  }
              });
          });
          

            
        </script>
	
	<meta charset="UTF-8">
	<title>Fundacion hogar familia de Nazareth</title>
</head>
<body>



	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
       	
        	

          <div class="navbar-header" style="width: 46%">


          
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Fundacion ..</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            
          <div>
          
              <a class="navbar-brand" href="#"  style="height: inherit; padding-top: 0px;">
                  <div id="logo" class="site-branding ">
                          <div id="site-logo">
                            <img src="http://www.fundacionhogarfamiliadenazareth.org/sites/default/files/nuevo-logo12.png" alt="Inicio">


                          </div>        


                    </div>
              </a>

              <h1 id="site-title">
                <a href="#"  style="text-decoration: none"  title="Inicio">Fundación Hogar Familia de Nazareth FHOFNA</a>
              </h1>
           </div>    
        </div>
          
          
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" style="float: right;">
              <?php
                require_once('funciones/login/iniciar_sesion.php');
                    
                    if(isset($_SESSION["idUsuario"])){
                        $sesion = new sesiones();                      
                        $credenciales = $sesion->validaModulos($_SESSION["idUsuario"]);
                        echo '<li><a href="inicio2.php">Inicio</a></li>';//pagina de inicio
                        for($i= 0; $i<count($credenciales); $i++){
                            if($credenciales[$i]->modulosId == 1){
                                //echo '<li><a href="ejemplo1.php">Inventario</a></li>';
                              echo'
                                    <li>
                                      <a href="ejemplo1.php" class="dropdown-toggle" data-toggle="dropdown">Inventario<b class="caret"></b></a>
                                      <ul class="dropdown-menu">


                                                <li><a href="ejemplo1.php">Registros</a></li>
                                                <li><a href="reportes_inventarios.php">Reporte</a></li>
                                                


                                      </ul>
                                    </li>';
                            }
                            if($credenciales[$i]->modulosId == 2){
                                //echo '<li><a href="ingresos.php">Ingresos/Egresos</a></li>';
                                echo'
                                    <li>
                                      <a href="ingresos.php" class="dropdown-toggle" data-toggle="dropdown">Contabilidad<b class="caret"></b></a>
                                      <ul class="dropdown-menu">


                                                <li><a href="ingresos.php">Ingresos</a></li>
                                                <li><a href="egresos.php">Egresos</a></li>
                                                <li><a href="reportes_contabilidad.php">Reportes</a></li>
                                                



                                      </ul>
                                    </li>';
                              
                            }
                            if($credenciales[$i]->modulosId == 3){
                                echo '<li><a href="usuarios.php">Usuarios</a></li>';                            
                            }
                            if($credenciales[$i]->modulosId == 4){
                                //echo '<li><a href="hv.php">HV/Asistentes</a></li>';
                                echo'
                                  <li>
                                    <a href="hv.php" class="dropdown-toggle" data-toggle="dropdown">Eventos/Retiros<b class="caret"></b></a>
                                    <ul class="dropdown-menu">

                                      
                                              
                                              <li><a href="hv_asistentes.php">Eventos</a></li>
                                              <li><a href="retiros.php">Retiros</a></li>
                                              
                                              <li><a href="#">Reportes</a></li>

                                          
                                      
                                    </ul>
                                  </li>';
                            }
                            if($credenciales[$i]->modulosId == 5){
                                echo'
                                  <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Donaciones<b class="caret"></b></a>
                                    <ul class="dropdown-menu">

                                      
                                              <li><a href="inscripcion_padrinos.php">Registrar padrino</a></li>
                                              <li><a href="hv.php">HV servidores</a></li>
                                              <li><a href="donaciones.php">Donaciones</a></li>
                                              <li><a href="#">Reportes</a></li>

                                          
                                      
                                    </ul>
                                  </li>';                            
                            }
                        }
                        //echo '<li><a href="inicio.php">Inicio</a></li>';//pagina de inicio
                        echo '<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$_SESSION["usuario"].' <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Ajustes</a></li>
                                  <li><a href="#" id="cerrarSesion" >Salir</a></li>

                                </ul>
                              </li>';
                    }
                    
                ?>
            <!--<li><a href="ejemplo1.php">Inventario</a></li>
            <li><a href="ingresos.php">Ingresos/Egresos</a></li>
            <li><a href="hv.php">HV/Asistentes</a></li>
            <li><a href="usuarios.php">Usuarios</a></li>-->
            
          </ul>
 
        </div><!--/.nav-collapse -->
      </div>
    </nav>

        <div id="contenidos" style=" width: auto;background: rgb(197, 225, 250);padding-bottom: 20px;min-height: 484px;">
<div class="container" style="padding-top:160px;">