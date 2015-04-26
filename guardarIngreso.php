<?php

    session_start();   
    if(!isset($_SESSION["usuario"])){
        header("location: login.php");
    }  

include_once "php/generated/GeneraHTMLIngresos.php";
include_once "php/generated/ingresos/controlIngreso.php";


$guardarIngreso = new controlIngreso();

	if($_POST['accion']=="agregar")
	{
		$guardarIngreso->guardarIngreso();
	}
	
	else
	{
    $guardarIngreso->editarIngreso();
	}
//
	header('Status: 301 Moved Permanently', false, 301);
  header('Location: ingresos.php');
exit();
?>