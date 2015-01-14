<?php

$ced= $_POST['cedula'];
require_once 'funciones/conexiones.php';

$sql="delete from datospersonales where cedula= '$ced'";
$q = mysqli_query( $con, $sql);
echo 'el estudiante ha sido eliminado satisfactoriamente';

?>


