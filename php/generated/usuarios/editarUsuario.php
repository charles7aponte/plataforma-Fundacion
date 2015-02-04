<?php

require_once('controlUsuario.php');

$idusuarios=$_POST['id'];

$d =new controlUsuario();


$salida =$d->editarUsuario($idusuarios);
echo $salida;


?>