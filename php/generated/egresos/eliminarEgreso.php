<?php

require_once('controlEgreso.php');

$idegresos=$_POST['id'];

$d =new controlEgreso();


$salida =$d->eliminarEgreso($idegresos);
echo $salida;


?>