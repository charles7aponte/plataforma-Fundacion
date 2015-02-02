<?php

require_once('GeneraHTMLUsuarios.php');

$idusuario=$_POST['id'];

$d =new GeneraHTMLUsuarios();


$salida =$d->eliminarUsuario($idusuario);
echo $salida;


?>