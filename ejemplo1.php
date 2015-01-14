<?php

include_once "header.php";

?>

<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>

    <fieldset><legend>Registrar </legend>
      <form name="frmRegistrar" id="frmRegistrar">
        <table>
          <tr>
            <td>Cedula : </td>
            <td><input class ="validate[required,custom[onlyLetterSp] "type="text" id="txtCedula" name="txtCedula"/></td>            
          </tr>
          <tr>
            <td>Nombres : </td>
            <td><input type="text" id="txtNombres" name="txtNombres"/></td>            
          </tr>
          <tr>
            <td>Apellidos : </td>
            <td><input type="text" id="txtApellidos" name="txtApellidos"/></td>            
          </tr>
          <tr>
            <td>Fecha nacimiento : </td>
            <td><input type="text" id="txtfechaNac" name="txtfechaNac"/></td>            
          </tr>
          <tr>
            <td>Telefono : </td>
            <td><input type="text" id="txtTelefono" name="txtTelefono"/></td>            
          </tr>
          <tr>
            <td>
              <button id="btnProcesar" name="btnProcesar">Procesar estudiante
              </button>
            </td>
            
          </tr>
          <tr colspan ="2" align="center">
            
          </tr>
        </table>

      </form>
    </fieldset>

<script>
$("#frmRegistrar").validationEngine();
</script>

 
 <?php

include_once "footer.php";

?>