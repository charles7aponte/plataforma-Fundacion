<?php
//"php/generated/GeneraHTMLhv.php";
    include_once "php/generated/controlRetiroHv.php";
    //      include_once "php/generated/hojas_de_vida/controlHv.php";
    $retiros = new control_Retiros();
    
    
    
    
    if($_POST["accion"] == "agregar"){
        $var = $retiros->guardarRetiro();
        if($var){
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: retiros.php');
        }else{
            header('Status: 400 Bad request', false, 400);
        }
    }   
    if($_POST["accion"] == "editar"){
        $var = $retiros->editarRetiro();
        if($var){
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: retiros.php');
        }else{
            header('Status: 400 Bad request', false, 400);
        }
    }
    if($_POST["accion"] == "eliminar"){
        echo $retiros->elimiarRetiro();
    }
    
    
    
?>
