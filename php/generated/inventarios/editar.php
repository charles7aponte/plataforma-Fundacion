<?php

require_once('../GeneraHTML.php');

$idelemento=$_POST['id'];

$d =new GeneraHTML();


$salida =$d->editarElemento($idelemento);
echo $salida;


?>