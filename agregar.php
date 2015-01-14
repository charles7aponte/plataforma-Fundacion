<?php 
	require_once ('funciones/conexiones.php');

	$ced = $_POST['txtCedula'];
	$nom = $_POST['txtNombres'];
	$apel = $_POST['txtApellidos'];
	$nac = $_POST['txtfechaNac'];
	$tel = $_POST['txtTelefono'];
	

	$sql = "INSERT INTO datospersonales (CEDULA, NOMBRES, APELLIDOS, FECHA_NAC, TELEFONO) VALUES ('$ced', '$nom', '$apel', '$nac', '$tel')";

	$q = mysqli_query( $con, $sql);

	if(!$q)
	{
		echo "Ha ocurrido un error";
	}
	else
	{
		echo "El estudiante se ingreso satisfactoriamente... ";
	}

 ?>
