


<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
} else {
    require_once('funciones/login/iniciar_sesion.php');
    $sesion = new sesiones();

    $valor = $sesion->validarAccesoModulos($_SESSION["idUsuario"], "usuarios");
    if (count($valor) == 0) {
        header("location: pagina_error.php"); //TODO: pagina de error
    }
}
 



include_once "php/generated/include_dao.php";
include_once "php/generated/GeneraHTMLUsuarios.php";
include_once "php/generated/usuarios/controlUsuario.php";
include_once "header.php";
?>

<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>


<script>

    function enviarDatos() {
        if ($("#frmRegistrar").validationEngine('validate')) {
            document.getElementById("frmRegistrar").submit();
        }
        return false;
    }

    function eliminarUsuario(idusuario, id, p_eliminar) {
        if(p_eliminar == 1){
            if (confirm("Esta seguro de eliminar?")) {
                //id es igual
                var ced = "id=" + idusuario;
                $.ajax({
                    type: "POST",
                    url: "php/generated/usuarios/eliminarUsuario.php",
                    data: ced,
                    success: function (respuesta)
                    {
                        console.log(respuesta);
                        if (respuesta == "1") {
                            $("#" + id).remove();
                        }
                    }
                });
            }
            }else 
            alert("No tiene permisos");
        
    
    }



    function editar(nombre, apellido, usuario, clave, activo, miid, permiso, cualquiera, DomEl) {
        //procedimiento = "editar";
        if(permiso == 1){
            console.log(cualquiera);
            $("#titulo").html("Editar usuario");
            $('#txtNombres').val(nombre);
            $('#usuario').val(usuario);
            $('#txtApellidos').val(apellido);
            $('#clave').val("#{$3$}#");
            $("#miid").val(miid);


            $("#modulo_1").prop("checked", "");
            $("#modulo_2").prop("checked", "");
            $("#modulo_3").prop("checked", "");
            $("#modulo_4").prop("checked", "");



            var permisosMi = $(DomEl).data("permisos");
            permisosMi = permisosMi.split(",");

            for (var i = 0; i < permisosMi.length; i++)
            {
                var check = $("#modulo_" + permisosMi[i]);
                if (check.length > 0)
                {
                    check.prop("checked", "checked");
                }
            }
            if (activo == 1) {
                document.getElementById("si").checked = true;

            }
            else if (activo == 0) {
                document.getElementById("no").checked = true;

            }


            $("#btnProcesar").html("Editar");
            $("#miaccion").val("editar");
            }
        else{
            alert("No tiene permiso para la acción");
        }
        

            
    }



    function nuevoElemento(p_agregar) {
        if(p_agregar == 1){
            document.getElementById('frmRegistrar').reset();
            $("#btnProcesar").html("Agregar");
            $("#titulo").html("Agregar usuario");
            $("#miaccion").val("agregar");
            }else{
            alert("no tiene permiso para la acción");
        }
            
            return false;
    }


    $(document).ready(function () {
        $(".AccionModulo").hide();

        $(".accionPrincipalModulo").click(function () {
            if ($(this).is(':checked')) {
                console.log("asdfasdfsda");
                $(this).parent().siblings().find(".AccionModulo").show();//);
                //$(this).siblings("AccionModulo").show();
            } else {
                $(this).parent().siblings().find(".AccionModulo").hide();
            }

        });
    });

</script>



<fieldset>
    <form name="frmRegistrar" id="frmRegistrar" action="guardarUsuario.php" method="POST" class="form-horizontal">
        <input type="hidden" name="accion" id="miaccion" value="agregar">
        <input type="hidden" name="miid" id="miid" value="">

        <input type="hidden" name="organizacion_idorganizacion"  value="0">

        <div class="row" style="">
            
            <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><center><h4 id="titulo">Registrar usuario</h4></center></h3>

                        </div>
                            <div class="panel-body" style="background-color: rgb(197, 225, 250); ">
            
            
            <!---columnaizquierda-->
            <div class="col-md-6">
                <br />
                <div class="form-group">                    
                    <label for="txtNombres" class="col-sm-3 control-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text"  name="txtNombres" class ="form-control validate[required, custom[onlyLetterSp]" id="txtNombres" placeholder="Nombre">
                    </div>
                </div>         
                <div class="form-group">                    
                    <label for="usuario" class="col-sm-3 control-label">Usuario:</label>

                    <div class="col-sm-9">
                        <input type="text"  name="usuario" class="form-control validate[required]" id="usuario" placeholder="Usuario" >
                    </div>
                </div>
                <!--radio buttons-->  
                <div class="form-group">
                    <label for="activo" class="col-sm-3 control-label">Activo:</label>
                    <div class="col-sm-6">
                        <input type="radio" name="activo" value="1"  id="si" checked/>Si
                    </div>
                    <div class="col-sm-6">
                        <input type="radio" name="activo"  value="0" id="no"/>No<br />	
                    </div>
                </div>
            </div>
            <!---columnaderecha-->
            <div class="col-md-6" style="">
                <br />
                <div class="form-group">                    
                    <label for="txtApellidos" class="col-sm-3 control-label">Apellidos:</label>

                    <div class="col-sm-9">
                        <input type="text"  name="txtApellidos" class ="form-control validate[required,custom[onlyLetterSp]" id="txtApellidos" placeholder="Apellidos">
                    </div>
                </div>  

                <div class="form-group">                    
                    <label for="precio" class="col-sm-3 control-label">Clave:</label>
                    <div class="col-sm-9">
                        <input type="password"  name="clave" class="form-control validate[required]" id="clave" placeholder="Clave" required="digite clave">
                    </div>
                </div>



                <!--checkbox-->
                <!--                <div class="form-group">
                                    <label for="modulos" class="col-sm-3 control-label">Modulos a administrar:</label>
                                    <div class="col-sm-3">
                                        <form role="form">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="modulos[]" id="modulo_1" value="1">Inventario</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="modulos[]" id="modulo_2" value="2">Ingresos/Egresos</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="modulos[]" id="modulo_3" value="3">Usuarios</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="modulos[]" id="modulo_4" value="4">HV/Asistentes</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>-->
            
        
                    <div class="row"> 
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" cellspacing="0" width="100%"aria-describedby="example_info" style="width: 30%;">
                                <thead>
                                    <tr role="row">
                                        <th rowspan="1" colspan="1">Módulo</th>
                                        <th  rowspan="1" colspan="1">Activar</th>
                                        <th rowspan="1" colspan="1">Agregar</th>
                                        <th rowspan="1" colspan="1">Editar</th>
                                        <th rowspan="1" colspan="1">Eliminar</th>	                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $g = new GeneraHtmlUsuarios();
                                        $g->generar_opciones_modulos();
                                    ?>
                                </tbody>

                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            
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
</fieldset>


<!---tabla--->

	<br />
	<br />
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><center><h4 id="titulo">Usuarios</h4></center></h3>

                        </div>
                            <div class="panel-body" style="background-color: rgb(197, 225, 250); ">
                        <table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th rowspan="1" colspan="1">Nombre</th>
                                    <th rowspan="1" colspan="1">Apellido</th>
                                    <th rowspan="1" colspan="1">Usuario</th>
                                    <!--<th rowspan="1" colspan="1">Clave</th>-->
                                    <th rowspan="1" colspan="1">Activo</th>		
                                    <th rowspan="1" colspan="1">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $g = new GeneraHtmlUsuarios();
                                $g->crearTabla_usu($valor[0]["permiso_editar"], $valor[0]["permiso_eliminar"]);
                                ?>
                            </tbody>

                            <tfoot>
                            </tfoot>
                        </table>



<!--<button 
    id="generar_usuario" onclick="generar()"
    type="button" class="btn btn-primary" style="margin-left: 100px;">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnGenerar">Generar reporte</b>
</button>-->
                            </div>
                </div>
</br></br></br></br>



<script>
    $("#frmRegistrar").validationEngine();
</script>


<?php
include_once "footer.php";
?>