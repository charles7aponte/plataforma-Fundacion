<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
} else {
    require_once('funciones/login/iniciar_sesion.php');
    $sesion = new sesiones();

    $valor = $sesion->validarAccesoModulos($_SESSION["idUsuario"], "inventarios");
    if (count($valor) == 0) {
        header("location: pagina_error.php");
    }
}


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

    .mifecha{
        cursor:text !important;
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
        $(this).each(function () {
            this.reset();
        });
    }


    function changeCategoria(id, nombre)
    {
        $("#nombre_categoria").html("" + nombre);

        $("#id_categoria").val(id);
    }



    function cambioCategoriById(id) {

        var nombreSelect = $("#id_lista_selec_categoria_" + id + " a").html();

        $("#nombre_categoria").html("" + nombreSelect);

        $("#id_categoria").val(id);

    }


    function enviarDatos(p_crear,p_editar) {

        if(p_crear == 1){
            if ($("#frmRegistrar").validationEngine('validate'))
                document.getElementById("frmRegistrar").submit();
             }else{
            alert("No tiene permiso");
        }
            


        return false;

    }


    function eliminarElemento(idelementos, id, p_eliminar) {
        if(p_eliminar == 1){
        if (confirm("Esta seguro de eliminar?")) {
            //Cedula es igual
            var ced = "id=" + idelementos;
            $.ajax({
                type: "POST",
                url: "php/generated/inventarios/eliminar.php",
                data: ced,
                success: function (respuesta)
                {
                    console.log(respuesta);
                    if (respuesta == "1")
                    {
                        $("#" + id).remove();
                    }
                    //	location.reload(true);
                }
            });

        }
    }else 
            alert("No tiene permisos");
        
    }



    function editar(nombre, cantidad, precio, descripcion, activo, fechaIngreso, fechaCompra, medida, categoria, miid, permiso) {
        //procedimiento = "editar";
        if(permiso == 1){
            $("#titulo").html("Editar elemento");
            $('#txtNombres').val(nombre);
            $('#cantidad').val(cantidad);
            $('#descripcion').val(descripcion);
            $('#precio').val(precio);
            $('#fecha_ing').val(fechaIngreso);
            $('#fecha').val(fechaCompra);
            $('#medida').val(medida);
            $("#miid").val(miid);
            console.log(activo);
            if (activo == 1) {
                document.getElementById("si").checked = true;
            }
            else if (activo == 0) {
                document.getElementById("no").checked = true;
            }


            $("#btnProcesar").html("Editar");
            $("#miaccion").val("editar");
            cambioCategoriById(categoria);


        }
        else{
            alert("No tiene permiso para la acción");
            }

    }


    function nuevoElemento(p_agregar) {

        if(p_agregar == 1){
        document.getElementById('frmRegistrar').reset();
        $("#btnProcesar").html("Agregar");
        $("#titulo").html("Agregar elemento");
        $("#miaccion").val("agregar");

        }else{
            alert("no tiene permiso para la acción");
        }
        
        return false;
    }



    function cambiarIdCategoriaPorElNombreTable() {
        var lista = $(".mi_td_categoria");

        for (var i = 0; i < lista.length; i++)
        {
            var miHtml = $(lista[i]).html();

            var nombreSelect = $("#id_lista_selec_categoria_" + miHtml + " a").html();
            $(lista[i]).html(nombreSelect);

        }

    }





    var clic = 1;
    function AgregarNuevaCategoria() {

        if (clic == 1) {
            document.getElementById('newCategoria').style.visibility = 'visible';
            $("#btnAgregarCategoria").html("Agregar");
            clic = clic + 1;
        } else {
            var n = $("#nombreNuevaCategoria").val();
            var d = $("#DescripcionNuevaCategoria").val();
            console.log(n + " - " + d);
            if (n != "" && d != "") {
                $.ajax({
                    type: "POST",
                    url: "guardarCategoria.php",
                    data: {nombre: n, descripcion: d, accion: "agregarCategoria"},
                    success: function (respuesta)
                    {
                        console.log(respuesta);
                        if (respuesta == "1")
                        {
                            generarSelectCategorias();
                            document.getElementById('newCategoria').style.visibility = 'hidden';
                            $("#btnAgregarCategoria").html("Añadir categoria");
                            
                            clic = 1;
                        }
                    }
                });
            } else {
                alert("Debe diligenciar todos los datos de la categoria a agregar");
            }
        }
    }

    function CancelarNuevaCategoria() {
        $("#nombreNuevaCategoria").val("");
        $("#DescripcionNuevaCategoria").val("");

        document.getElementById('newCategoria').style.visibility = 'hidden';
        $("#btnAgregarCategoria").html("Añadir categoria");
        clic = 1;
    }

    function generarSelectCategorias() {
        $.ajax({
            type: "GET",
            url: "guardarCategoria.php?accion=obtenerTodos",
            success: function (respuesta){
                pintarSelect(JSON.parse(respuesta));
            }
        });
    }
    $(document).ready(function(){
        generarSelectCategorias();
    });
    
    function pintarSelect(arreglo){
        if(arreglo.length > 0){            
            var xx = $("#selectorCategorias ").empty();
              
            var data =  "<input type='hidden' name='id_categoria' id='id_categoria' value='"+arreglo[0].id+"'>";

            data +="<button class='btn btn-default dropdown-toggle form-control' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-expanded='true'> "
                    + "<b id='nombre_categoria'>"+arreglo[0].nombre+"</b>"
                    + "<span class='caret'></span> "
                    + "</button>"
                    + "<ul class='dropdown-menu ' role='menu' aria-labelledby='dropdownMenu1' >";
            for(var i=0;i< arreglo.length; i++)
            {
                    data += "<li role='presentation' id='id_lista_selec_categoria_"+arreglo[i].id+"' onclick=\"changeCategoria("+arreglo[i].id+",'"+arreglo[i].nombre+"'  )\"><a role='menuitem' onclick='return false' tabindex='-1' href='#'>"+arreglo[i].nombre+"</a></li>";
            }
            data +="</ul>";
            
            $("#selectorCategorias").html(data);            
        }
        
    }







</script>




<!---style="border:1px solid white" --para bordear fieldset-->

<fieldset>
    <form  name="frmRegistrar" id="frmRegistrar" action="ejemplo1F.php" method="POST" class="form-horizontal">
        <input type="hidden" name="accion" id="miaccion" value="agregar">
        <input type="hidden" name="miid" id="miid" value="">

        <input type="hidden" name="organizacion_idorganizacion"  value="0">



        <div class="row">
            
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><h4 id="titulo">Registrar elemento</h4></center></h3>
                </div>
                <div class="panel-body" style="background-color: rgb(197, 225, 250); ">



            <!---columnaizquierda-->
            <div class="col-md-6">
                <br />

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
                    <label for="activo" class="col-sm-3 control-label">Activo:</label>
                    <div class="col-sm-3">
                        <input type="radio" name="activo" value="1"  id="si" checked/>Si
                        <input type="radio" name="activo"  value="0" id="no"/>No<br />	
                    </div>
                </div>


                <div class="form-group">                    
                    <label for="medida" class="col-sm-3 control-label">Medida:</label>

                    <div class="col-sm-9">
                        <input type="text"  name="medida" class ="form-control validate[required,custom[onlyLetterSp]" id="medida" placeholder="Unidades, metros u otros">
                    </div>
                </div>

                <div class="form-group">                    
                    <label for="descripcion" class="col-sm-3 control-label">Descripcion:</label>

                    <div class="col-sm-9">

<!---  <input type="text"  name="descripcion" class ="form-control validate[required,custom[onlyLetterSp]" id="descripcion" placeholder="Descripcion">-->
                        <textarea type="text" rows="2"  name="descripcion" class ="form-control validate[required]" id="descripcion" placeholder="Descripcion"></textarea>
                    </div>
                </div>




            </div>



            <!---columnaderecha-->
            <div class="col-md-6" style="">
                <br />


                <div class="form-group">                    
                    <label for="precio" class="col-sm-3 control-label">Precio:</label>
                    <div class="col-sm-9">
                        <input type="text"  name="precio" class="form-control validate[required,custom[onlyNumberSp]" id="precio" placeholder="Precio">
                    </div>
                </div>	




                <!--<div class="form-group" >                    
                    <label for="fec_nacimiento" class="col-sm-3 control-label">Fecha ingreso(hoy):</label>
                    <div class="col-sm-9">
                        <input type="text"  name="fecha_ing"
                                  class ="form-control validate[required] mifecha" id="fecha_ing" placeholder="AAAA-MM-DD">
                    </div>
                </div>
               -->

                <div class="form-group" >                    
                    <label for="fec_nacimiento" class="col-sm-3 control-label">Fecha compra:</label>
                    <div class="col-sm-9">
                        <input type="text"  name="fecha"
                                class ="form-control validate[required] mifecha" id="fecha" placeholder="AAAA-MM-DD">
                    </div>
                </div>

                <div class="form-group">
                    <label for="precio" class="col-sm-3 control-label">Categoria:</label>

                    <div class="col-sm-4">
                        <div id="seleccion_cat">
                            <div class="dropdown" id="selectorCategorias">
                                
                                <?php
                                $g = new GeneraHTML();
                                $g->generarSelecCategoria();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-default btn-success form-control" onclick="AgregarNuevaCategoria()" id="btnAgregarCategoria" <b id="btnAgregarCategoria">Añadir categoria</b></button>
                    </div>
                </div>
                <div class="form-group" id="newCategoria" style="visibility:hidden" >
                    <div class="row">
                        <label for="Categoria" class="col-sm-3 control-label">Nueva categoria:</label>
                        <div class="col-sm-5">                        
                            <input type="text"  id="nombreNuevaCategoria" name="newCategoria" class="form-control" id="newCategoria"  placeholder="Nueva categoria">
                        </div>
                        <div class="col-sm-3">                        
                            <button type="button" class="btn btn-default btn-warning form-control" onclick="CancelarNuevaCategoria()" id="btnCancelarCategoria" <b id="btnCancelarCategoria">Cancelar</b></button>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <label for="Categoria" class="col-sm-3 control-label">Descripción categoria:</label>
                        <div class="col-sm-8">  
                            <textarea rows="3" id="DescripcionNuevaCategoria" class="form-control" maxlength="300" placeholder="Descricion de la categgoria"></textarea>
                            <!--<input type="text"  name="newCategoria" class="form-control" id="newCategoria"  placeholder="Nueva categoria">-->
                        </div>
                    </div>


                </div>



                <!--<form  name="frmRegistrarCategoria" id="frmRegistrarCategoria" action="guardarCategoria.php" method="POST" class="form-horizontal">-->

                <!--</form>  -->
            </div>

        

        <br />
        <?php
        echo'<button 
            onclick="enviarDatos('.$valor[0]["permiso_agregar"].','.$valor[0]["permiso_editar"].')"
            type="button" class="btn btn-primary" style="margin-left: 100px;">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Agregar</b>
        </button>	

        <a  class="btn btn-primary" onclick="nuevoElemento('.$valor[0]["permiso_agregar"].','.$valor[0]["permiso_editar"].')" >Nuevo</a>';
        ?>
        
         </div>
    </div>
   </div>




    </form>


    <!--                      <form  name="frmRegistrarCategoria" id="frmRegistrarCategoria" action="guardarCategoria.php" method="POST" class="form-horizontal">
                            <input type="hidden" name="accion" id="miCategoriaa" value="agregarCategoria">
                            <div>
                            <button type="button" class="btn btn-default navbar-btn" onclick="AgregarNuevaCategoria()" id="btnAgregarCategoria" <b id="btnAgregarCategoria">Añadir categoria</b></button>
                            <div class="col-sm-4">
                                      <input type="text"  name="newCategoria" style="visibility:hidden" class="form-control" id="newCategoria"  placeholder="Nueva categoria">
                                 </div>
                            </div>
                          </form>  -->


</fieldset>


<!---tabla--->
<br />
<br />

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><center><h4>Elementos</h4></center></h3>

        </div>
        <div class="panel-body" style="background-color: rgb(197, 225, 250); ">

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
                $g->crearTabla($valor[0]["permiso_editar"], $valor[0]["permiso_eliminar"]);
                ?>
            </tbody>
            <tfoot>
            </tfoot>


        </table>
            
           </div>
    </div>
            
<br/>

<!--<button 
    id="generar" onclick="generar()"
    type="button" class="btn btn-primary" style="margin-left: 100px;">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnGenerar">Generar reporte</b>
</button>-->
</br></br></br></br>

<script>
    $("#frmRegistrar").validationEngine();

    cambiarIdCategoriaPorElNombreTable();

//$('.date').datepicker({language:"es"});
    $('.mifecha').datepicker({language: "es", format: 'yyyy-mm-dd'});

    function generar() {
        $.ajax({
            type: "GET",
            url: "php/generated/reportes/reporte_service.php?accion=ingresos-egresos"
        });
    }
</script>


<?php
include_once "footer.php";
?>