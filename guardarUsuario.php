<?php
    session_start();   
    if(!isset($_SESSION["usuario"])){
        header("location: login.php");
    }  


include_once "php/generated/GeneraHTMLUsuarios.php";
include_once "php/generated/usuarios/controlUsuario.php";


$guardarUsuarios = new controlUsuario();

//$coso = $_POST["ie"];
//print_r($coso);
//print_r($_POST["inventarios"]);
//print_r($_POST["usuarios"]);
//print_r($_POST["hv"]);

if($_POST['accion']=="agregar"){
    $guardarUsuarios->guardarUsuario();
}

else{
    $guardarUsuarios->editarUsuario();
}

header('Status: 301 Moved Permanently', false, 301);
header('Location: usuarios.php');
exit();
?>