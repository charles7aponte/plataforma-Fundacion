<?php
function conectar(){
  
  
  $servidor="localhost";
  $usuario="root";
  $clave="";
  $bd="estudiante";

  $con=  mysql_connect($servidor, $usuario, $clave) or die ("no se pudo conectar");
  mysql_select_db($bd, $con) or die ("problemas al seleccionar bd");
  
  
  return $con;
  
}


?>

