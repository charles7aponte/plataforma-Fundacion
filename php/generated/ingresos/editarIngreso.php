<?php

require_once('controlIngreso.php');

$idingresos=$_POST['id'];

$d =new controlIngreso();


$salida =$d->editarIngreso($idingresos);
echo $salida;


?>