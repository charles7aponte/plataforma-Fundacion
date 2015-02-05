<?php


include_once "php/generated/GeneraHTMLAsistentes.php";
include_once "php/generated/asistentes/controlAsistente.php";


$guardarAsistentes = new controlAsistente();


if($_POST['accion']=="agregar")
	{
		
  try{
    
    	$guardarAsistentes->guardarAsistente();
      	header('Status: 301 Moved Permanently', false, 301);
header('Location: hv_asistentes.php');

  }
  catch(Exception $e){
    echo" ERROR";
    	header('Status: 301 Moved Permanently', false, 301);
      header('Location: hv_asistentes.php?e=1');
    
  }
  
	exit();
  
	}
	
	else
	{
	$guardarAsistentes->editarAsistente();
	}
  
  header('Status: 301 Moved Permanently', false, 301);
  header('Location: hv_asistentes.php');
  exit();








  
	
	


?>