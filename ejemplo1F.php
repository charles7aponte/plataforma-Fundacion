<?php


include_once "php/generated/GeneraHTML.php";
include_once "php/generated/inventarios/controlInventario.php";


$guardarElemento = new controlInventario();

if($_POST['accion']=="agregar")
{
	$guardarElemento->guardarInventario();

}
else {
	$guardarElemento->editarElementos();
}

header('Status: 301 Moved Permanently', false, 301);
header('Location: ejemplo1.php');
exit();
?>