<?php


include_once "php/generated/GeneraHTMLhv.php";
include_once "php/generated/hojas_de_vida/controlHv.php";


$guardarHv = new controlHv();

	if($_POST['accion']=="agregar")
	{
		$guardarHv->guardarHV();
	}
	
	else
	{
	$guardarHv->editarHv();
	}

	header('Status: 301 Moved Permanently', false, 301);
  header('Location: hv.php');
exit();
?>