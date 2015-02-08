<?php


include_once "php/generated/GeneraHTMLEgresos.php";
include_once "php/generated/egresos/controlEgreso.php";


$guardarEgreso = new controlEgreso();

	if($_POST['accion']=="agregar")
	{
		$guardarEgreso->guardarEgreso();
	}
	
	else
	{
    $guardarEgreso->editarEgreso();
	}

	header('Status: 301 Moved Permanently', false, 301);
header('Location: egresos.php');
exit();
?>