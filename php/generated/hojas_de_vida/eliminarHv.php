<?php

require_once('controlHv.php');


$id=$_POST['id'];

$d =new controlHv();

	
$salida =$d->eliminarHv($id);
echo $salida;


?>