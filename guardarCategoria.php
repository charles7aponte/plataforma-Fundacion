<?php


include_once "php/generated/GeneraHTML.php";
include_once "php/generated/inventarios/controlInventario.php";


$guardarCategoria = new controlInventario();


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if($_POST['accion']=="agregarCategoria"){
        echo $guardarCategoria->guardarCat();
    }
}
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if($_GET['accion']=="obtenerTodos"){
        echo json_encode($guardarCategoria->obtenerCategorias());
    }
}


return false;
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: ejemplo1.php');
//exit();
?>