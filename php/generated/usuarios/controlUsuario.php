<?php 

	class controlUsuario{



		public function guardarUsuario(){
		
		if(isset($_POST['activo']))
		{
		
			$txtNombres= $_POST['txtNombres'];
			$txtApellidos= $_POST['txtApellidos'];
			$usuario1= $_POST['usuario'];
			$activo= $_POST['activo'];
			$organizacion_idorganizacion= $_POST['organizacion_idorganizacion'];
			
			
			echo "------$organizacion_idorganizacion";
			
			
			
			$usuario=  new Usuario();
			
			
			
			
			$usuario->nombre= $txtNombres;
			$usuario->apellido= $txtApellidos;
			$usuario->usuario=$usuario1;
			$usuario->activo=$activo;
			$usuario->clave="saflkclave";
			$usuario->organizacionIdorganizacion=$organizacion_idorganizacion;
			
				
			DAOFactory::getUsuarioDAO()->insert($usuario);
		
			}	
		}
	

	}


?>