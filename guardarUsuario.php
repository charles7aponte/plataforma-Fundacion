<?php


include_once "php/generated/GeneraHTML.php";
include_once "php/generated/usuarios/controlUsuario.php";


$guardarUsuarios = new controlUsuario();
$guardarUsuarios->guardarUsuario();

header('Status: 301 Moved Permanently', false, 301);
header('Location: usuarios.php');
exit();
?>