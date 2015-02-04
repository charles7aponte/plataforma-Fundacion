<?php

require_once('controlAsistente.php');

$email=$_POST['id'];

$d =new controlAsistente();

	
$salida =$d->eliminarAsistente($email);
echo $salida;


?>