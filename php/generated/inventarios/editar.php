<?php

require_once('controlInventario.php');

$idelemento=$_POST['id'];

$d =new controlInventario();


$salida =$d->editarElemento($idelemento);
echo $salida;


?>