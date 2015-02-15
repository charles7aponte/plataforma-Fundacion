<?php


include_once "php/generated/GeneraHTML.php";
include_once "php/generated/inventarios/controlInventario.php";
include_once "header.php";



//$guardarElemento = new controlInventario();
//$guardarElemento->guardarInventario();

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
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="css/estilo.css" type="text/css"/>

<script>

  jQuery.fn.reset = function () {
    $(this).each (function() { this.reset(); });
  }
 
    
    function changeCategoria(id, nombre)
 {
	$("#nombre_categoria").html(""+nombre);
 
	$("#id_categoria").val(id);
 }

 
 
 function cambioCategoriById(id){
 
	var nombreSelect = $("#id_lista_selec_categoria_"+id+" a").html(); 
	
	$("#nombre_categoria").html(""+nombreSelect);
	
	$("#id_categoria").val(id);
 
 }
 
 
 function enviarDatos(){
 
 
 if($("#frmRegistrar").validationEngine('validate'))
 {
	document.getElementById("frmRegistrar").submit();
 
 }
 
 
 return false;
 
 }
 
 
    function eliminarElemento(idelementos, id){

      if (confirm("Esta seguro de eliminar?")) {
                //Cedula es igual
                var ced ="id="+idelementos;
                $.ajax({ 
                        type: "POST",
                        url:"php/generated/inventarios/eliminar.php",
                        data: ced,
                        success:function(respuesta)
                          {
                            console.log(respuesta);
                            if(respuesta=="1")
                              {
                                  $("#"+id).remove();						 
                              }
                //	location.reload(true);
                          }
                      });

      }	
    }
			
			
			
    function editar(nombre, cantidad,  precio,descripcion, activo,categoria, miid){
				//procedimiento = "editar";
            $("#titulo").html("Editar elemento");		
            $('#txtNombres').val(nombre);
            $('#cantidad').val(cantidad);
            $('#descripcion').val(descripcion);
            $('#precio').val(precio);
            $("#miid").val(miid);			
            console.log(activo);
                      if(activo==1){
                          document.getElementById("si").checked=true;
                      }
                      else if(activo==0){
              document.getElementById("no").checked=true;
                      }

								
            $("#btnProcesar").html("Editar");							
            $("#miaccion").val("editar");
            cambioCategoriById(categoria);
								
														
    }
			
			

	function nuevoElemento(){
		
		
		document.getElementById('frmRegistrar').reset();
		$("#btnProcesar").html("Agregar");
		$("#titulo").html("Agregar elemento");
		$("#miaccion").val("agregar");
		
		return false;
	}	
	
	
	
	function cambiarIdCategoriaPorElNombreTable(){
		var lista = $(".mi_td_categoria");
		
		for(var i=0; i< lista.length ; i++)
		{
			var miHtml=$(lista[i]).html();
			
			var nombreSelect = $("#id_lista_selec_categoria_"+miHtml+" a").html(); 
			$(lista[i]).html(nombreSelect);
			
		}
	
	}

</script>



	
	<!---style="border:1px solid white" --para bordear fieldset-->
	
<fieldset><legend><h1 id="titulo" style="text-align: center;">Registrar elemento</h1></legend>
    <form  name="frmRegistrar" id="frmRegistrar" action="ejemplo1F.php" method="POST" class="form-horizontal">
        <input type="hidden" name="accion" id="miaccion" value="agregar">
        <input type="hidden" name="miid" id="miid" value="">
	
		
		
      <div class="row">
		
				
                    <!---columnaizquierda-->
                    <div class="col-md-6">
			
			
                        <div class="form-group">                    
                            <label for="txtNombres" class="col-sm-3 control-label">Nombre:</label>
                    
                            <div class="col-sm-9">
                                <input type="text"  name="txtNombres" class ="form-control validate[required,custom[onlyLetterSp]" id="txtNombres" placeholder="Nombre">
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
                                <input type="text"  name="descripcion" class ="form-control validate[required,custom[onlyLetterSp]" id="descripcion" placeholder="Descripcion">
                            </div>
                        </div>   
			
                    </div>
                    
                    
			
                  <!---columnaderecha-->
                    <div class="col-md-6" style="">
                        <div class="form-group">
                            <label for="activo" class="col-sm-3 control-label">Activo:</label>
                            <input type="radio" name="activo" value="1"  id="si" checked/>Si
                            <input type="radio" name="activo"  value="0" id="no"/>No<br />	
                        </div>
				
                        <div class="form-group">                    
                            <label for="precio" class="col-sm-3 control-label">Precio:</label>
                            <div class="col-sm-9">
                                <input type="text"  name="precio" class="form-control validate[required,custom[onlyNumberSp]" id="precio" placeholder="Precio">
                           </div>
                        </div>	

                        <div class="form-group">
                            <label for="precio" class="col-sm-3 control-label">Categoria:</label>
                            <br>
                            <div id="seleccion_cat">
                              <div class="dropdown">

                                  <?php  
                                      $g =new GeneraHTML();
                                      $g->generarSelecCategoria();
                                  ?>
                              </div>
                            </div>  
                        </div>
			
			
                    </div>
		
		</div>
    
		
	<button 
	onclick="enviarDatos()"
	type="button" class="btn btn-primary" style="margin-left: 100px;">
	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Agregar</b>
	</button>	
          
	<a  class="btn btn-primary" onclick="nuevoElemento()" >Nuevo</a>
            
            
          
          
        

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
                    <th rowspan="1" colspan="1">Nombre</th>
                    <th rowspan="1" colspan="1">Activo</th>
                    <th rowspan="1" colspan="1">Precio</th>
                    <th rowspan="1" colspan="1">Categoria</th>
                    <th rowspan="1" colspan="1">Descripcion</th>
                    <th rowspan="1" colspan="1">Cantidad</th>
                    <th rowspan="1" colspan="1">Acciones</th>
		</tr>
            </thead>
            <tbody>
                <?php

                        $g->crearTabla();
                ?>
            </tbody>
            <tfoot>
            </tfoot>


	</table>
        <br/>

<button 
	id="generar" onclick="generar()"
	type="button" class="btn btn-primary" style="margin-left: 100px;">
	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnGenerar">Generar reporte</b>
	</button>
        </br></br></br></br>
        
<script>
$("#frmRegistrar").validationEngine();

cambiarIdCategoriaPorElNombreTable();

$('.date').datepicker({language:"es"});
</script>

 
<?php

    include_once "footer.php";

?>