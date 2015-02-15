<?php

require_once('controlHV.php');

$idingresos=$_POST['id'];

$d =new controlHV();


$salida =$d->editaHV($idingresos);
echo $salida;


?>