<?php 
	function Conectar(){
		define('SERVIDOR_MYSQL','localhost'); //servidor de la base de datos
		define('USUARIO_MYSQL','root'); //usuario de la base de datos
		define('PASSWORD_MYSQL',''); //la clave para conectar
		define('BASE_DATOS','fundacion_fhofna'); // indica el nombre de la base de datos que contiene la tabla de los usuarios



		 $con = mysqli_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, PASSWORD_MYSQL,  BASE_DATOS)or die("Error Conectando a la base de datos: ".mysqli_error($link));




		mysqli_select_db($con, BASE_DATOS) or die ("Problemas al conectar con la BASE DE DATOS");

		return $con;
	}
	




$con = Conectar();




 ?>