<?php


include_once "php/generated/GeneraHTMLUsuarios.php";
include_once "php/generated/usuarios/controlUsuario.php";


$guardarUsuarios = new controlUsuario();

	if($_POST['accion']=="agregar")
	{
		$guardarUsuarios->guardarUsuario();
	}
	
	else
	{
	$guardarUsuarios->editarUsuario();
	}

	header('Status: 301 Moved Permanently', false, 301);
header('Location: usuarios.php');
exit();
?>