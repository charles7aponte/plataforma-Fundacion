<?php
//"php/generated/GeneraHTMLhv.php";
    //include_once "php/generated/controlRetiroHv.php";
    include_once "php/generated/controlRetiristas.php";
    $retirista = new control_Retiristas();
    
    
    
    
    if($_POST["accion"] == "agregar"){
        $var = $retirista->guardarRetiristas();
        if($var){
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: retiros.php');
        }else{
            header('Status: 400 Bad request', false, 400);
        }
    }   
    if($_POST["accion"] == "editar"){
        $var = $retirista->editarRetirista();
        if($var){
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: retiros.php');
        }else{
            header('Status: 400 Bad request', false, 400);
        }
    }
    if($_POST["accion"] == "eliminar"){
        echo $retirista->eliminarRetirista();
    }
    
    
    
?>
