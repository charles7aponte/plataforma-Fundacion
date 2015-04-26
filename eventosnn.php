<?php
    session_start();   
    if(!isset($_SESSION["usuario"])){
        header("location: login.php");
    }else{
        require_once('funciones/login/iniciar_sesion.php');
        $sesion = new sesiones();
        
        $valor = $sesion->validarAccesoModulos($_SESSION["idUsuario"], "HV/Asistentes");
        if(count($valor) == 0){
            header("location: pagina_error.php"); //TODO: pagina de error
        }
    }
   


include_once "php/generated/include_dao.php";
include_once "php/generated/GeneraHTMLAsistentes.php";
include_once "php/generated/GeneraHTMLhv.php";
include_once "php/generated/asistentes/controlAsistente.php";
include_once "php/generated/hojas_de_vida/controlHv.php";
include_once "header.php";

?>


<style>
    div.datepicker{
    z-index: 99999 !important;
        
    }
    
    .mifecha{
      cursor:pointer !important;
    }
    
    
</style>

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
    
    function valorPest(valor){
        
        $("#frmRegistrar").reset();
        
        if(valor == 'hv')
        {
            $("#b_hv").addClass('active');
            $("#b_asistente").removeClass('active');
            $("#accion").val('hv');
			
			
			$("#p_cc").show();
			$("#p_fecha_nacimiento").show();
			$("#p_direccion").show();
			$("#p_godson").show();
      //$("#telefono").show();
			$("#p_ciudad").hide();
			
        }
        else {//asistentes
            
            $("#b_hv").removeClass('active');
            $("#b_asistente").addClass('active');
            $("#accion").val('asistencias');
            
			$("#p_cc").hide();
				$("#p_fecha_nacimiento").hide();
				$("#p_direccion").hide();
				$("#p_godson").hide();
				$("#p_ciudad").show();
				$("#p_telefono").hide();
		}
        
        $("#text_bt_guardo").html("Agregar "+valor);
        
    }
	
	
	
	 function enviarDatos(){
 
		 
		 if($("#frmRegistrar").validationEngine('validate'))
		 {
			document.getElementById("frmRegistrar").submit();
		 
		 }
		 
		 
		 return false;
		 
	 }
	 
	 
	 
  function eliminarHv(id, Id){
 

	if (confirm("Esta seguro de eliminar?")) {
            //id es igual
            var ced ="id="+id;
            $.ajax({ 
		type: "POST",
		url:"php/generated/hojas_de_vida/eliminarHv.php",
		data: ced,
		success:function(respuesta)
                    {
			console.log(respuesta);
									
									
			if(respuesta=="1")
                            {
						
                                $("#"+Id).remove();
									 
                            }
                            //	location.reload(true);
                    }
                    });
				    
	}	
    }
      
      
      
      
        function editar(nombres, apellidos, fechaNac, edad, email, direccion, cc, godson, telefono, miid){
				//procedimiento = "editar";
			
                $("#titulo").html("Editar HV");
                $('#txtNombres').val(nombres);
                $('#txtApellidos').val(apellidos);
                
                $('#p_fecha_nacimiento').val(fechaNac);
                
                $('#edad').val(edad);
                $('#email').val(email);
                $('#direccion').val(direccion);
                $('#cc').val(cc);
                $('#godson').val(godson);
                $('#telefono').val(telefono);
                $("#miid").val(miid);
               
               
                //alert(fechaNac);
								
                $("#btnProcesar").html("Editar");
                $("#miaccion").val("editar");

								
								
														
	}
  
  
  
			
	
      
      
   	function nuevoElemento(){
		
		
		document.getElementById('frmRegistrar').reset();
                $("#titulo").html("Agregar HV");
		$("#btnProcesar").html("Agregar");
		
		$("#miaccion").val("agregar");
		
		return false;
	}	
	
      
 
    
</script>



<ul class="nav nav-pills">
    <li id="b_hv"   data-contenido="hv"  class="active" ><a href="#">Eventos</a></li>
    <li id="b_asistente"   data-contenido="Asistente"><a href="hv_asistentes.php">Asistentes</a></li>
</ul>


<fieldset><legend><h1 id="titulo" style="text-align: center;"></h1></legend>
  
  <?php  if(isset($_GET['e']))
    {
  ?>
  <label>el correo no puede repetir </label>
 
  <?php
    }
  ?>
      <form name="frmRegistrar" id="frmRegistrar"  action="guardarHv.php" method="POST" class="form-horizontal">
          <input type="hidden" id="accion" value="hv">
          
          <input type="hidden" name="accion" id="miaccion" value="agregar">
          <input type="hidden" name="miid" id="miid" value="">
          
          		<input type="hidden" name="organizacion_idorganizacion"  value="0">
          
        <div class="row">
            
              <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><h3 id="titulo">Registrar evento</h3></center></h3>
                   
                </div>
                <div class="panel-body" style="background-color: rgb(197, 225, 250); ">
                   
            
              
              <!-- columna iz1-->
            <div class="col-md-6">
					
		<div class="form-group">                    
                    <label for="txtNombres" class="col-sm-3 control-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text"  name="txtNombres" class ="form-control validate[required,custom[onlyLetterSp]" id="txtNombres" placeholder="Nombre">
                    </div>
                </div>
				
		
				
		<div class="form-group" >                    
                    <label for="fec_inicio" class="col-sm-3 control-label">Fecha de inicio:</label>
                        <div class="col-sm-9">
                          <input type="text"  name="fec_inicio"
                                 readonly="readonly"    class ="form-control validate[required] mifecha" id="fec_inicio" placeholder="Fecha de inicio">
                        </div>
                </div>
	    </div>
              
              
              <!-- columna dere-->
			   
            <div class="col-md-6">
                <div class="form-group">                    
                    <label for="descripcion" class="col-sm-3 control-label">Descripcion:</label>
			
			<div class="col-sm-9">
                            <textarea type="text"  rows="2" name="descripcion" class ="form-control validate[required,custom[onlyLetterSp]" id="descripcion" placeholder="Descripcion"></textarea>
			</div>
		</div>

		<div class="form-group" >                    
                    <label for="fec_final" class="col-sm-3 control-label">Fecha final:</label>
                        <div class="col-sm-9">
                          <input type="text"  name="fec_final"
                                 readonly="readonly"    class ="form-control validate[required] mifecha" id="fec_final" placeholder="Fecha final">
                        </div>
                </div>
                		
            </div>
              
              
        
          
          <br />
          <button 
				
          onclick="enviarDatos()"
          type="button" class="btn btn-primary" style="margin-left: 100px;">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Agregar</b>
          </button>	
          
          <a  class="btn btn-primary" onclick="nuevoElemento()" >Nuevo
          </a>
          
          </div>
        </div>
      </div>
          
    </form>
</fieldset>
	
	
	
	<!---tabla #1--->
	
	<br />
	<br />
        
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><h3>Eventos</h3></center></h3>
                   
                </div>
                <div class="panel-body" style="background-color: rgb(197, 225, 250); ">
                    
        
		<table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                    <thead>
			<tr role="row">
							
                            <th rowspan="1" colspan="1">Nombre</th>
                            <th rowspan="1" colspan="1">Descripcion</th>
                            <th rowspan="1" colspan="1">Fecha de inicio</th>
                            <!--<th rowspan="1" colspan="1">Edad</th>-->
                            <th rowspan="1" colspan="1">Fecha final</th>
                            <!--<th rowspan="1" colspan="1">direccion</th>-->
                            <th rowspan="1" colspan="1">Acciones</th>
			</tr>
                    </thead>
                    <tbody>
                        <?php
                                $g =new GeneraHTMLhv();
                                $g->crearTabla_hv();
                        ?>
                    </tbody>
                    <tfoot>
						
                    </tfoot>


		</table>
                </div>
            </div>
        
  <p></p>       

<button 
	id="generar_hv" onclick="generar()"
	type="button" class="btn btn-primary" style="margin-left: 100px;">
	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnGenerar">Generar reporte</b>
	</button>
        </br></br></br></br>        
        
        

<script>
$("#frmRegistrar").validationEngine();
 
$('.mifecha').datepicker({language:"es", format: 'yyyy-mm-dd'});


</script>


<?php

    include_once "footer.php";

?>